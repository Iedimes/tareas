<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>

            @if (Auth::user()->rol_app->rol_name['id'] == 1)

            <li class="nav-item"><a class="nav-link" href="{{ url('admin/tasks') }}"><i class="nav-icon icon-list"></i> {{ trans('admin.task.title') }}</a></li>

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/roles') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.role.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/role-admin-users') }}"><i class="nav-icon icon-magnet"></i> {{ trans('admin.role-admin-user.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/states') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.state.title') }}</a></li>

            {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li> --}}
            @elseif (Auth::user()->rol_app->rol_name['id'] == 2)
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/tasks') }}"><i class="nav-icon icon-list"></i> {{ trans('admin.task.title') }}</a></li>
             @else

            <li class="nav-item"><a class="nav-link" href="{{ url('admin/detail-tasks') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.detail-task.title') }}</a></li>



           @endif

        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
