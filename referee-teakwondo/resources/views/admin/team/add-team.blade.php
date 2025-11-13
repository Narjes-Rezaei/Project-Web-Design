@component('admin.layouts.content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form class="form-inline" method="POST" action="{{ route('store-team') }}" enctype="multipart/form-data">
                @csrf

                <label class="sr-only" for="name">Name</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="name"
                    placeholder="Enter team name" style="color: white;" name="name">

                <label class="sr-only" for="national_code">Number Of Member</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="national_code"
                    placeholder="Enter number of member" style="color: white;" name="number_of_member">

                {{-- gender --}}
                <label class="sr-only" for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control mb-2 mr-sm-2" style="color: white; background-color: #2c2c2c;">
                    <option value="" disabled selected>Choose gender</option>
                    @foreach($genders as $gender)
                    <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                    @endforeach
                </select>

                {{-- province --}}
                <label class="sr-only" for="province">Province</label>
                <select name="province" id="province" class="form-control mb-2 mr-sm-2" style="color: white; background-color: #2c2c2c;">
                    <option value="" disabled selected>Choose province</option>
                    @foreach($provinces as $province)
                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                    @endforeach

                </select>

                <label class="sr-only" for="photo">Logo</label>
                <input type="file" class="form-control mb-2 mr-sm-2" id="photo"
                    placeholder="Choose Photo" style="color: white;" name="photo">

                <br>
                <button type="submit" class="btn btn-primary mb-2" value="Register" name="signup" >Submit</button>
            </form>
        </div>
    </div>
</div>

@endcomponent