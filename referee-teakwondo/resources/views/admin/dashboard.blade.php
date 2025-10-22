@component('admin.layouts.content')
@include('admin.alerts.show-information-user')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function send() {
        let task = {}
        task.text = document.querySelector("#todo-input").value;
        //step1:
        let request = new XMLHttpRequest();

        request.open("post", "{{ route('add-todo') }}")

        //step2:
        request.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        request.setRequestHeader("Content-Type", "application/json")

        //step3:
        request.send(JSON.stringify(task));
    }

    function removeTodoList(task_id) {

        let request = new XMLHttpRequest();

        request.open("GET", `/remove-todo/${task_id}`, true);

        request.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

        request.send();
    }

    function check(task_id) {

        let request = new XMLHttpRequest();

        request.open("GET", `/check-todo/${task_id}`, true);

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

<script>
    function removeUser(user_id) {
        let request = new XMLHttpRequest();
        request.open("GET", `/remove-user/${user_id}`, true);
        request.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        request.send();
    }

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
</script>

<!-- <div class="row">
    <div class="col-md-6 col-xl-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between">
                    <h4 class="card-title">Messages</h4>
                </div>
                @foreach($messagePackets as $messagePacket)
                <div class="preview-list">
                    <div class="preview-item border-bottom">
                        <div class="preview-thumbnail">
                            <img src="{{ $messagePacket->get_image() ? asset('userProfile/'.$messagePacket->get_image()) : asset('userProfile/profile.png')}}" alt="image" class="rounded-circle">
                        </div>
                        <div class="preview-item-content d-flex flex-grow">
                            <div class="flex-grow">
                                <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                    <h6 class="preview-subject">{{ $messagePacket->get_sendName() }}</h6>
                                    <p class="text-muted text-small">{{ $messagePacket->get_time() }}</p>
                                </div>
                                <p class="text-muted">{{ $messagePacket->get_message() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-12 col-xl-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">To do list</h4>
                <form id="todo-form" class="add-items d-flex">
                    @csrf
                    <input type="text" id="todo-input" style="color: white;" class="form-control todo-list-input" placeholder="enter task..">
                    <button type="button" onclick="send()" class="add btn btn-primary todo-list-add-btn">Add</button>
                </form>
                <div class="list-wrapper">
                    <ul class="d-flex flex-column-reverse text-white todo-list todo-list-custom">
                        @foreach($tasks as $task)
                        <li class="{{ $task->status ? 'completed' : '' }}">
                            <div class="form-check form-check-primary">
                                <label class="form-check-label">
                                    <input onclick="check({{ $task->id }})" class="checkbox" type="checkbox" {{ $task->status ? 'checked' : '' }}> {{ $task->task }} <i class="input-helper"></i></label>
                            </div>
                            <i onclick="removeTodoList({{ $task->id }})" class="remove mdi mdi-close-box"></i>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
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
                    @can('add-user')
                    <div class="flex-grow-1 d-flex justify-content-md-end justify-content-center">
                        <a href="{{ route('add-user') }}" class="btn btn-success">+ Add User</a>
                    </div>
                    @endcan
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> Photo </th>
                                <th> Name </th>
                                <th> Family </th>
                                @if(Auth::check() && Auth::user()->super_user)
                                <th> Super User</th>
                                <th> Sttaf </th>
                                @endif
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
                                @if(Auth::check() && Auth::user()->super_user)
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
                                @endif
                                <td>
                                    <div class="d-flex justify-content-end gap-2">
                                        @if(Auth::check() && Auth::user()->super_user && $user->sttaf == 1)
                                        <a href="{{ route('user-access',['id'=>$user->id]) }}">
                                            <button type="button" class="btn btn-outline-primary">Access</button>
                                        </a>
                                        @endif

                                        @if(Auth::check() && Auth::user()->super_user)
                                        <a href="{{ route('show-user',['id'=>$user->id]) }}">
                                            <button type="button" class="btn btn-outline-info">Show Info</button>
                                        </a>
                                        @endif
                                        @can('edit-user')
                                        <a href="{{ route('edit-user',['id'=>$user->id]) }}">
                                            <button type="button" class="btn btn-outline-warning">Edit</button>
                                        </a>
                                        @endcan
                                        @can('delete-user')
                                        <a onclick="alertDelet({{ $user->id }})">
                                            <button type="button" class="btn btn-outline-danger">Delete</button>
                                        </a>
                                        @endcan
                                        <a href="{{ route('message-page',['id'=>$user->id]) }}">
                                            <button type="button" class="btn btn-outline-success">Message</button>
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
@endcan -->


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