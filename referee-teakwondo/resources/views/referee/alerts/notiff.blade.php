<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    .swal2-popup.custom-swal {
        border-radius: 1rem !important;
        padding: 1.5rem;
    }
</style>

@if ($errors->any())
<script>
    const navEntries = performance.getEntriesByType("navigation");
    const isBack = navEntries.length > 0 && navEntries[0].type === "back_forward";

    if (!isBack) {
        let errorMessages = `{!! implode('<br>', $errors->all()) !!}`;
        Swal.fire({
            background: '#1b263b',
            color: '#ffffffff',
            icon: 'error',
            title: 'Validate Error',
            html: errorMessages,
            confirmButtonText: 'OK',
            confirmButtonColor: '#007bff',
            customClass: 'custom-swal'
        });
    }
</script>
@endif

@if(session('success'))
<script>
    const navEntries = performance.getEntriesByType("navigation");
    const isBack = navEntries.length > 0 && navEntries[0].type === "back_forward";

    if (!isBack) {
        Swal.fire({
            background: '#1b263b',
            color: '#ffffffff',
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            confirmButtonText: 'OK',
            confirmButtonColor: '#007bff',
            customClass: 'custom-swal'
        });
    }
</script>
@endif

@if(session('error'))
<script>
    const navEntries = performance.getEntriesByType("navigation");
    const isBack = navEntries.length > 0 && navEntries[0].type === "back_forward";

    if (!isBack) {
        Swal.fire({
            background: '#1b263b',
            color: '#ffffffff',
            icon: 'error',
            title: 'Error',
            text: '{{ session('error') }}',
            confirmButtonText: 'OK',
            confirmButtonColor: '#007bff',
            customClass: 'custom-swal'
        });
    }
</script>
@endif


