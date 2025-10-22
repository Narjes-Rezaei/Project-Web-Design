@component('admin.layouts.content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form class="form-inline" action="{{ route('update-anything' , ['id' => $anything->id]) }}" method="POST">
                @csrf
                @method('put')
                
                
                <label class="sr-only" for="inlineFormInputName2">Sentence</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Nature" style="color: white;" name="sentence" value="{{ old('sentence' , $anything->sentence) }}">
                
                <label class="sr-only" for="inlineFormInputName2">description</label>
                <textarea type="textarea" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Social Media" style="color: white;" name="description">{{ old('description' , $anything->description) }}</textarea>
                
                <label class="sr-only" for="inlineFormInputName2">Link</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Nature" style="color: white;" name="link" value="{{ old('link' , $anything->link) }}">
                
                <button type="submit" class="btn btn-primary mb-2">Send</button>
            </form>
        </div>
    </div>
</div>
@endcomponent