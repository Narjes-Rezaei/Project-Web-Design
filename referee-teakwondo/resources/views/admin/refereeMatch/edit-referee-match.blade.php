@component('admin.layouts.content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{$refreeName}} In {{ $matchName }}</h4>
        <form id="frm" class="form-inline" method="post" action="{{route('complet-refree-match' , $refereeMatch->id)}}">
            @csrf
            @method('put')
            <label class="sr-only" for="title">Score</label>
            <input type="text" id="title" name="score" class="form-control mb-2 mr-sm-2" placeholder="" style="color: white;"
                value="{{ old('score',$refereeMatch->score) }}">
            <div class="form-check form-check-primary">
                <label class="form-check-label">
                    <span>Is Present</span>
                    <input class="checkbox" type="checkbox" name="is_present" value="1" {{ $refereeMatch->is_present ? 'checked' : '' }}>
                    <i class="input-helper"></i>
                </label>
            </div>
            <div class="form-check form-check-primary">
                <label class="form-check-label">
                    <span>Is Observer</span>
                    <input class="checkbox" type="checkbox" name="is_observer" value="1" {{ $refereeMatch->is_observer ? 'checked' : '' }}>
                    <i class="input-helper"></i>
                </label>
            </div>
            <div class="form-check form-check-primary">
                <label class="form-check-label">
                    <span>Is Best Referee</span>
                    <input class="checkbox" type="checkbox" name="is_best_referee" value="1" {{ $refereeMatch->is_best_referee ? 'checked' : '' }}>
                    <i class="input-helper"></i>
                </label>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
    </div>
</div>

@endcomponent()