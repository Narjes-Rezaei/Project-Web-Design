@if(session('swal'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        background: '#1b263b',
        color: '#fff',
        title: "{{ session('swal.title') }}",
        html: `
            <div style="text-align: left; font-size: 16px; line-height: 1.8;">
                <strong>👤 Name :</strong> {{ session('swal.name') }}<br>
                <strong>👥 Family :</strong> {{ session('swal.family') }}<br>
                <strong>📞 Phone :</strong> {{ session('swal.phone') }}<br>
                <strong>📧 Email :</strong> {{ session('swal.email') }}
            </div>
        `,
        imageUrl: "{{ session('swal.image') ? asset('userProfile/'.session('swal.image')) : asset('userProfile/profile.png') }}",
        imageWidth: 120,
        imageHeight: 120,
        imageAlt: 'User Profile',
        confirmButtonColor: '#518FE3'
    });
</script>
@endif