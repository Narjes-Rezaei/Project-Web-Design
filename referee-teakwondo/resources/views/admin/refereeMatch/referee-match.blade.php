@component('admin.layouts.content')
<script>
    function alertDelet(user_id, enter) {
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
                removeUser(user_id, enter);
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

    function removeUser(user_id, enter) {
        let request = new XMLHttpRequest();
        request.open("GET", `/remove-referee-match/${user_id}/${enter}`, true);
        request.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        request.send();
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 mb-3">
                    <div class="flex-grow-1 text-md-start text-center">
                        <h4 class="card-title mb-0">Referees For "{{ $match->event_title }}"</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 mb-3">
                    <div class="flex-grow-1 text-md-start text-center">
                        <h4 class="card-title mb-0">Selected Referees</h4>
                    </div>

                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> Profile </th>
                                <th> Name </th>
                                <th> Family </th>
                                <th> Gender </th>
                                <th> Degree </th>
                                <th> Province </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($selectedReferees as $selectedReferee)
                            <tr>
                                <td>
                                    <img src="{{ $selectedReferee->image ? asset('refereeProfile/'.$selectedReferee->image) : asset('userProfile/profile.png') }}" alt="profile">
                                </td>
                                <td> {{ $selectedReferee->name }} </td>
                                <td> {{ $selectedReferee->family }} </td>
                                <td> {{ $selectedReferee->gender_name }} </td>
                                <td> {{ $selectedReferee->degree_name }} </td>
                                <td> {{ $selectedReferee->province_name }} </td>
                                <td>
                                    <div class="d-flex justify-content-end gap-2">
                                        <a onclick="alertDelet( {{ $selectedReferee->referee_id }} , {{ $selectedReferee->match_id }} )">
                                            <button type="button" class="btn btn-outline-danger">Delete</button>
                                        </a>
                                        <a href="{{ route('edit-referee-match', [$selectedReferee->referee_id , $selectedReferee->match_id]) }}">
                                            <button type="button" class="btn btn-outline-warning">Edit</button>
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

<div class="card">
    <div class="card-body">
        <div class="flex-grow-1 d-flex justify-content-center">
            <input type="text" id="permissionSearch" class="form-control text-center" placeholder="Search by name" style="color: white;">
        </div>

        <form id="frm" class="form-inline" method="POST" action="{{ route('update-referee-match', $match->id) }}">
            @csrf
            @method('PUT')

            <div class="row">
                <!--Referee -->
                <div class="">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 mb-3">
                                <div class="flex-grow-1 text-md-start text-center">
                                    <h4 class="card-title mb-0">Referees</h4>
                                </div>
                                <div class="flex-grow-1 d-flex justify-content-md-end justify-content-center">
                                    <a href="{{ route('add-referee') }}" class="btn btn-success">+ Add Referee</a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Family</th>
                                            <th>Gender</th>
                                            <th>Degree</th>
                                            <th>Province</th>
                                            <th>Tick</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($referees as $referee)
                                        <tr>
                                            <td>{{ $referee->name }}</td>
                                            <td>{{ $referee->family }}</td>
                                            <td>{{ $referee->gender->name }}</td>
                                            <td>{{ $referee->degree->name }}</td>
                                            <td>{{ $referee->province->name }}</td>
                                            <td>
                                                <div class="form-check form-check-primary">
                                                    <label class="form-check-label">
                                                        <input
                                                            type="checkbox"
                                                            name="roles[]"
                                                            value="{{ $referee->referee_id }}"
                                                            class="checkbox">
                                                        <i class="input-helper"></i>
                                                    </label>
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
                    const input = document.getElementById("permissionSearch");
                    input.addEventListener("keyup", function() {
                        const filter = input.value.toLowerCase();
                        const rows = document.querySelectorAll("table tbody tr");

                        rows.forEach(row => {
                            const name = row.children[0].innerText.toLowerCase();
                            const match = name.includes(filter);
                            row.style.display = match ? "" : "none";
                        });
                    });
                });
            </script>

            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
    </div>
</div>

@endcomponent()