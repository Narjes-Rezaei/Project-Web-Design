@component('admin.layouts.content')
<script>
    function remove(anything_id) {
        let request = new XMLHttpRequest();
        request.open("GET", `/remove-anything/${anything_id}`, true);
        request.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        request.send();
    }

    function alertDelet(anything_id) {
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
                remove(anything_id);
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
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 mb-3">
                    <div class="flex-grow-1 text-md-start text-center">
                        <h4 class="card-title mb-0">Anything</h4>
                    </div>
                    @can('add-anything')
                    <div class="flex-grow-1 d-flex justify-content-md-end justify-content-center">
                        <a href="{{ route('add-anything') }}" class="btn btn-success">+ Add Anything</a>
                    </div>
                    @endcan
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> Sentence </th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($anythings as $anything)
                            <tr>

                                <td> {{ $anything->sentence }} </td>
                                <td>
                                    <div class="d-flex justify-content-end gap-2">
                                        @can('edit-anything')
                                        <a href="{{ route('edit-anything',['id'=>$anything->id]) }}">
                                            <button type="button" class="btn btn-outline-warning">Edit</button>
                                        </a>
                                        @endcan
                                        @can('delete-anything')
                                        <a onclick="alertDelet({{ $anything->id }})">
                                            <button type="button" class="btn btn-outline-danger">Delete</button>
                                        </a>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endcomponent