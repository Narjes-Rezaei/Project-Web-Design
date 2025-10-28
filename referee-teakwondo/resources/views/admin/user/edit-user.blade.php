@component('admin.layouts.content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form class="form-inline" method="POST" action="{{ route('update-user',['id'=>$user->id]) }}" enctype="multipart/form-data">
                @csrf

                <label class="sr-only" for="inlineFormInputName2">Name</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Enter your name" style="color: white;" name="name" value="{{ old('name',$user->name) }}">

                <label class="sr-only" for="inlineFormInputName2">Family</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Enter your family" style="color: white;" name="family" value="{{ old('name',$user->family) }}">

                <label class="sr-only" for="inlineFormInputName2">Phone</label>
                <input type="phone" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="0918 000 00 00" style="color: white;" name="phone" value="{{ old('phone',$user->phone) }}">
                
                <label class="sr-only" for="inlineFormInputName2">Email</label>
                <input type="email" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="teakwondo@gmail.com" style="color: white;" name="email" value="{{ old('email',$user->email) }}">

                <label class="sr-only" for="inlineFormInputName2">Password</label>
                <input type="password" name="password" id="pass" placeholder="Password" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" />


                <label class="sr-only" for="inlineFormInputName2">Photo</label>
                <input type="file" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Choise Photo" style="color: white;" name="image">
                
                <p>Old Photo</p>
                <img src="{{ $user->image ? asset('userProfile/'.$user->image) : asset('userProfile/profile.png')}}" alt="Old Photo" style="max-width: 150px; max-height: 150px; border: 1px solid #ccc; border-radius: 8px; object-fit: cover;">
                <br>
                <br>
                <button type="submit" class="btn btn-primary mb-2" value="Register" name="signup" id="signup">Register</button>
            </form>
        </div>
    </div>
</div>
@endcomponent