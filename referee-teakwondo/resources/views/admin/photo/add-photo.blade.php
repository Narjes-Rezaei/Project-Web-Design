@component('admin.layouts.content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form class="form-inline" action="{{ route('store-photo') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="sr-only" for="inlineFormInputName2">Photo</label>
                <input type="file" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Choise Photo" style="color: white;" name="image">
                <label class="sr-only" for="inlineFormInputName2">Title</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Nature" style="color: white;" name="title">
                <label class="sr-only" for="inlineFormInputName2">Link</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Social Media" style="color: white;" name="link">
                <label class="sr-only" for="inlineFormInputName2">Link Download</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Social Media" style="color: white;" name="link_download">
                <button type="submit" class="btn btn-primary mb-2">Send</button>
            </form>
        </div>
    </div>
</div>
@endcomponent