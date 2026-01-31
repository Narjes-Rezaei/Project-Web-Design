@component('admin.layouts.content')

<script>
    function remove(enter) {
        let request = new XMLHttpRequest();
        request.open("GET", `/remove-event-rank/${enter}`, true);
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



<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="flex">
                <h4 class="card-title">Event Rank Table</h4>
                @can('add-event-rank')
                <a class="nav-link btn btn-success create-new-button" href="{{ route('add-event-rank') }}">+ Add Event Rank</a>
                @endcan
                <br>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> Name </th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($eventRanks as $eventRank)
                        <tr>
                            <input type="hidden" value="{{ $eventRank->id }}" class="val-delet">
                            <td>{{ $eventRank->name }}</td>
                            <td>
                                <div class="d-flex justify-content-end gap-2">
                                    @can('edit-event-rank')
                                    <a href="{{ route('edit-event-rank', $eventRank->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    @endcan
                                    @can('delete-event-rank')
                                    <button type="button" onclick="alertDelet({{ $eventRank->id }})" class="btn-sm btn-danger">Delete</button>
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

@endcomponent()