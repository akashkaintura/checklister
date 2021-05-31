<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('home')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                </svg> {{ __('Dashboard') }}</a></li>

        @if (auth()->user()->is_admin)
            <li class="c-sidebar-nav-title">{{ __('Admin') }}</li>
                {{-- pages --}}
            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                 <a class="c-sidebar-nav-link" href="{{ route('admin.pages.index') }}">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                    </svg> {{ __('Pages')}}
                </a>
            </li>

             <li class="c-sidebar-nav-title">{{ __('Manage Checklists') }}</li>
            @foreach (ChecklistGroup::with('checklists')->get() as $group)
                <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle"
                        href="{{ route('admin.checklists_groups.edit', $group->id) }}">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                    </svg> {{ $group->name }}</a>
                    <ul class="c-sidebar-nav-dropdown-items">
                        @foreach ($group->checklists as $checklist)
                            <li class="c-sidebar-nav-item">
                                <a class="c-sidebar-nav-link" href="{{ route('admin.checklists.edit', $checklist->id) }}"><span class="c-sidebar-nav-icon"></span>
                                    {{ $checklist->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                    <a class="c-sidebar-nav-link" href="{{ route('admin.pages.index') }}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                        </svg> Pages
                    </a>
                </li>
            @endforeach
        @endif

        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                </svg> Base</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/breadcrumb.html"><span class="c-sidebar-nav-icon"></span> Breadcrumb</a></li>
            </ul>
        </li>

        {{-- Logout --}}
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                </svg> {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>
