<aside class="menu">
    <p class="menu-label">
        General
    </p>
    <ul class="menu-list">
        <li><a class="{{ isActive('dashboard') }}" href="{{ route('dashboard') }}">
                <i class="fa fa-tachometer" aria-hidden="true"></i>
                Dashboard</a></li>
        @role('admin')        
        <li>
            <a class="{{ isActive('users.index') }}" href="{{ route('users.index') }}">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    Clients Manager</a>
        </li>
        @endrole
    </ul>
    <ul class="menu-list">
        <li>
            <a class="{{ isActive('projects.index') }}" href="{{ route('projects.index') }}">
                <i class="fa fa-tasks" aria-hidden="true"></i>
                Projects</a>
        </li>
        @role('admin')        
        <li>
            <a class="{{ isActive('clients.index') }}" href="{{ route('clients.index') }}">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    Add Client</a>
        </li>
        @endrole
    </ul>
    @role('admin')
    <ul class="menu-list">
        <li>
            <a class="{{ isActive('statuses.index') }}" href="{{ route('statuses.index') }}">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                    Statuses</a>
        </li> 
       
    </ul>
    <p class="menu-label">
        User
    </p>
    <ul class="menu-list">
        <li>
            <a class="{{ isActive('users.create') }}" href="{{ route('users.create') }}">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    New Clients Manager</a>
        </li>
    </ul>
    @endrole
</aside>