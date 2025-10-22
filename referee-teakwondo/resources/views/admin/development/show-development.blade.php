@component('admin.layouts.content')
<script>
    function remove(photo_id) {
        let request = new XMLHttpRequest();
        request.open("GET", `/remove-development/${photo_id}`, true);
        request.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        request.send();
    }

    function alertDelet(photo_id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-outline-danger mx-2",
                cancelButton: "btn btn-outline-warning mx-2"
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            background: '#1b263b',
            color: '#ffffffff',
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                remove(photo_id);
                swalWithBootstrapButtons.fire({
                    background: '#1b263b',
                    color: '#ffffffff',
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                }).then(() => {
                    location.reload();
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    background: '#1b263b',
                    color: '#ffffffff',
                    title: "Cancelled",
                    text: "Your imaginary file is safe :)",
                    icon: "error"
                });
            }
        });
    }
</script>

<!-- دکمه اضافه کردن -->
<div class="container my-4">
    @can('add-development')
    <a class="nav-link btn btn-success create-new-button mb-4" href="{{ route('add-development') }}">+ Add Development</a>
    @endcan
    <div class="row">
        @foreach($developments as $development)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 text-white bg-dark shadow-sm border-0 rounded-4">
                <!-- تصویر و عنوان -->
                <div class="position-relative">
                    <img src="{{ asset('development-image/' . $development->image) }}" class="card-img-top img-fluid" alt="Development Image">
                    <span class="badge bg-info text-dark position-absolute bottom-0 start-50 translate-middle-x px-3 py-2 rounded">
                        {{ $development->name }}
                    </span>
                </div>

                <div class="card-body">
                    <p class="card-text text-secondary">{{ $development->description }}</p>
                </div>

                <div class="card-footer bg-dark border-0 d-flex justify-content-center gap-2">
                    @can('delete-development')
                    <button onclick="alertDelet({{ $development->id }})" class="btn btn-outline-danger">Delete</button>
                    @endcan
                    @can('edit-development')
                    <a href="{{ route('edit-development', ['id' => $development->id]) }}" class="btn btn-outline-warning">Edit</a>
                    @endcan
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endcomponent