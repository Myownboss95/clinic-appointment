<li>
    <a href="">
        <i data-feather="home"></i>
        <span class="badge rounded-pill bg-success-subtle text-success float-end">9+</span>
        <span data-key="t-dashboard">Dashboard</span>
    </a>
</li>
<li class="menu-title" data-key="t-apps">Main</li>

@can('is_user')
    
<li>
    <a href="{{route('user.appointments')}}">
        <i data-feather="calendar"></i>
        <span data-key="t-calendar">Appoinments</span>
    </a>
</li>
<li>
    <a href="{{route('user.transactions')}}">
        <i data-feather="trello"></i>
        <span data-key="t-tasks">Transactions</span>
    </a>
</li>

@endcan

@can('is_staff')
    

<li>
    <a href="{{ roleBasedRoute('appointments.index') }}">
        <i data-feather="calendar"></i>
        <span data-key="t-calendar">Appointments</span>
    </a>
</li>
<li>
    <a href="javascript: void(0);" class="has-arrow">
        <i data-feather="shopping-cart"></i>
        <span data-key="t-ecommerce">Settings</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li>
            <a href="{{ roleBasedRoute('cities.index') }}" class="nav-link {{ Request::is('cities*') ? 'active' : '' }}"
                key="t-products">
                Cities
            </a>
        </li>
       <li>
            <a href="{{ roleBasedRoute('countries.index') }}" class="nav-link {{ Request::is('countries*') ? 'active' : '' }}"
                data-key="t-orders">
                Countries
            </a>
        </li>
        <li>
            <a href="{{ roleBasedRoute('countryPhoneCodes.index') }}"
                class="nav-link {{ Request::is('countryPhoneCodes*') ? 'active' : '' }}" data-key="t-customers">
                Country Phone Codes
            </a>
        </li>
       

        <li>
            <a href="{{ roleBasedRoute('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}"
                data-key="t-users">
                Users
            </a>
        </li>

        

        <li>
            <a href="{{ roleBasedRoute('subServices.index') }}"
                class="nav-link {{ Request::is('subServices*') ? 'active' : '' }}" data-key="t-subServices">
                Sub Services
            </a>
        </li>

        <li>
            <a href="{{ roleBasedRoute('states.index') }}" class="nav-link {{ Request::is('states*') ? 'active' : '' }}"
                data-key="t-states">
                States
            </a>
        </li>

        <li>
            <a href="{{ roleBasedRoute('stages.index') }}" class="nav-link {{ Request::is('stages*') ? 'active' : '' }}"
                data-key="t-stages">
                Stages
            </a>
        </li>

        <li>
            <a href="{{ roleBasedRoute('comments.index') }}" class="nav-link {{ Request::is('comments*') ? 'active' : '' }}"
                data-key="t-comments">
                Comments
            </a>
        </li>

        <li>
            <a href="{{ roleBasedRoute('services.index') }}" class="nav-link {{ Request::is('services*') ? 'active' : '' }}"
                data-key="t-services">
                Services
            </a>
        </li>

        <li>
            <a href="{{ roleBasedRoute('passwordResets.index') }}"
                class="nav-link {{ Request::is('passwordResets*') ? 'active' : '' }}" data-key="t-passwordResets">
                Password Resets
            </a>
        </li>

       @include('includes.admin_menus')

    </ul>
</li>
@endcan



<li class="menu-title" data-key="t-apps">Account</li>
<li>
    <a style="cursor: pointer;">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" style="border: none; background: none; cursor: pointer;">
                    <i data-feather="power"></i>
                    <span data-key="t-email">Log Out</span>
                </button>
            </form>
    </a>
    
</li>
{{-- <li> 
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="dropdown-item"><i
                class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</button>
    </form>
</li> --}}