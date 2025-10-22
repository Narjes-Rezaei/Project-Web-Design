@component('admin.layouts.content')
@include('admin.alerts.show-information-user')
<script>
    function remove(message_id) {
        let request = new XMLHttpRequest();
        request.open("GET", `/remove-message/${message_id}`, true);
        request.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        request.send();
    }

    function alertDelet(message_id) {
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
                remove(message_id);
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

<div class="row">
    @foreach($messagePackets as $messagePacket)
    <div class="col-md-6 col-xl-4 grid-margin stretch-card mt-4">
        <div class="card text-white bg-dark border-0 shadow-sm rounded-4 overflow-hidden">
            
            <div class="card-body">
                <h5 class="fw-bold text-white">{{ $messagePacket->get_subject() }}</h5>
                <p class="text-secondary mb-3">{{ $messagePacket->get_message() }}</p>

                <hr class="border-secondary">

                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="{{ $messagePacket->get_image() ? asset('userProfile/'.$messagePacket->get_image()) : asset('userProfile/profile.png') }}" alt="User" class="rounded-circle me-2" width="35" height="35">
                        <span class="text-white">{{ $messagePacket->get_sendName() }} {{ $messagePacket->get_sendFamily() }}</span>
                    </div>
                    <small class="text-secondary">
                        <i class="far fa-clock me-1"></i>{{ $messagePacket->get_time() }}
                    </small>
                </div>
            </div>

            <div class="card-footer bg-dark border-0 text-center d-flex justify-content-center gap-3">
                @can('delete-message')
                <button onclick="alertDelet({{ $messagePacket->get_id() }})" class="btn btn-outline-danger px-4">Delete</button>
                @endcan
                @can('show-single-user')
                <a href="{{ route('show-single-user', ['id' => $messagePacket->get_sendId()]) }}" class="btn btn-outline-warning px-4">Show User</a>
                @endcan
            </div>
        </div>

    </div>
    @endforeach
</div>
@endcomponent