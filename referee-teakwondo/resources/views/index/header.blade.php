<header class="site-navbar py-4" role="banner">

  <div class="container">
    <div class="d-flex align-items-center">
      <div class="site-logo">
        <a href="index.html">
          <!-- <img src="index/images/logo.png" alt="Logo"> -->
        </a>
      </div>
      <div class="ml-auto">
        <nav class="site-navigation position-relative text-right" role="navigation">
          <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
            <li class="{{ request()->routeIs('/') ? 'active' : '' }}"><a href="#intro" class="nav-link">Home</a></li>
            <li class="{{ request()->routeIs('matches') ? 'active' : '' }}"><a href="#last-result" class="nav-link">Next Match</a></li>
            <li class="{{ request()->routeIs('players') ? 'active' : '' }}"><a href="#match-video" class="nav-link">Match Video</a></li>
            <li class="{{ request()->routeIs('blog') ? 'active' : '' }}"><a href="#referees" class="nav-link">Referees</a></li>
            <li class="{{ request()->routeIs('contact') ? 'active' : '' }}"><a href="#our-blog" class="nav-link">Our Blog</a></li>
            <li class="{{ request()->routeIs('contact') ? 'active' : '' }}"><a href="#footer" class="nav-link">Contact</a></li>
            @if(Auth::check())
            @if(auth()->user()->isSuperUser() || auth()->user()->isStaff())
            <li class="{{ request()->routeIs('zodiac') ? 'active' : '' }}"><a style="color: red;" href="{{ route('zodiac') }}" class="nav-link">Admin</a></li>
            @endif
            @endif
          </ul>
        </nav>

        <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right text-white"><span
            class="icon-menu h3 text-white"></span></a>
      </div>
    </div>
  </div>
</header>

<script>
  $(document).ready(function() {
    // انتخاب تمام لینک‌هایی که href شروع با #
    $('.site-menu a[href^="#"]').on('click', function(e) {
      e.preventDefault(); // جلوگیری از رفتار پیش‌فرض

      var target = this.hash; // گرفتن id هدف
      var $target = $(target);

      if ($target.length) {
        $('html, body').animate({
          scrollTop: $target.offset().top
        }, 800); // مدت زمان انیمیشن به میلی‌ثانیه
      }
    });
  });
</script>