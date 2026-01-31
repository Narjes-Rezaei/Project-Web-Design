@component('referee.layouts.content')

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