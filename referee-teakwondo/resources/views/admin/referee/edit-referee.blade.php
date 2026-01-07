@component('admin.layouts.content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form class="form-inline" method="POST" action="{{ route('update-referee',['id'=>$referee->referee_id]) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <label class="sr-only" for="inlineFormInputName2">National Code</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Enter your name" style="color: white;" name="national_code" value="{{ old('national_code',$referee->national_code) }}">

                <label class="sr-only" for="inlineFormInputName2">Name</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Enter your name" style="color: white;" name="name" value="{{ old('name',$referee->name) }}">

                <label class="sr-only" for="inlineFormInputName2">Family</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Enter your family" style="color: white;" name="family" value="{{ old('family',$referee->family) }}">
                
                <label class="sr-only" for="inlineFormInputName2">Birth Date</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Enter your birth year" style="color: white;" name="birth_year" value="{{ old('birth_year',$referee->birth_year) }}">

                <label class="sr-only" for="inlineFormInputName2">Phone</label>
                <input type="phone" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="0918 000 00 00" style="color: white;" name="phone" value="{{ old('phone',$referee->phone) }}">

                <label class="sr-only" for="inlineFormInputName2">Email</label>
                <input type="email" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="teakwondo@gmail.com" style="color: white;" name="email" value="{{ old('email',$referee->email) }}">

                <label class="sr-only" for="inlineFormInputName2">Password</label>
                <input type="password" name="password" id="pass" placeholder="Password" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" />

                <label class="sr-only" for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control mb-2 mr-sm-2" style="color: white; background-color: #2c2c2c;">
                    <option value="" disabled {{ old('gender', $referee->gender_id) ? '' : 'selected' }}>Choose gender</option>
                    @foreach($genders as $gender)
                    <option value="{{ $gender->id }}"
                        {{ old('gender', $referee->gender_id) == $gender->id ? 'selected' : '' }}>
                        {{ $gender->name }}
                    </option>
                    @endforeach
                </select>


                {{-- degree --}}
                <label class="sr-only" for="degree">Degree</label>
                <select name="degree" class="form-control mb-2 mr-sm-2" style="color: white; background-color: #2c2c2c;">
                    <option value="" disabled {{ old('degree', $referee->degree_id) ? '' : 'selected' }}>Choose degree</option>
                    @foreach($degrees as $degree)
                    <option value="{{ $degree->id }}"
                        {{ old('degree', $referee->degree) == $degree->id ? 'selected' : '' }}>
                        {{ $degree->name }}
                    </option>
                    @endforeach
                </select>

                {{-- province --}}
                <label class="sr-only" for="province">Province</label>
                <select name="province" class="form-control mb-2 mr-sm-2" style="color: white; background-color: #2c2c2c;">
                    <option value="" disabled {{ old('province', $referee->province_id) ? '' : 'selected' }}>Choose province</option>
                    @foreach($provinces as $province)
                    <option value="{{ $province->id }}"
                        {{ old('province', $referee->province) == $province->id ? 'selected' : '' }}>
                        {{ $province->name }}
                    </option>
                    @endforeach
                </select>

                    <label class="sr-only" for="inlineFormInputName2">Photo</label>
                    <input type="file" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Choise Photo" style="color: white;" name="photo">

                    <p>Old Photo</p>
                    <img src="{{ $referee->photo ? asset('refereeProfile/'.$referee->photo) : asset('refereeProfile/profile.png')}}" alt="Old Photo" style="max-width: 150px; max-height: 150px; border: 1px solid #ccc; border-radius: 8px; object-fit: cover;">
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary mb-2" value="Register" name="signup" id="signup">Submit</button>
            </form>
        </div>
    </div>
</div>
@endcomponent