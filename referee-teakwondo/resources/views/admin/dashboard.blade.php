@component('admin.layouts.content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function alertDelet(user_id) {
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
                removeUser(user_id);
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

    function removeUser(user_id) {
        let request = new XMLHttpRequest();
        request.open("GET", `/remove-user/${user_id}`, true);
        request.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        request.send();
    }

    function superUser(id) {

        let request = new XMLHttpRequest();

        request.open("GET", `/check-super-user/${id}`, true);

        request.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

        request.send();
    }

    function sttaf(id) {

        let request = new XMLHttpRequest();

        request.open("GET", `/check-sttaf/${id}`, true);

        request.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

        request.send();

    }
</script>

@include('admin.alerts.show-information-user')
@can('show-user')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 mb-3">
                    <div class="flex-grow-1 text-md-start text-center">
                        <h4 class="card-title mb-0">Users</h4>
                    </div>

                    <div class="flex-grow-1 d-flex justify-content-center">
                        <input type="text" id="userSearch" class="form-control text-center" placeholder="Search by name and family" style="color: white;" class="form-control todo-list-input">
                    </div>
                    <div class="flex-grow-1 d-flex justify-content-md-end justify-content-center">
                        <a href="{{ route('add-user') }}" class="btn btn-success">+ Add User</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> Photo </th>
                                <th> Name </th>
                                <th> Family </th>
                                <th> Super User</th>
                                <th> Staff </th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    <img src="{{ $user->photo ? asset('userProfile/'.$user->photo) : asset('userProfile/profile.png')}}" alt="image">
                                </td>
                                <td> {{ $user->name }} </td>
                                <td> {{ $user->family }} </td>
                                <td>
                                    <div class="form-check form-check-primary">
                                        <label class="form-check-label">
                                            <input onclick="superUser({{ $user->id }})" class="checkbox" type="checkbox" {{ $user->super_user ? 'checked' : '' }}>
                                            <i class="input-helper"></i>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check form-check-primary">
                                        <label class="form-check-label">
                                            <input onclick="sttaf({{ $user->id }})" class="checkbox" type="checkbox" {{ $user->staff ? 'checked' : '' }}>
                                            <i class="input-helper"></i>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('user-access',['id'=>$user->id]) }}">
                                            <button type="button" class="btn btn-outline-primary">Access</button>
                                        </a>
                                        <a href="{{ route('show-user', $user->id) }}">
                                            <button type="button" class="btn btn-outline-info">Show Info</button>
                                        </a>
                                        <a href="{{ route('edit-user',['id'=>$user->id]) }}">
                                            <button type="button" class="btn btn-outline-warning">Edit</button>
                                        </a>
                                        <a onclick="alertDelet({{ $user->id }})">
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
@endcan


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