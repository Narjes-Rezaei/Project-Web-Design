@component('admin.layouts.content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form class="form-inline" method="POST" action="{{ route('update-member',['id'=>$member->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <label class="sr-only" for="inlineFormInputName2">Name</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Enter your name" style="color: white;" name="name" value="{{ old('name',$member->name) }}">

                <label class="sr-only" for="inlineFormInputName2">Family</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Enter your family" style="color: white;" name="family" value="{{ old('family',$member->family) }}">

                <label class="sr-only" for="inlineFormInputName2">Birth Date</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="2025-11-29" style="color: white;" name="birth_date" value="{{ old('birth_date',$member->birth_date) }}">
                
                <label class="sr-only" for="inlineFormInputName2">Phone</label>
                <input type="phone" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="0918 000 00 00" style="color: white;" name="phone" value="{{ old('phone',$member->phone) }}">
                
                <label class="sr-only" for="inlineFormInputName2">Email</label>
                <input type="email" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="teakwondo@gmail.com" style="color: white;" name="email" value="{{ old('email',$member->email) }}">

                <label class="sr-only" for="inlineFormInputName2">Photo</label>
                <input type="file" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Choise Photo" style="color: white;" name="photo">
                
                {{-- gender --}}
                <label class="sr-only" for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control mb-2 mr-sm-2" style="color: white; background-color: #2c2c2c;">
                    <option value="" disabled {{ old('gender', $member->gender_id) ? '' : 'selected' }}>Choose gender</option>
                    @foreach($genders as $gender)
                    <option value="{{ $gender->id }}"
                        {{ old('gender', $member->gender_id) == $gender->id ? 'selected' : '' }}>
                        {{ $gender->name }}
                    </option>
                    @endforeach
                </select>

                {{-- province --}}
                <label class="sr-only" for="province">Province</label>
                <select name="province" class="form-control mb-2 mr-sm-2" style="color: white; background-color: #2c2c2c;">
                    <option value="" disabled {{ old('province', $member->province_id) ? '' : 'selected' }}>Choose province</option>
                    @foreach($provinces as $province)
                    <option value="{{ $province->id }}"
                        {{ old('province', $member->province) == $province->id ? 'selected' : '' }}>
                        {{ $province->name }}
                    </option>
                    @endforeach
                </select>


                {{-- team --}}
                <label class="sr-only" for="team">Team</label>
                <select name="team" class="form-control mb-2 mr-sm-2" style="color: white; background-color: #2c2c2c;">
                    <option value="" disabled {{ old('team', $member->team_id) ? '' : 'selected' }}>Choose team</option>
                    @foreach($teams as $team)
                    <option value="{{ $team->id }}"
                        {{ old('team', $member->team) == $team->id ? 'selected' : '' }}>
                        {{ $team->name }}
                    </option>
                    @endforeach
                </select>

                <p>Old Photo</p>
                <img src="{{ $member->photo ? asset('memberProfile/'.$member->photo) : asset('memberProfile/profile.png')}}" alt="Old Photo" style="max-width: 150px; max-height: 150px; border: 1px solid #ccc; border-radius: 8px; object-fit: cover;">
                <br>
                <br>
                <button type="submit" class="btn btn-primary mb-2" value="Register" name="signup" id="signup">Submit</button>
            </form>
        </div>
    </div>
</div>
@endcomponent