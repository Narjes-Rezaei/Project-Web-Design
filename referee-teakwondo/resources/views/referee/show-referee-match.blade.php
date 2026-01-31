@component('referee.layouts.content')
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endcomponent()