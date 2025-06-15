<ul class="sidebar-menu p-4 space-y-2">
    <pre>{{ print_r($menus->toArray(), true) }}</pre>

    @foreach ($menus as $menu)
        <li>
            <a href="{{ $menu->url ?? '#' }}"
                class="flex items-center px-3 py-2 rounded hover:bg-gray-200
                {{ request()->is($menu->url) ? 'bg-gray-300 font-semibold' : '' }}">
                <i class="{{ $menu->icon ?? 'fa fa-circle' }} me-2"></i>
                <span>{{ $menu->name }}</span>
            </a>
        </li>
    @endforeach
</ul>
