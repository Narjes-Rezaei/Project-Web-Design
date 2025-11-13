<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="sidebar-brand brand-logo" href="index.html"><img src="admin/assets/images/logo.svg" alt="logo" /></a>
    <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="admin/assets/images/logo-mini.svg" alt="logo" /></a>
  </div>
  <ul class="nav">
    <li class="nav-item profile">
      <div class="profile-desc">
        <div class="profile-pic">
          <div class="count-indicator">
            <img class="img-xs rounded-circle " src="{{ Auth::user()->photo ? asset('userProfile/'.Auth::user()->photo) : asset('userProfile/profile.png')}}" alt="">
            <span class="count bg-success"></span>
          </div>
          <div class="profile-name">
            <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }} {{ Auth::user()->family }}</h5>
            <span> @if (Auth::user()->super_user)
              Super User
              @elseif (Auth::user()->sttaf)
              Staff
              @endif
            </span>
          </div>
        </div>
        <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-settings text-primary"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-onepassword  text-info"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-calendar-today text-success"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
            </div>
          </a>
        </div>
      </div>
    </li>
    <li class="nav-item nav-category">
      <span class="nav-link">Navigation</span>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('zodiac') }}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">User</span>
      </a>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('show-match-video') }}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Match Video</span>
      </a>
    </li>


    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('show-our-blog') }}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Our Blog</span>
      </a>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('show-event-rank') }}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Event Rank</span>
      </a>
    </li>


    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('show-permission') }}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Permission</span>
      </a>
    </li>



    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('show-event-type') }}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Event Type</span>
      </a>
    </li>



    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('show-province') }}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Province</span>
      </a>
    </li>


    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('show-role') }}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Role</span>
      </a>
    </li>


    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('show-gender') }}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Gender</span>
      </a>
    </li>


    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('show-degree') }}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Degree</span>
      </a>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('show-referee') }}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Referee</span>
      </a>
    </li>


    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('show-team') }}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Team</span>
      </a>
    </li>


    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('show-member') }}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Member's Team</span>
      </a>
    </li>


    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('show-match') }}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Match</span>
      </a>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('show-team-match') }}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Add Team To Match</span>
      </a>
    </li>






    <!-- @can('show-photo')
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('show-photo') }}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Photo</span>
      </a>
    </li>
    @endcan
    @can('show-blog')
    
    @endcan
    @can('show-message')
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('show-message') }}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Message</span>
      </a>
    </li>
    @endcan
    @can('show-development')
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('show-development') }}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Development</span>
      </a>
    </li>
    @endcan
    @can('show-role')
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('show-role') }}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Role</span>
      </a>
    </li>
    @endcan
    @can('show-permission')
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('show-permission') }}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Permission</span>
      </a>
    </li>
    @endcan
    @can('show-anything')
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('show-anything') }}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Anything</span>
      </a>
    </li>
    @endcan -->
  </ul>
</nav>