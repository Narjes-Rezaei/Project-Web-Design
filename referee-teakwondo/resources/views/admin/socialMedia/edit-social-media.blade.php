@component('admin.layouts.content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form class="form-inline" method="POST" action="{{ route('update-social-media',['id'=>$socialMedia->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <label class="sr-only" for="inlineFormInputName2">Twitter</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Enter your twitter link" style="color: white;" name="twitter" value="{{ old('twitter',$socialMedia->twitter) }}">

                <label class="sr-only" for="inlineFormInputName2">Facebook</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Enter your facebook link" style="color: white;" name="facebook" value="{{ old('facebook',$socialMedia->facebook) }}">

                <label class="sr-only" for="inlineFormInputName2">YouTube</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Enter your youtube link" style="color: white;" name="youtube" value="{{ old('youtube',$socialMedia->youtube) }}">
                
                <label class="sr-only" for="inlineFormInputName2">Instagram</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Enter your instagram link" style="color: white;" name="instagram" value="{{ old('instagram',$socialMedia->instagram) }}">

                <label class="sr-only" for="inlineFormInputName2">Telegram</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Enter your telegram link" style="color: white;" name="telegram" value="{{ old('telegram',$socialMedia->telegram) }}">

                
                <br>
                <button type="submit" class="btn btn-primary mb-2" value="Register" name="signup" id="signup">Register</button>
            </form>
        </div>
    </div>
</div>
@endcomponent