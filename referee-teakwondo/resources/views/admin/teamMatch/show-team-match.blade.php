@component('admin.layouts.content')

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
        request.open("GET", `/remove-team-match/${team_id}`, true);
        request.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        request.send();
    }
</script>


<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Select Teams for Match "{{ $matchmodel->event_title }}"</h4>

                <form id="matchForm" method="POST" action="{{ route('store-team-match', $matchmodel->id) }}">
                    @csrf
                    @method('POST')

                    <div class="row mb-3">
    
    <!-- Team 1 -->
    <div class="col-md-4">
        <label for="team1" class="form-label">Team 1</label>
        <select name="team1" id="team1" class="form-control">
            <option value="">-- Select Team 1 --</option>
            @foreach($teams as $team)
                <option value="{{ $team->id }}">{{ $team->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Team 2 -->
    <div class="col-md-4">
        <label for="team2" class="form-label">Team 2</label>
        <select name="team2" id="team2" class="form-control">
            <option value="">-- Select Team 2 --</option>
            @foreach($teams as $team)
                <option value="{{ $team->id }}">{{ $team->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Hour -->
    <div class="col-md-2">
        <label for="hour" class="form-label">Hour</label>
        <input type="number"
               name="hour"
               id="hour"
               class="form-control text-center"
               placeholder="Hour"
               min="1"
               max="24"
               inputmode="numeric"
               required
               style="color: white;">
    </div>

    <!-- Minute -->
    <div class="col-md-2">
        <label for="minute" class="form-label">Minute</label>
        <input type="number"
               name="min"
               id="minute"
               class="form-control text-center"
               placeholder="Min"
               min="0"
               max="59"
               inputmode="numeric"
               required
               style="color: white;">
    </div>

</div>

                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </form>

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
                        <h4 class="card-title mb-0">Teams</h4>
                    </div>

                    <div class="flex-grow-1 d-flex justify-content-center">
                        <input type="text" id="userSearch" class="form-control text-center" placeholder="Search by name and family" style="color: white;" class="form-control todo-list-input">
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> Logo </th>
                                <th> Name </th>
                                <th> Gender </th>
                                <th> Province </th>
                                <th></th>
                                <th> Logo </th>
                                <th> Name </th>
                                <th> Gender </th>
                                <th> Province </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($matches as $match)
                            <tr>
                                <td>
                                    <img src="{{ asset('teamLogo/'. optional($match['team1'])->logo) }}" alt="image">
                                </td>
                                <td> {{ optional($match['team1'])->name }} </td>
                                <td> {{ optional($match['team1'])->gender->name }} </td>
                                <td> {{ optional($match['team1'])->province->name }} </td>

                                <td>
                                    <h5>VS</h5>
                                </td>

                                <td>
                                    <img src="{{ asset('teamLogo/'. optional($match['team2'])->logo) }}" alt="image">
                                </td>
                                <td> {{ optional($match['team2'])->name }} </td>
                                <td> {{ optional($match['team2'])->gender->name }} </td>
                                <td> {{ optional($match['team2'])->province->name }} </td>
                                <td>
                                    <div class="d-flex justify-content-end gap-2">
                                        <a onclick="alertDelet(5)">
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
    // Optional: نمایش تیم‌ها بعد از انتخاب بدون رفرش صفحه (AJAX)
    document.getElementById('matchForm').addEventListener('submit', function(e) {
        // e.preventDefault(); // اگر میخوای AJAX استفاده کنی
        const team1 = document.getElementById('team1').selectedOptions[0].text;
        const team2 = document.getElementById('team2').selectedOptions[0].text;

        const display = document.getElementById('selectedTeams');
        display.textContent = team1 + ' VS ' + team2;
    });
</script>

@endcomponent