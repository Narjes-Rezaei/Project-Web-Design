@component('admin.layouts.content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form class="form-inline" action="{{ route('update-match-video' , ['id' => $matchVideo->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="sr-only" for="inlineFormInputName2">Photo</label>
                    <input type="file" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Choise Photo" style="color: white;" name="image">
                    <div class="mt-2">
                        <p>Old Photo</p>
                        <img src="{{ asset('coverMatchVideo/'.$matchVideo->image) }}" alt="Old Photo" style="max-width: 150px; max-height: 150px; border: 1px solid #ccc; border-radius: 8px; object-fit: cover;">
                    </div>
                </div>
                <label class="sr-only" for="inlineFormInputName2">Title</label>
                <textarea type="textarea" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Social Media" style="color: white;" name="title">{{ old('title' , $matchVideo->title) }}</textarea>
                <label class="sr-only" for="inlineFormInputName2">Link</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Nature" style="color: white;" name="video" value="{{ old('video' , $matchVideo->video) }}">
                <button type="submit" class="btn btn-primary mb-2">Update</button>
            </form>
        </div>
    </div>
</div>
@endcomponent