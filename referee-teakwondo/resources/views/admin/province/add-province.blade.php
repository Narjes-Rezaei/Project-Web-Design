@component('admin.layouts.content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">New Province Type</h4>
        @include('admin.layouts.error')
        <form id ="frm" class="form-inline" method="post" action="{{route('store-province')}}">
            @csrf
            <label class="sr-only" for="title">Name</label>
            <input type="text" id="title" name="name" class="form-control mb-2 mr-sm-2" placeholder="" style="color: white;">
        
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
    </div>
</div>

@endcomponent()
