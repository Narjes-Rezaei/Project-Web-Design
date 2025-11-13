@component('admin.layouts.content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 mb-3">
                    <div class="flex-grow-1 text-md-start text-center">
                        <h4 class="card-title mb-0">Referee For Match</h4>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>

                        </thead>
                        <tbody>

                            <td> {{ $match->tilte }} </td>
                            <td> {{ $match->event_type->name }} </td>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Edit Referee</h4>
        <div class="flex-grow-1 d-flex justify-content-center">
            <input type="text" id="permissionSearch" class="form-control text-center" placeholder="Search by name" style="color: white;">
        </div>

        <form id="frm" class="form-inline" method="POST" action="{{ route('update-select-referee', $referee->id) }}">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- جدول Roles -->
                <div class="col-md-6 mb-3">
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
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Family</th>
                                            <th>Age</th>
                                            <th>Degree</th>
                                            <th>Tick</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($referees as $referee)
                                        <tr>
                                            <td>
                                                <img src="{{ $referee->image ? asset('refereeProfile/'.$referee->image) : asset('refereeProfile/profile.png')}}" alt="image">
                                            </td>
                                            <td>{{ $referee->name }}</td>
                                            <td>
                                                <div class="form-check form-check-primary">
                                                    <label class="form-check-label">
                                                        <input
                                                            type="checkbox"
                                                            name="referees[]"
                                                            class="checkbox"
                                                            value="{{ $referee->id }}"
                                                            {{ in_array($referee->id, $matchReferee) ? 'checked' : '' }}>
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