<div class="container" data-aos="fade-up" data-aos-duration="500">

  <div class="row" data-aos="fade-up" data-aos-duration="600">
    <div class="col-lg-12" data-aos="fade-up" data-aos-duration="700">

      <div class="d-flex team-vs" id="match-video" data-aos="fade-in" data-aos-duration="800">
        <span class="score" data-aos="zoom-in" data-aos-duration="900"> VS </span>

        <div class="team-1 w-50" data-aos="fade-right" data-aos-duration="1000">
          <div class="team-details w-100 text-center" data-aos="fade-up" data-aos-duration="1100">
            <img src="{{ asset('teamLogo/'.$team1->logo) }}" alt="Image" class="img-fluid" data-aos="zoom-in" data-aos-duration="1200">
            <h3 data-aos="fade-up" data-aos-duration="1300">{{ $team1->name }}</h3>
            <ul class="list-unstyled" data-aos="fade-up" data-aos-duration="1400">
              @foreach ($members_team1 as $member)
              <li>{{ $member->name }} {{ $member->family }}</li>
              @endforeach
            </ul>
          </div>
        </div>

        <div class="team-2 w-50" data-aos="fade-left" data-aos-duration="1000">
          <div class="team-details w-100 text-center" data-aos="fade-up" data-aos-duration="1100">
            <img src="{{ asset('teamLogo/'.$team2->logo) }}" alt="Image" class="img-fluid" data-aos="zoom-in" data-aos-duration="1200">
            <h3 data-aos="fade-up" data-aos-duration="1300">{{ $team2->name }}</h3>
            <ul class="list-unstyled" data-aos="fade-up" data-aos-duration="1400">
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
