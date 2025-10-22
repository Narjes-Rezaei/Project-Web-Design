@component('admin.layouts.content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Edit Role</h4>
        @include('admin.layouts.error')

        <form id="frm" class="form-inline" method="POST" action="{{ route('update-role', $role->id) }}">
            @csrf
            @method('PUT')

            <label class="sr-only" for="title">Name</label>
            <input type="text" id="title" name="name" value="{{ $role->name }}" class="form-control mb-2 mr-sm-2" placeholder="Role name" style="color: white;">
            <br>

            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 mb-3">
                                <div class="flex-grow-1 text-md-start text-center">
                                    <h4 class="card-title mb-0">Permissions</h4>
                                </div>
                                <div class="flex-grow-1 d-flex justify-content-center">
                                    <input type="text" id="userSearch" class="form-control text-center" placeholder="Search by name" style="color: white;">
                                </div>
                                <div class="flex-grow-1 d-flex justify-content-md-end justify-content-center">
                                    <a href="{{ route('add-permission') }}" class="btn btn-success">+ Add Permission</a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Tick</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->name }}</td>
                                            <td>
                                                <div class="form-check form-check-primary">
                                                    <label class="form-check-label">
                                                        <input
                                                            type="checkbox"
                                                            name="permissions[]"
                                                            class="checkbox"
                                                            value="{{ $permission->id }}"
                                                            {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
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