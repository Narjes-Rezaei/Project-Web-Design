@component('admin.layouts.content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form class="form-inline" action="{{ route('store-development') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="sr-only" for="inlineFormInputName2">Photo</label>
                <input type="file" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Choise Photo" style="color: white;" name="image">
                <label class="sr-only" for="inlineFormInputName2">name</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Nature" style="color: white;" name="name">
                <label class="sr-only" for="inlineFormInputName2">description</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Nature" style="color: white;" name="description">
                <label class="sr-only" for="inlineFormInputName2">link</label>
                <textarea rows="5" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Social Media" style="color: white;" name="link"></textarea>
                <button type="submit" class="btn btn-primary mb-2">Send</button>
            </form>
        </div>
    </div>
</div>
@endcomponent