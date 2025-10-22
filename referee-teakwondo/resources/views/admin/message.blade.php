@component('admin.layouts.content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $reciv_user->name }}</h4>
            <form class="form-inline" action="{{ route('send-message' , ['id'=>$reciv_user->id ]) }}" method="POST">
                @csrf
                <label class="sr-only" for="inlineFormInputName2">Message</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Hello How Are You." style="color: white;" name="message">
                <button type="submit" class="btn btn-primary mb-2">Send</button>
            </form>
        </div>
    </div>
</div>
@endcomponent