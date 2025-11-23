<script>
  var targetDate = "{{ $targetDate }}";
</script>

<div class="hero overlay" style="background-image: url('sign/img/bgt.jpg');" id="intro">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-5 ml-auto">
        <h1 class="text-white">Taekwondo Cup Event</h1>
        <p>Taekwondo is a discipline where strength meets serenity, and every kick becomes a promise of courage, resilience, and the relentless pursuit of mastery.</p>
        <div id="date-countdown"></div>
        <p>
          @if(!Auth::check())
          <a href="{{ route('register') }}" class="btn btn-primary py-3 px-4 mr-3" id="last-result">Sign In/Sign Up</a>
          @endif
          @if(Auth::check())
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
          @csrf
          <button type="submit" class="btn btn-primary py-3 px-4 mr-3" id="last-result">Log Out</button>
        </form>

        @endif
        </p>
      </div>
    </div>
  </div>
</div>