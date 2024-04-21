@push('scripts')
    <style>
      #ubahSesi:hover{
        color: #9FA6B2 !important;
        transition: 300ms ease-in-out;
      }
    </style>
@endpush

<div class="navbar-custom-menu">
  <ul class="nav navbar-nav">
    </li>

    <li class="dropdown user user-menu">
      <a href="#" style="text-transform: uppercase" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-user"></i>
          <span class="hidden-xs">
              @yield('user-login')
          </span>
      </a>
    </li>
    <!-- Control Sidebar Toggle Button -->
    <li style="background:#dc3545;">
      @auth
          <a data-toggle="control-sidebar" href="{{ route('logout') }}"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fa fa-power-off"></i>&nbsp; {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
      @endauth
    </li>
  </ul>
</div>
