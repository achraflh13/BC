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
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
          <a href="{{route('admin.dashboard')}}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item nav-category">Components</li>
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
                <a href="{{route('all.type')}}" class="nav-link">All fiches</a>
              </li>
              <li class="nav-item">
                <a href="{{route('add.type')}} " class="nav-link">Add fiches</a>
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
        <a href="{{route('all.amentie')}}" class="nav-link">All Planing</a>
      </li>
      <li class="nav-item">
        <a href="{{route('add.amentie')}}" class="nav-link">Add Planing</a>
      </li>

    </ul>
  </div>
</li>

<li class="nav-item nav-category">web apps</li>
<li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#emailss" role="button" aria-expanded="false" aria-controls="emails2">
        <i class="link-icon" data-feather="mail"></i>
        <span class="link-title">Users</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse" id="emailss">
        <ul class="nav sub-menu">
            <li class="nav-item">
                <a href="{{route('all.admin')}}" class="nav-link">Admin</a>
            </li>
            <li class="nav-item">
                <a href="{{route('all.agent')}}" class="nav-link">Agent</a>
            </li>
            <li class="nav-item">
                <a href="{{route('all.user')}}" class="nav-link">users</a>
            </li>
        </ul>
    </div>
</li>




<li class="nav-item nav-category"> permission</li>
<li class="nav-item">
  <a class="nav-link" data-bs-toggle="collapse" href="#emails1" role="button" aria-expanded="false" aria-controls="emails1">
    <i class="link-icon" data-feather="mail"></i>
    <span class="link-title"> permission</span>
    <i class="link-arrow" data-feather="chevron-down"></i>
  </a>
  <div class="collapse" id="emails1">
    <ul class="nav sub-menu">
      <li class="nav-item">
        <a href="{{route('all.permission')}}" class="nav-link">All Pemission</a>
      </li>
      <li class="nav-item">
        <a href="{{route('add.permission')}}" class="nav-link">Add permission</a>
      </li>

    </ul>
  </div>
</li>
<li class="nav-item nav-category">Role</li>
<li class="nav-item">
  <a class="nav-link" data-bs-toggle="collapse" href="#roles" role="button" aria-expanded="false" aria-controls="roles">
    <i class="link-icon" data-feather="mail"></i>
    <span class="link-title">Role</span>
    <i class="link-arrow" data-feather="chevron-down"></i>
  </a>
  <div class="collapse" id="roles">
    <ul class="nav sub-menu">
      <li class="nav-item">
        <a href="{{route('all.role')}}" class="nav-link">All Roles</a>
      </li>
      <li class="nav-item">
        <a href="{{route('add.role')}}" class="nav-link">Add role</a>
      </li>
    </ul>
  </div>
</li>


<li class="nav-item nav-category">Role in Permission</li>
<li class="nav-item">
  <a class="nav-link" data-bs-toggle="collapse" href="#roless" role="button" aria-expanded="false" aria-controls="roles">
    <i class="link-icon" data-feather="mail"></i>
    <span class="link-title">Role in Permission</span>
    <i class="link-arrow" data-feather="chevron-down"></i>
  </a>
  <div class="collapse" id="roless">
    <ul class="nav sub-menu">
      <li class="nav-item">
        <a href="{{route('add.roles.permission')}}" class="nav-link">Add Roles in Permission</a>
      </li>
      <li class="nav-item">
        <a href="{{route('all.roles.permission')}}" class="nav-link">All Roles in Permission</a>
      </li>
    </ul>
  </div>
</li>






      </ul>
    </div>
  </nav>
