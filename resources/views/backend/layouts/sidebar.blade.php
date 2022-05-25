<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="/admin/template/index.html">
            <i class="mdi mdi-home menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="mdi mdi-circle-outline menu-icon"></i>
            <span class="menu-title">Category</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{ route('category.create') }}">Add Category</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{ route('category.index') }}">Manage Categories</a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">Subcategory</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic1">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('subcategory.create') }}">Add Subcategory</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('subcategory.index') }}">Manage Subcategories</a></li>
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">Childcategory</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic2">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('childcategory.create') }}">Add Childcategory</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('childcategory.index') }}">Manage Childcategories</a></li>
              </ul>
            </div>
          </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('all.ads') }}">
            <i class="mdi mdi-chart-pie menu-icon"></i>
            <span class="menu-title">All Advertisments</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all.reported.ads') }}">
            <i class="mdi mdi-chart-pie menu-icon"></i>
            <span class="menu-title">All reported ads</span>
          </a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" href="/admin/template/pages/tables/basic-table.html">
            <i class="mdi mdi-grid-large menu-icon"></i>
            <span class="menu-title">Tables</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/admin/template/pages/icons/mdi.html">
            <i class="mdi mdi-emoticon menu-icon"></i>
            <span class="menu-title">Icons</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <i class="mdi mdi-account menu-icon"></i>
            <span class="menu-title">User Pages</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="/admin/template/pages/samples/login.html"> Login </a></li>
              <li class="nav-item"> <a class="nav-link" href="/admin/template/pages/samples/login-2.html"> Login 2 </a></li>
              <li class="nav-item"> <a class="nav-link" href="/admin/template/pages/samples/register.html"> Register </a></li>
              <li class="nav-item"> <a class="nav-link" href="/admin/template/pages/samples/register-2.html"> Register 2 </a></li>
              <li class="nav-item"> <a class="nav-link" href="/admin/template/pages/samples/lock-screen.html"> Lockscreen </a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/admin/template/documentation/documentation.html">
            <i class="mdi mdi-file-document-box-outline menu-icon"></i>
            <span class="menu-title">Documentation</span>
          </a>
        </li> --}}
      </ul>
    </nav>

