@if ($item['submenu'] == [])
<li class="nav-item">
    <a href="{{ url($item['link']) }}" class="nav-link">
        <i class="nav-icon fa fa-th"></i>
        <p>
            {{ $item['name'] }}
            <span class="right badge badge-danger">New</span>
        </p>
    </a>
</li>
@else
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-tree"></i>
        <p>
            {{ $item['name'] }} 
            <i class="fa fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @foreach ($item['submenu'] as $submenu)
        @if ($submenu['submenu'] == [])
        <li class="nav-item"><a href="{{ $submenu['link'] }}" class="nav-link">
            <i class="fa fa-circle-o nav-icon"></i>
            <p>{{ $submenu['name'] }} </p>
            </a>
        </li>
        @else
        @include('partials.menu-item', [ 'item' => $submenu ])
        @endif
        @endforeach
    </ul>
</li>
@endif


