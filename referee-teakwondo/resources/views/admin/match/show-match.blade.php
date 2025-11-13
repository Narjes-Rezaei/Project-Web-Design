@component('admin.layouts.content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function alertDelet(team_id) {
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
                removeTeam(team_id);
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

    function removeTeam(team_id) {
        let request = new XMLHttpRequest();
        request.open("GET", `/remove-match/${team_id}`, true);
        request.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        request.send();
    }


</script>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 mb-3">
                    <div class="flex-grow-1 text-md-start text-center">
                        <h4 class="card-title mb-0">Match</h4>
                    </div>

                    <div class="flex-grow-1 d-flex justify-content-center">
                        <input type="text" id="userSearch" class="form-control text-center" placeholder="Search by name and family" style="color: white;" class="form-control todo-list-input">
                    </div>
                    <div class="flex-grow-1 d-flex justify-content-md-end justify-content-center">
                        <a href="{{ route('add-match') }}" class="btn btn-success">+ Add Team</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> Event Title </th>
                                <th> Event Date </th>
                                <th> Event Rank</th>
                                <th> Event Type</th>
                                <th> Province</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($matches as $match)
                            <tr>
                                <td> {{ $match->event_title }} </td>
                                <td> {{ $match->event_date }} </td>
                                <td> {{ $match->eventRank->name }} </td>
                                <td> {{ $match->eventType->name }} </td>
                                <td> {{ $match->province->name }} </td>
                                <td>
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="#">
                                            <button type="button" class="btn btn-outline-warning">Edit</button>
                                        </a>
                                        <a onclick="alertDelet({{ $match->id }})">
                                            <button type="button" class="btn btn-outline-danger">Delete</button>
                                        </a>
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


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const input = document.getElementById("matchSearch");
        input.addEventListener("keyup", function() {
            const filter = input.value.toLowerCase();
            const rows = document.querySelectorAll("table tbody tr");

            rows.forEach(row => {
                const name = row.children[1].innerText.toLowerCase();
                const family = row.children[2].innerText.toLowerCase();
                const match = name.includes(filter) || family.includes(filter);
                row.style.display = match ? "" : "none";
            });
        });
    });
</script>

@endcomponent