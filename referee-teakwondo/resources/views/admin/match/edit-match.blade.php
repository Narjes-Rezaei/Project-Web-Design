@component('admin.layouts.content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">

            <form class="form-inline"
                method="POST"
                action="{{ route('update-match', $match->id) }}"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                {{-- Event Title --}}
                <label class="sr-only" for="name">Event Title</label>
                <input type="text"
                    class="form-control mb-2 mr-sm-2"
                    id="name"
                    name="event_title"
                    style="color: white;"
                    value="{{ old('event_title', $match->event_title) }}">

                {{-- Event Date --}}
                <label class="sr-only" for="event_date">Event Date</label>
                <input type="text"
                    id="event_date"
                    name="event_date"
                    class="form-control"
                    style="color: white;
                    background-color:black"
                    value="{{ old('event_date', $match->event_date) }}">

                {{-- Event Rank --}}
                <label class="sr-only" for="eventRank">Event Rank</label>
                <select name="event_rank"
                    id="eventRank"
                    class="form-control mb-2 mr-sm-2"
                    style="color: white; background-color: #2c2c2c;">
                    <option disabled>Choose event rank</option>
                    @foreach($eventRanks as $eventRank)
                    <option value="{{ $eventRank->id }}"
                        {{ old('event_rank', $match->event_rank_id) == $eventRank->id ? 'selected' : '' }}>
                        {{ $eventRank->name }}
                    </option>
                    @endforeach
                </select>

                {{-- Province --}}
                <label class="sr-only" for="province">Province</label>
                <select name="province"
                    id="province"
                    class="form-control mb-2 mr-sm-2"
                    style="color: white; background-color: #2c2c2c;">
                    <option disabled>Choose province</option>
                    @foreach($provinces as $province)
                    <option value="{{ $province->id }}"
                        {{ old('province', $match->province_id) == $province->id ? 'selected' : '' }}>
                        {{ $province->name }}
                    </option>
                    @endforeach
                </select>

                {{-- Event Type --}}
                <label class="sr-only" for="eventType">Event Type</label>
                <select name="event_type"
                    id="eventType"
                    class="form-control mb-2 mr-sm-2"
                    style="color: white; background-color: #2c2c2c;">
                    <option disabled>Choose event type</option>
                    @foreach($eventTypes as $eventType)
                    <option value="{{ $eventType->id }}"
                        {{ old('event_type', $match->event_type_id) == $eventType->id ? 'selected' : '' }}>
                        {{ $eventType->name }}
                    </option>
                    @endforeach
                </select>

                <br>
                <button type="submit" class="btn btn-primary mb-2">Update Match</button>
            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    flatpickr("#event_date", {
        enableTime: true,
        time_24hr: true,
        dateFormat: "Y-m-d H:i:s",
        defaultDate: "{{ old('event_date', $match->event_date) }}",
    });
</script>

@endcomponent