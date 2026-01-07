@component('admin.layouts.content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form class="form-inline" method="POST" action="{{ route('update-team',['id'=>$team->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <label class="sr-only" for="inlineFormInputName2">Name</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Enter your name" style="color: white;" name="name" value="{{ old('name',$team->name) }}">

                <label class="sr-only" for="inlineFormInputName2">Number Of Member</label>
                <input type="numberOfTeam" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="" style="color: white;" name="number_of_member" value="{{ old('number_of_member',$team->number_of_member) }}">
                
                <label class="sr-only" for="inlineFormInputName2">Photo</label>
                <input type="file" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Choise Photo" style="color: white;" name="photo">
                
                <p>Old Photo</p>
                <img src="{{ $team->logo ? asset('teamLogo/'.$team->logo) : asset('teamLogo/profile.png')}}" alt="Old Photo" style="max-width: 150px; max-height: 150px; border: 1px solid #ccc; border-radius: 8px; object-fit: cover;">
                <br>
                <br>
                <button type="submit" class="btn btn-primary mb-2" value="Register" name="signup" id="signup">Submit</button>
            </form>
        </div>
    </div>
</div>
@endcomponent