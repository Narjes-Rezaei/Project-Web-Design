@component('admin.layouts.content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
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
                removeUser(enter);
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

    function removeUser(enter) {
        let request = new XMLHttpRequest();
        request.open("GET", `/remove-referee/${enter}`, true);
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
                        <h4 class="card-title mb-0">Referees</h4>
                    </div>

                    <div class="flex-grow-1 d-flex justify-content-center">
                        <input type="text" id="userSearch" class="form-control text-center" placeholder="Search by name and family" style="color: white;" class="form-control todo-list-input">
                    </div>
                    <div class="flex-grow-1 d-flex justify-content-md-end justify-content-center">
                        <a href="{{ route('add-referee') }}" class="btn btn-success">+ Add Referee</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> Photo </th>
                                <th> Referee ID </th>
                                <th> Name </th>
                                <th> Family </th>
                                <th> Gender</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($referees as $referee)
                            <tr>
                                <td>
                                    <img src="{{ $referee->image ? asset('refereeProfile/'.$referee->image) : asset('userProfile/profile.png')}}" alt="image">
                                </td>
                                <td> {{ $referee->referee_id }} </td>
                                <td> {{ $referee->name }} </td>
                                <td> {{ $referee->family }} </td>
                                <td> {{ $referee->gender->name }} </td>
                                <td>
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('edit-referee', $referee->referee_id) }}">
                                            <button type="button" class="btn btn-outline-warning">Edit</button>
                                        </a>
                                        <a onclick="alertDelet({{ $referee->referee_id }})">
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