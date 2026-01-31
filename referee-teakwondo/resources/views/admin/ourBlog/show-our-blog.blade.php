@component('admin.layouts.content')
<script>
    function remove(enter) {
        let request = new XMLHttpRequest();
        request.open("GET", `/remove-our-blog/${enter}`, true);
        request.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        request.send();
    }

    function alertDelet(enter) {
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
                remove(enter);
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

@can('add-event-type')
<a class="nav-link btn btn-success create-new-button" href="{{ route('add-our-blog') }}">+ Add Our Blog</a>
@endcan
<div class="row">
    @foreach($ourBlogs as $ourBlog)
    <div class="col-md-6 col-xl-4 grid-margin stretch-card mt-4">
        <div class="card text-white bg-dark border-0 shadow-sm rounded-4 overflow-hidden">
            {{-- تصویر و subject badge --}}
            <div class="position-relative">
                <img src="{{ asset('coverOurBlog/'.$ourBlog->image ) }}" class="img-fluid w-100" alt="Blog Image">
            </div>

            <div class="card-body">
                <h5 class="fw-bold text-white">{{ $ourBlog->title }}</h5>
                <p class="text-secondary mb-3">{{ $ourBlog->text }}</p>

                <hr class="border-secondary">

            </div>

            <div class="card-footer bg-dark border-0 text-center d-flex justify-content-center gap-3">
                @can('delete-event-type')
                <button onclick="alertDelet({{ $ourBlog->id }})" class="btn btn-outline-danger px-4">Delete</button>
                @endcan
                @can('edit-event-type')
                <a href="{{ route('edit-our-blog', ['id' => $ourBlog->id]) }}" class="btn btn-outline-warning px-4">Edit</a>
                @endcan
            </div>
        </div>

    </div>
    @endforeach
</div>
@endcomponent