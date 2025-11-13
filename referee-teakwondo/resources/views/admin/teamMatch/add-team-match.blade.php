@component('admin.layouts.content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form class="form-inline" method="POST" action="{{ route('store-match') }}" enctype="multipart/form-data">
                @csrf

                {{-- Team 1 --}}
                <label class="sr-only" for="team1">Team 1</label>
                <select name="team1" id="eventRank" class="form-control mb-2 mr-sm-2" style="color: white; background-color: #2c2c2c;">
                    <option value="" disabled selected>Choose Team 1</option>
                    @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->image ? asset('teamLogo/'.$team->image)}} {{ $team->name }}</option>
                    @endforeach
                </select>

                {{-- Team 2 --}}
                <label class="sr-only" for="team1">Team 2</label>
                <select name="team2" id="eventRank" class="form-control mb-2 mr-sm-2" style="color: white; background-color: #2c2c2c;">
                    <option value="" disabled selected>Choose Team 2</option>
                    @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->image ? asset('teamLogo/'.$team->image)}} {{ $team->name }}</option>
                    @endforeach
                </select>

                {{-- match --}}
                <label class="sr-only" for="eventType">Match</label>
                <select name="match" id="eventType" class="form-control mb-2 mr-sm-2" style="color: white; background-color: #2c2c2c;">
                    <option value="" disabled selected>Choose Match</option>
                    @foreach($matches as $match)
                    <option value="{{ $match->id }}">{{ $match->name }}</option>
                    @endforeach

                </select>
                <button type="submit" class="btn btn-primary mb-2" value="Register" name="signup">Submit</button>
            </form>
        </div>
    </div>
</div>

@endcomponent