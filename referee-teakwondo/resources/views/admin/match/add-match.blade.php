@component('admin.layouts.content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form class="form-inline" method="POST" action="{{ route('store-match') }}" enctype="multipart/form-data">
                @csrf

                <label class="sr-only" for="name">Event Title</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="name"
                    placeholder="Enter Match Title" style="color: white;" name="event_title">

                <label class="sr-only" for="event_date">Event Date</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="event_date"
                    placeholder="Enter Event Date" style="color: white;" name="event_date">

                {{-- event rank --}}
                <label class="sr-only" for="eventRank">Event Rank</label>
                <select name="event_rank" id="eventRank" class="form-control mb-2 mr-sm-2" style="color: white; background-color: #2c2c2c;">
                    <option value="" disabled selected>Choose event rank</option>
                    @foreach($eventRanks as $eventRank)
                    <option value="{{ $eventRank->id }}">{{ $eventRank->name }}</option>
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

                {{-- event type --}}
                <label class="sr-only" for="eventType">Event Type</label>
                <select name="event_type" id="eventType" class="form-control mb-2 mr-sm-2" style="color: white; background-color: #2c2c2c;">
                    <option value="" disabled selected>Choose event type</option>
                    @foreach($eventTypes as $eventType)
                    <option value="{{ $eventType->id }}">{{ $eventType->name }}</option>
                    @endforeach

                </select>


                <br>
                <button type="submit" class="btn btn-primary mb-2" value="Register" name="signup">Submit</button>
            </form>
        </div>
    </div>
</div>

@endcomponent