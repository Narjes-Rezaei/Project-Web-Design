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
        request.open("GET", `/remove-team/${team_id}`, true);
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
                        <h4 class="card-title mb-0">Teams</h4>
                    </div>

                    <div class="flex-grow-1 d-flex justify-content-center">
                        <input type="text" id="userSearch" class="form-control text-center" placeholder="Search by name and family" style="color: white;" class="form-control todo-list-input">
                    </div>
                    <div class="flex-grow-1 d-flex justify-content-md-end justify-content-center">
                        @can('add-team')
                        <a href="{{ route('add-team') }}" class="btn btn-success">+ Add Team</a>
                        @endcan
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> Logo </th>
                                <th> Name </th>
                                <th> Number Of Team </th>
                                <th> Gender</th>
                                <th> Province</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teams as $team)
                            <tr>
                                <td>
                                    <img src="{{ asset('teamLogo/'.$team->logo) }}" alt="image">
                                </td>
                                <td> {{ $team->name }} </td>
                                <td> {{ $team->number_of_member }} </td>
                                <td> {{ $team->gender->name }} </td>
                                <td> {{ $team->province->name }} </td>
                                <td>
                                    <div class="d-flex justify-content-end gap-2">
                                        @can('edit-team')
                                        <a href="{{ route('edit-team', $team->id) }}">
                                            <button type="button" class="btn btn-outline-warning">Edit</button>
                                        </a>
                                        @endcan
                                        @can('delete-team')
                                        <a onclick="alertDelet({{ $team->id }})">
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


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const input = document.getElementById("userSearch");
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