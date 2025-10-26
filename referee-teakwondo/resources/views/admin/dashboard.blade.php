@component('admin.layouts.content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
                                <th> Sttaf </th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    <img src="{{ $user->image ? asset('userProfile/'.$user->image) : asset('userProfile/profile.png')}}" alt="image">
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
                                            <input onclick="sttaf({{ $user->id }})" class="checkbox" type="checkbox" {{ $user->sttaf ? 'checked' : '' }}>
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