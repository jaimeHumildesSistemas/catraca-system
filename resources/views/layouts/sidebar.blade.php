<ul class="sidebar-menu p-4 space-y-2">

    @foreach ($menus as $menu)
        <li>
            <a href="{{ route($menu->route) }}"
                class="flex items-center px-3 py-2 rounded hover:bg-gray-200
                {{ request()->routeIs($menu->route) ? 'bg-gray-300 font-semibold' : '' }}">
                <i class="{{ $menu->icon ?? 'fa fa-circle' }} me-2"></i>
                <span>{{ $menu->username }}</span>
            </a>
        </li>
    @endforeach
</ul>
