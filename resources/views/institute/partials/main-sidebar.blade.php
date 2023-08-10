  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.index') }}" class="brand-link">
      <img src="{{ asset('backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset(auth()->user()->profile) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('institute.index') }}" class="nav-link {{ Request::url() == route('institute.index') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>


          {{-- <li class="nav-item">
            <a href="{{ route('user.list') }}" class="nav-link {{ Request::url() == route('user.list') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Users
              </p>
            </a>
          </li> --}}

          <li class="nav-item {{  Request::url() == route('user.list') || Request::url() == route('user.create') ? 'menu-is-opening menu-open' : ''  }}">
            <a href="#" class="nav-link {{  Request::url() == route('user.list') || Request::url() == route('user.create') ? 'active' : ''  }}">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('user.list') }}" class="nav-link {{ Request::url() == route('user.list') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>User List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.create') }}" class="nav-link {{ Request::url() == route('user.create') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add User</p>
                    </a>
                </li>
            </ul>
          </li>

          <li class="nav-item {{  Request::url() == route('payment-method.index') || Request::url() == route('payment-method.create') ? 'menu-is-opening menu-open' : ''  }}">
            <a href="#" class="nav-link {{  Request::url() == route('payment-method.index') || Request::url() == route('payment-method.create') ? 'active' : ''  }}">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Payment Method
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('payment-method.index') }}" class="nav-link {{ Request::url() == route('payment-method.index') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List Payment Method</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('payment-method.create') }}" class="nav-link {{ Request::url() == route('payment-method.create') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create Payment Method</p>
                    </a>
                </li>
            </ul>
          </li>

          <li class="nav-item {{  Request::url() == route('blog.index') || Request::url() == route('blog.create') ? 'menu-is-opening menu-open' : ''  }}">
            <a href="#" class="nav-link {{  Request::url() == route('blog.index') || Request::url() == route('blog.create') ? 'active' : ''  }}">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Blogs
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('blog.index') }}" class="nav-link {{ Request::url() == route('blog.index') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List Blog</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('blog.create') }}" class="nav-link {{ Request::url() == route('blog.create') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create Blog</p>
                    </a>
                </li>
            </ul>
          </li>

          {{-- <li class="nav-item {{  Request::url() == route('teacher.index') || Request::url() == route('teacher.create') ? 'menu-is-opening menu-open' : ''  }}">
            <a href="#" class="nav-link {{  Request::url() == route('teacher.index') || Request::url() == route('teacher.create') ? 'active' : ''  }}">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Teacher's
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('teacher.index') }}" class="nav-link {{ Request::url() == route('teacher.index') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List Teacher</p>
                    </a>
                </li>

              <li class="nav-item">
                <a href="{{ route('teacher.create') }}" class="nav-link {{ Request::url() == route('teacher.create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Teacher</p>
                </a>
              </li>
            </ul>
          </li> --}}

















          <li class="nav-item menu-open">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="nav-icon fa fa-power-off"></i> <p>
                Logout
              </p>
            </a>



            {{-- <a role="menuitem" tabindex="-1" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off"></i> Logout</a> --}}
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>


          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
