<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('Access Analytics') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'visitor' ? ' active' : '' }}">
        <a class="nav-link" href="{{route('visitors')}}">
          <i class="material-icons">account_circle</i>
            <p>{{ __('Visitors') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'visit-made' ? ' active' : '' }}">
        <a class="nav-link" href="#">
          <i class="material-icons">visibility</i>
            <p>{{ __('Visit Made') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'tracking' ? ' active' : '' }}">
        <a class="nav-link" href="{{route('tracking')}}">
          <i class="material-icons">track_changes</i>
          <p>{{ __('Tracking Link') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
