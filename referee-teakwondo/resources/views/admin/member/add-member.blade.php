@component('admin.layouts.content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form class="form-inline" method="POST" action="{{ route('store-member') }}" enctype="multipart/form-data">
                @csrf

                <label class="sr-only" for="name">Name</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="name"
                    placeholder="Enter your name" style="color: white;" name="name">

                <label class="sr-only" for="family">Family</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="family"
                    placeholder="Enter your family" style="color: white;" name="family">

                <label class="sr-only" for="birthDate">Birth Date</label>
                <input
                    type="text"
                    id="birth_year"
                    name="birth_date"
                    class="form-control"
                    placeholder="Select Birth Date"
                    style="color: white;">


                <label class="sr-only" for="phone">Phone</label>
                <input type="phone" class="form-control mb-2 mr-sm-2" id="phone"
                    placeholder="0918 000 00 00" style="color: white;" name="phone" value="+98">

                <label class="sr-only" for="email">Email</label>
                <input type="email" class="form-control mb-2 mr-sm-2" id="email"
                    placeholder="teakwondo@gmail.com" style="color: white;" name="email">

                {{-- team --}}
                <label class="sr-only" for="team">Team</label>
                <select name="team" id="team" class="form-control mb-2 mr-sm-2" style="color: white; background-color: #2c2c2c;">
                    <option value="" disabled selected>Choose team</option>
                    @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>

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

                <label class="sr-only" for="image">Photo</label>
                <input type="file" class="form-control mb-2 mr-sm-2" id="image"
                    placeholder="Choose Photo" style="color: white;" name="image">

                <br>
                <button type="submit" class="btn btn-primary mb-2" value="Register" name="signup" id="signup">Submit</button>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#birth_year", {
        dateFormat: "Y-m-d",
        maxDate: "today"
    });
</script>
@endcomponent