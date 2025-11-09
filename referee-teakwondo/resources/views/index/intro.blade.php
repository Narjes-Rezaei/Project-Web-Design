<div class="hero overlay" style="background-image: url('sign/img/bgt.jpg');">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-5 ml-auto">
        <h1 class="text-white">World Cup Event</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, molestias repudiandae pariatur.</p>
        <div id="date-countdown"></div>
        <p>
          @if(!Auth::check())
          <a href="{{ route('register') }}" class="btn btn-primary py-3 px-4 mr-3">Sign In/Sign Up</a>
          @endif
          @if(Auth::check())
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
          @csrf
          <button type="submit" class="btn btn-primary py-3 px-4 mr-3">Log Out</button>
        </form>

        @endif
        <a href="#" class="more light">Learn More</a>
        </p>
      </div>
    </div>
  </div>
</div>