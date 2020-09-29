<div class="admin-header">
    <div class="container h-100 d-flex justify-content-between align-items-center">
        <ul class="d-flex align-items-center nav">
            @switch($route ?? null)
                @case('person')
                    <li><a href="{{ route('persons.management') }}">Person Management</a></li>
                    <li class="m-l-20"><a href="{{ route('persons.create') }}">Create Person</a></li>
                    <li class="m-l-20"><a href="">Edit Person</a></li>
                    @break
                @default
                    <li><a href="{{ route('user-management') }}">User Management</a></li>
                    <li class="m-l-20"><a href="{{ route('persons.management') }}">Person Management</a></li>
            @endswitch
        </ul>
        <div>
            <a href="{{ route('logout') }}">Logout</a>
        </div>
    </div>
</div>

