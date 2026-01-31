@component('referee.layouts.content')


<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Referee Profile</h4>
            <form class="form-sample">
                <p class="card-description"> Personal info </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <img src="{{ $referee->image ? asset('refereeProfile/'.$referee->image) : asset('refereeProfile/profile.png')}}" alt="Old Photo" style="max-width: 150px; max-height: 150px; border: 1px solid #ccc; border-radius: 8px; object-fit: cover;">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">First Name</label>
                            <div class="col-sm-9">
                                <span class="form-control">{{ $referee->name }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Last Name</label>
                            <div class="col-sm-9">
                                <span class="form-control">{{ $referee->family }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-9">
                                <span class="form-control">{{ $referee->gender->name }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Year of Birth</label>
                            <div class="col-sm-9">
                                <span class="form-control">{{ $referee->birth_year }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">National Code</label>
                            <div class="col-sm-9">
                                <span class="form-control">{{ $referee->national_code }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Referee Code</label>
                            <div class="col-sm-9">
                                <span class="form-control">{{ $referee->referee_id }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="card-description"> Referee Info </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Province</label>
                            <div class="col-sm-9">
                                <span class="form-control">{{ $referee->province->name }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Referee Degree</label>
                            <div class="col-sm-9">
                                <span class="form-control">{{ $referee->degree->name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <span class="form-control">{{ $referee->email }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <span class="form-control">{{ $referee->phone }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <a href="{{ route('referee-print' , ['id'=>$referee->referee_id]) }}">
                    <button type="button" class="btn btn-outline-primary">Print</button>
                </a>
            </form>
        </div>
    </div>
</div>

@endcomponent