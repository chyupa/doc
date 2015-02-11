<nav class="navbar navbar-default">
    <ul class="nav navbar-nav topmenu">
        <li>{!! link_to_route('admin.get.dashboard', 'Home') !!}</li>
        <li>
            <a>Users</a>
            <div class="dropdown-menu submenu">
                {!! link_to_route('admin.get.users', 'Show all users', [], ['class'=>'block']) !!}
                {!! link_to_route('admin.get.create.user', 'Create User', [], ['class'=>'block']) !!}
            </div>
        </li>
        <li>
            <a>Categories</a>
            <div class="dropdown-menu submenu">
                {!! link_to_route('admin.get.categories', 'Show all categories', [], ['class'=>'block']) !!}
                {!! link_to_route('admin.get.create.category', 'Create Category', [], ['class'=>'block']) !!}
            </div>
        </li>
        <li>{!! link_to_route('auth.get.logout', 'Logout') !!}</li>
    </ul>
</nav>