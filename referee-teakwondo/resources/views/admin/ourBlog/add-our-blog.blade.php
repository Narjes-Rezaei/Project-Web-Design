@component('admin.layouts.content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form class="form-inline" action="{{ route('store-our-blog') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="sr-only" for="inlineFormInputName2">Photo</label>
                <input type="file" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Choise Photo" style="color: white;" name="image">
                <label class="sr-only" for="inlineFormInputName2">Title</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Enter blog's title" style="color: white;" name="title"></input>
                <label class="sr-only" for="inlineFormInputName2">Text</label>
                <textarea rows="5" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Enter discription" style="color: white;" name="text"></textarea>
                <label class="sr-only" for="inlineFormInputName2">Link</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Enter Link" style="color: white;" name="link">
                <button type="submit" class="btn btn-primary mb-2">Send</button>
            </form>
        </div>
    </div>
</div>
@endcomponent