@component('admin.layouts.content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form class="form-inline" method="POST" action="{{ route('update-match',['id'=>$match->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <label class="sr-only" for="inlineFormInputName2">Event Title</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Enter your name" style="color: white;" name="name" value="{{ old('name',$user->name) }}">

                
        
                <button type="submit" class="btn btn-primary mb-2" value="Register" name="signup" id="signup">Submit</button>
            </form>
        </div>
    </div>
</div>
@endcomponent