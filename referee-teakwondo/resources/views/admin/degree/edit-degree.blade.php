@component('admin.layouts.content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Edit Degree</h4>
        <form id ="frm" class="form-inline" method="post" action="{{route('update-degree' , $degree->id)}}">
            @csrf
            @method('put')
            <label class="sr-only" for="title">Name</label>
            <input type="text" id="title" name="name" class="form-control mb-2 mr-sm-2" placeholder="" style="color: white;"
            value="{{ old('name',$degree->name) }}">

            <label class="sr-only" for="title">Level</label>
            <input type="text" id="title" name="level" class="form-control mb-2 mr-sm-2" placeholder="" style="color: white;"
            value="{{ old('level',$degree->level) }}">
            <br>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
    </div>
</div>

@endcomponent()
