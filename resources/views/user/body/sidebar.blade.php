<nav class="sidebar">
    <div class="sidebar-header">
      <a href="#" class="sidebar-brand">
        Computer <span>LH</span>
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        <li class="nav-item nav-category">User</li>
        <li class="nav-item">
          <a href="{{route('agent.dashboard')}}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
            <i class="link-icon" data-feather="feather"></i>
            <span class="link-title">
                {{-- Property Type --}}
                Fiches de paie
            </span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="uiComponents">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{route('all.type')}}" class="nav-link">Voir fiches</a>
              </li>
            </ul>
          </div>
        </li>


<li class="nav-item">
  <a class="nav-link" data-bs-toggle="collapse" href="#emailso" role="button" aria-expanded="false" aria-controls="emails1">
    <i class="link-icon" data-feather="mail"></i>
    <span class="link-title">
        {{-- Amenties --}}
Planing    </span>
    <i class="link-arrow" data-feather="chevron-down"></i>
  </a>
  <div class="collapse" id="emailso">
    <ul class="nav sub-menu">
      <li class="nav-item">
        <a href="{{route('all.amentie')}}" class="nav-link">Voir Planing</a>
      </li>


    </ul>
  </div>
</li>














      </ul>
    </div>
  </nav>
