<li>
    <a href="{{ roleBasedRoute('index') }}">
        <i data-feather="home"></i>
        <span class="badge rounded-pill bg-success-subtle text-success float-end">9+</span>
        <span data-key="t-dashboard">Dashboard</span>
    </a>
</li>

@can('is_user')
    <li class="menu-title" data-key="t-apps">Details</li>

    <li>
        <a href="{{ route('user.appointments') }}">
            <i data-feather="calendar"></i>
            <span data-key="t-calendar">Appoinments</span>
        </a>
    </li>
    <li>
        <a href="{{ route('user.transactions') }}">
            <i data-feather="trello"></i>
            <span data-key="t-tasks">Transactions</span>
        </a>
    </li>
@endcan




{{-- admin --}}
@can('is_staff')
    <li class="menu-title" data-key="t-apps">Details</li>

    <li>
        <a href="javascript: void(0);" class="has-arrow">
            <i data-feather="calendar"></i>
            <span data-key="t-calendar">Appointments</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li>
                <a href="{{ roleBasedRoute('appointments.pending') }}"
                    class="nav-link {{ Request::is('appointments/pending-appointments') ? 'active' : '' }}" key="t-products">
                    Pending Appointments
                </a>
            </li>
            <li>
                <a href="{{ roleBasedRoute('appointments.index') }}"
                    class="nav-link {{ Request::is('appointments.index') ? 'active' : '' }}" key="t-products">
                    All Appointments
                </a>
            </li>
        </ul>
    </li>

    <li>
        <a href="javascript: void(0);" class="has-arrow">
            <i data-feather="trello"></i>
            <span data-key="t-tasks">Transactions</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li>
                <a href="{{ roleBasedRoute('transactions.pending') }}"
                    class="nav-link {{ Request::is('transactions/pending-transactions') ? 'active' : '' }}" key="t-products">
                    Pending Transactions
                </a>
            </li>
            <li>
                <a href="{{ roleBasedRoute('transactions') }}"
                    class="nav-link {{ Request::is('transactions*') ? 'active' : '' }}" key="t-products">
                    All Transactions
                </a>
            </li>
        </ul>
    </li>

    <li>
        <a href="javascript: void(0);" class="has-arrow">
            <i data-feather="trello"></i>
            <span data-key="t-tasks">Referrals</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li>
                <a href="{{ roleBasedRoute('referrals.pending') }}"
                    class="nav-link {{ Request::is('referrals/pending-payouts') ? 'active' : '' }}" key="t-products">
                    Pending Referral Payouts
                </a>
            </li>
            <li>
                <a href="{{ roleBasedRoute('referrals.index') }}"
                    class="nav-link {{ Request::is('referrals') ? 'active' : '' }}" key="t-products">
                    All Referral Transactions
                </a>
            </li>
        </ul>
    </li>



    
@endcan

@can('is_admin')
    <li>
        <a href="{{ route('admin.staff.index') }}" wire:navigate>
            <i data-feather="home"></i>
            <span data-key="t-dashboard">Staff</span>
        </a>
    </li>
    <li>
        <a href="javascript: void(0);" class="has-arrow">
            <i data-feather="shopping-cart"></i>
            <span data-key="t-ecommerce">Settings</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li>
                <a href="{{ roleBasedRoute('subServices.index') }}"
                    class="nav-link {{ Request::is('subServices*') ? 'active' : '' }}" data-key="t-subServices" wire:navigate>
                    Sub Services
                </a>
            </li>

            <li>
                <a href="{{ roleBasedRoute('stages.index') }}"
                    class="nav-link {{ Request::is('stages*') ? 'active' : '' }}" data-key="t-stages" wire:navigate>
                    Stages
                </a>
            </li>

            <li>
                <a href="{{ roleBasedRoute('comments.index') }}"
                    class="nav-link {{ Request::is('comments*') ? 'active' : '' }}" data-key="t-comments" wire:navigate>
                    Comments
                </a>
            </li>

            <li>
                <a href="{{ roleBasedRoute('services.index') }}"
                    class="nav-link {{ Request::is('services*') ? 'active' : '' }}" data-key="t-services" wire:navigate>
                    Services
                </a>
            </li>


            @include('includes.admin_menus')

        </ul>
    </li>
@endcan



<li class="menu-title" data-key="t-apps">Account</li>
<li>
    <a href="{{ route('profile.index') }}" wire:navigate>
        <i data-feather="user"></i>
        <span data-key="t-user">Profile</span>
    </a>
</li>



{{-- <li>
   
            <form action="{{ route('logout') }}" method="post">
                @csrf
                 <a style="cursor: pointer;">
                <button type="submit" style="border: none; background: none; cursor: pointer;">
                    <i data-feather="power"></i>
                    <span data-key="t-email">Log Out</span>
                </button>
                 </a>
            </form>
   
    
</li> --}}
{{-- <li> 
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="dropdown-item"><i
                class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</button>
    </form>
</li> --}}
