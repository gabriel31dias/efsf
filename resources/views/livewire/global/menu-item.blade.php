@can('permission', $can)
<div>
    @if ($is_dropdown)
    <a class="dropdown-item"href='{{ $href }}' >
        <span class="nav-link-icon d-md-none d-lg-inline-block">
           <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
           <i class="{{ $classIcon }}"></i>
        </span>
        <span class="nav-link-title">
        {{ $title }}
        </span>
     </a>
    @else
    <li class="nav-item">
        <a class="nav-link" href='{{ $href }}' >
           <span class="nav-link-icon d-md-none d-lg-inline-block">
              <i class="{{ $classIcon }}"></i>
           </span>
           <span class="nav-link-title">
           {{ $title }}
           </span>
        </a>
     </li> 
    @endif

</div>
@endcan