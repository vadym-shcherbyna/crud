<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">

        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link @if($route == 'admin.dashboard') active @endif" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-speedometer2 me-2"></i> @lang('admin.dashboard.menu')</a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if($route == 'admin.items.index') active @endif" href="{{ route('admin.items.index') }}">
                    <i class="bi bi-card-list me-2"></i> @lang('admin.items.menu')</a>
            </li>

        </ul>

    </div>
</nav>