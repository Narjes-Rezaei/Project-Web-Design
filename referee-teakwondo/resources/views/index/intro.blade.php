<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Taekwondo Cup Event</title>

  
</head>

<body>

  <script>
    var targetDate = "{{ $targetDate }}";
  </script>

  <div class="hero overlay" style="background-image: url('sign/img/bgt.jpg');" id="intro" data-aos="fade-up" data-aos-duration="500">
    <div class="container" data-aos="fade-up" data-aos-duration="600">
      <div class="row align-items-center" data-aos="fade-up" data-aos-duration="700">
        <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-duration="800">
          <h1 class="text-white" data-aos="fade-right" data-aos-duration="900">Taekwondo Cup Event</h1>
          <p data-aos="fade-right" data-aos-duration="2000">Taekwondo is a discipline where strength meets serenity, and every kick becomes a promise of courage, resilience, and the relentless pursuit of mastery.</p>
          <div id="date-countdown" data-aos="zoom-in" data-aos-duration="1000"></div>
          <p data-aos="fade-up" data-aos-duration="1100">
            @if(!Auth::check() && !Auth::guard('referee')->check())
            <a href="{{ route('register') }}" class="btn btn-primary py-3 px-4 mr-3" id="last-result" data-aos="fade-left" data-aos-duration="1200">Sign In/Sign Up</a>
            @endif
            @if(Auth::check()|| Auth::guard('referee')->check())
          <form action="{{ route('logout') }}" method="POST" style="display: inline;" data-aos="fade-left" data-aos-duration="1200">
            @csrf
            <button type="submit" class="btn btn-primary py-3 px-4 mr-3" id="last-result">Log Out</button>
          </form>
          <form action="{{ route('profile') }}" method="GET" style="display: inline;" data-aos="fade-left" data-aos-duration="1200">
            @csrf
            @method('GET')
            <button type="submit" class="btn btn-outline-primary py-3 px-4 mr-3" id="last-result">Profile</button>
          </form>
          @endif
          </p>
        </div>
      </div>
    </div>
  </div>

  

</body>

</html>