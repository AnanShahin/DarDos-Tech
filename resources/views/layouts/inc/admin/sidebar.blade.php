<aside class="left-sidebar sidebar-dark" id="left-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
      <!-- Aplication Brand -->
      <div class="app-brand bg-white">
        <a href="/admin/dashboard" class="logo-container">
            <img src="{{ asset($appSettings->logo ?? 'assets/images/logobg.png') }}" alt="{{ config('app.name') }}" class="img-fluid d-flex flex-column
             justify-content-center text-center" style="height: 70px">
        </a>
      </div>
      <!-- begin sidebar scrollbar -->
      <div class="sidebar-left" data-simplebar style="height: 100%;">
        <!-- sidebar menu -->
        <ul class="nav sidebar-inner" id="sidebar-menu">

            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
              <a class="sidenav-item-link" href="/admin/dashboard">
                <i class="fa-solid fa-gauge"></i>
                <span class="nav-text">Dashboard</span>
              </a>
            </li>

            <li  class="has-sub {{ Request::is('admin/blogs') ? 'active' : '' }}">
                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#blogs"
                  aria-expanded="false" aria-controls="blogs">
                  <i class="fa-brands fa-blogger-b"></i>
                  <span class="nav-text">blogs</span> <b class="caret"></b>
                </a>
                <ul  class="collapse"id="blogs"
                  data-parent="#sidebar-menu">
                  <div class="sub-menu">

                        <li>
                          <a class="sidenav-item-link" href="{{route('blogs.index')}}">
                            <span class="nav-text">blogs</span>
                          </a>
                        </li>

                        <li>
                          <a class="sidenav-item-link" href="{{route('blogs.create')}}">
                            <span class="nav-text">Create blogs</span>
                          </a>
                        </li>
                  </div>
                </ul>
            </li>

            <li class="{{ Request::is('admin/about') ? 'active' : '' }}">
                <a class="sidenav-item-link" href="{{ route('about.index') }}">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <span class="nav-text">About Us</span>
                </a>
            </li>

            <li class="has-sub {{ Request::is('admin/comments') ? 'active' : '' }}">
                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#comments" aria-expanded="false" aria-controls="comments">
                    <i class="fa-solid fa-comments"></i>
                    <span class="nav-text">Comments</span> <b class="caret"></b>
                </a>
                <ul class="collapse" id="comments" data-parent="#sidebar-menu">
                    <div class="sub-menu">
                        <li class="{{ Request::is('admin/comments') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="{{ route('comments.index') }}">
                                <span class="nav-text">View Comments</span>
                            </a>
                        </li>
                    </div>
                </ul>
            </li>

            <li class="section-title">
              Tools
            </li>

            <li  class="has-sub {{ Request::is('admin/roles') ? 'active' : '' }} {{ Request::is('admin/permissions') ? 'active' : '' }}" >
                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#privileges"
                  aria-expanded="false" aria-controls="privileges">
                  <i class="mdi mdi-account-key"></i>
                  <span class="nav-text">Privileges</span> <b class="caret"></b>
                </a>
                <ul  class="collapse"  id="privileges"
                  data-parent="#sidebar-menu">
                  <div class="sub-menu">

                        <li class="{{ Request::is('admin/roles') ? 'active' : '' }}">
                          <a class="sidenav-item-link" href="{{ route('roles.index') }}">
                            <span class="nav-text">Roles</span>
                          </a>
                        </li>

                        <li class="{{ Request::is('admin/permissions') ? 'active' : '' }}">
                          <a class="sidenav-item-link" href="{{ route('permissions.index') }}">
                            <span class="nav-text">Permissions</span>
                          </a>
                        </li>

                  </div>
                </ul>
              </li>

              <li  class="has-sub {{ Request::is('admin/users') ? 'active' : '' }}">
                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#users"
                  aria-expanded="false" aria-controls="users">
                  <i class="mdi mdi-account-box-multiple"></i>
                  <span class="nav-text">Users</span> <b class="caret"></b>
                </a>
                <ul  class="collapse"  id="users"
                  data-parent="#sidebar-menu">
                  <div class="sub-menu">
                        <li class="{{ Request::is('admin/users') ? 'active' : '' }}">
                          <a class="sidenav-item-link" href="{{ route('users.index') }}">
                            <span class="nav-text">Users List</span>
                          </a>
                        </li>
                  </div>
                </ul>
              </li>

            <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
                <a class="sidenav-item-link" href="{{ route('settings.index') }}">
                    <i class="fa-solid fa-gears"></i>
                    <span class="nav-text">Settings</span>
                </a>
            </li>
        </ul>

      </div>

      <div class="sidebar-footer">
        <div class="sidebar-footer-content">
          <ul>
            <li style="width: 100%">
              <a href="{{ route('settings.index') }}" data-toggle="tooltip" title="Website settings"><i class="mdi mdi-settings"></i></a>
            </li>
          </ul>
        </div>
      </div>

    </div>
  </aside>
