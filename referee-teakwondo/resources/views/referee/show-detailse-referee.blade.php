@component('referee.layouts.content')
<div class="card">
    <div class="card-body">
        <label class="sr-only" for="title">Score</label>
        <input type="text" id="title" name="score" class="form-control mb-2 mr-sm-2" placeholder="" style="background-color: black;"
            value="{{ old('score',$refereeMatch->score) }}" readonly>
        <div class="form-check form-check-primary">
            <label class="form-check-label">
                <span>Is Present</span>
                <input class="checkbox" type="checkbox" {{ $refereeMatch->is_present ? 'checked' : '' }} disabled>
                <i class="input-helper"></i>
            </label>
        </div>
        <div class="form-check form-check-primary">
            <label class="form-check-label">
                <span>Is Observer</span>
                <input class="checkbox" type="checkbox" {{ $refereeMatch->is_observer ? 'checked' : '' }} disabled>
                <i class="input-helper"></i>
            </label>
        </div>
        <div class="form-check form-check-primary">
            <label class="form-check-label">
                <span>Is Best Referee</span>
                <input class="checkbox" type="checkbox" {{ $refereeMatch->is_best_referee ? 'checked' : '' }} disabled>
                <i class="input-helper"></i>
            </label>
        </div>
        <br>
        <a href="{{ route('detailse-referee' , ['id'=>$refereeMatch->id]) }}">
            <button type="button" class="btn btn-outline-primary">Print</button>
        </a>
    </div>

</div>

@endcomponent()