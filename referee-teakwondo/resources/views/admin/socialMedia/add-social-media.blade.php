@component('admin.layouts.content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form class="form-inline" method="POST" action="{{ route('store-social-media') }}" enctype="multipart/form-data">
                @csrf

                <label class="sr-only" for="name">Twitter</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="name"
                    placeholder="Enter your twitter link" style="color: white;" name="twitter">

                <label class="sr-only" for="family">Facebook</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="family"
                    placeholder="Enter your facebook link" style="color: white;" name="facebook">

                <label class="sr-only" for="national_code">YouTube</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="national_code"
                    placeholder="Enter your youtube link" style="color: white;" name="youtube">

                <label class="sr-only" for="phone">Instagram</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="phone"
                    placeholder="Enter your instagram link" style="color: white;" name="instagram">


                <label class="sr-only" for="phone">Telegram</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="phone"
                    placeholder="Enter your telegram link" style="color: white;" name="telegram">

                
                <br>
                <button type="submit" class="btn btn-primary mb-2" value="Register" name="signup" id="signup">Register</button>
            </form>
        </div>
    </div>
</div>

@endcomponent