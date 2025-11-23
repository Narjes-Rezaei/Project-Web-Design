<div class="container">


  <div class="row">
    <div class="col-lg-12">

      <div class="d-flex team-vs " id="match-video">
        <span class="score"> VS </span>
        <div class="team-1 w-50">
          <div class="team-details w-100 text-center">
            <img src="{{ asset('teamLogo/'.$team1->logo) }}" alt="Image" class="img-fluid">
            <h3>{{ $team1->name }}</h3>
            <ul class="list-unstyled">
              @foreach ($members_team1 as $member)
              <li>{{ $member->name }} {{ $member->family }}</li>
              @endforeach

            </ul>
          </div>
        </div>
        <div class="team-2 w-50">
          <div class="team-details w-100 text-center">
            <img src="{{ asset('teamLogo/'.$team2->logo) }}" alt="Image" class="img-fluid">
            <h3>{{ $team2->name }}</h3>
            <ul class="list-unstyled">
              @foreach ($members_team2 as $member)
              <li>{{ $member->name }} {{ $member->family }}</li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>