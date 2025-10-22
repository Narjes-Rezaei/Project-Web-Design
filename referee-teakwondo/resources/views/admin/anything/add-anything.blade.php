@component('admin.layouts.content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form class="form-inline" action="{{ route('store-anything') }}" method="POST">
                @csrf
                
                <label class="sr-only" for="inlineFormInputName2">Sentence</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="sentence" style="color: white;" name="sentence">
                
                <label class="sr-only" for="inlineFormInputName2">Description</label>
                <textarea rows="5" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Social Media" style="color: white;" name="description"></textarea>
                
                <label class="sr-only" for="inlineFormInputName2">Link</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Nature" style="color: white;" name="link">
                
                <button type="submit" class="btn btn-primary mb-2">Send</button>
            </form>
        </div>
    </div>
</div>
@endcomponent