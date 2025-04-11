<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
      <!--begin::Brand Link-->
      <a href="./index.html" class="brand-link">
        <!--begin::Brand Image-->
        <img
          src="../../dist/assets/img/comfarnet/logo.png"
          alt="Pos logo"
          class="brand-image opacity-75 shadow"
          height="100px"
          width="100px"
        />
        <!--end::Brand Image-->
        <!--begin::Brand Text-->
        <span class="brand-text fw-light">COMFARNET</span>
        <!--end::Brand Text-->
      </a>
      <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
      <nav class="mt-2">
        <!--begin::Sidebar Menu-->
        <ul
          class="nav sidebar-menu flex-column"
          data-lte-toggle="treeview"
          role="menu"
          data-accordion="false"
        >
        @if(Auth::user()->is_role == 1)
        <li class="nav-item">
          <a href="{{ url('admin/dashboard')}}" class="nav-link @if(Request::segment(1)== 'admin') active @endif">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('farmers/list')}}" class="nav-link @if(Request::segment(1)=='farmers') active @endif ">
            <i class="nav-icon bi bi-people"></i>
            <p>Farmers</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link @if(Request::segment(1)=='gardens') active @endif">
            <i class="nav-icon bi bi-cloud-snow-fill"></i>
            <p>Gardens</p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-sliders"></i>
            <p>System Settings</p>
          </a>
        </li>
        @elseif(Auth::user()->is_role==2)
        <li class="nav-item">
          <a href="{{ url('farmer/dashboard')}}" class="nav-link @if(Request::segment(1)== 'farmer') active @endif">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>Dashboard</p>
          </a>
        </li>
        @endif
          
          
          

        <!--end::Sidebar Menu-->
      </nav>
    </div>
    <!--end::Sidebar Wrapper-->
  </aside>
  <!--end::Sidebar-->