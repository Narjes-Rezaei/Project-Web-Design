@component('admin.layouts.content')
<script>
    function remove(match_video_id) {
        let request = new XMLHttpRequest();
        request.open("GET", `/remove-match-video/${match_video_id}`, true);
        request.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        request.send();
    }

    function alertDelet(match_video_id) {
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
                remove(match_video_id);
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
@can('add-match-video')
<a class="nav-link btn btn-success create-new-button" href="{{ route('add-match-video') }}">+ Add Match Video</a>
@endcan
<div class="row">
    @foreach($matchVideos as $matchVideo)
    <div class="col-md-6 col-xl-4 grid-margin stretch-card mt-4">
        <div class="card text-white bg-dark border-0 shadow-sm rounded-4 overflow-hidden">
            {{-- تصویر و subject badge --}}
            <div class="position-relative">
                <img src="{{ asset('coverMatchVideo/'.$matchVideo->image ) }}" class="img-fluid w-100" alt="Blog Image">
            </div>

            <div class="card-body">
                <p class="text-secondary mb-3">{{ $matchVideo->title }}</p>

                <hr class="border-secondary">

            </div>

            <div class="card-footer bg-dark border-0 text-center d-flex justify-content-center gap-3">
                @can('delete-match-video')
                <button onclick="alertDelet({{ $matchVideo->id }})" class="btn btn-outline-danger px-4">Delete</button>
                @endcan
                @can('edit-match-video')
                <a href="{{ route('edit-match-video', ['id' => $matchVideo->id]) }}" class="btn btn-outline-warning px-4">Edit</a>
                @endcan
            </div>
        </div>

    </div>
    @endforeach
</div>
@endcomponent