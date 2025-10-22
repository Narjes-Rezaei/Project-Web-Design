@component('admin.layouts.content')
<script>
    function remove(photo_id) {

        let request = new XMLHttpRequest();

        request.open("GET", `/remove-photo/${photo_id}`, true);

        // request.onreadystatechange = function() {
        //     if (this.readyState == 4 && this.status == 201){
        //         alert(this.responseText);
        //     }
        // }

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
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
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
@can('edit-photo')
<a class="nav-link btn btn-success create-new-button" href="{{ route('add-photo') }}">+ Add Photo</a>
@endcan
<div class="row">
    @foreach($photos as $photo)
    <div class="col-md-6 col-xl-4 grid-margin stretch-card">
        <div class="card mt-4">
            <div class="card-body d-flex flex-column justify-content-between">
                <div class="item text-center mb-3">
                    <img src="{{ asset('photos/'.$photo->image) }}" alt="photo" class="img-fluid rounded">
                </div>
                <div class="mb-4">
                    <div class="d-flex d-md-block d-xl-flex justify-content-between mb-2">
                        <h6 class="preview-subject">{{ $photo->title }}</h6>
                        <p class="text-muted text-small">{{ $photo->created_at }}</p>
                    </div>
                </div>
                
                <div class="text-center mt-auto">
                    @can('delete-photo')
                    <button onclick="alertDelet({{ $photo->id }})" type="button" class="btn btn-outline-danger mx-2">Delete</button>
                    @endcan
                    @can('edit-photo')
                    <a href="{{ route('edit-photo',['id'=>$photo->id]) }}">
                        <button type="button" class="btn btn-outline-warning mx-2">Edit</button>
                    </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endcomponent