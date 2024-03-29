<li>
    <a href="{{ roleBasedRoute('index') }}">
            <i style="width:20px; height:20px" class="me-2" data-feather="home"></i>                
            {{-- <span class="badge rounded-pill bg-success-subtle text-success float-end">9+</span> --}}
            <span data-key="t-dashboard">Dashboard</span>    
    </a>
</li>

@can('is_user')
    <li class="menu-title" data-key="t-apps">Details</li>

    <li>
        <a href="{{ route('user.appointments.index') }}">  
            <i style="width:20px; height:20px" class="me-2" data-feather="calendar"></i>
            @if(!is_null(userPendingAppointments()))
                <span class="badge rounded-pill bg-danger-subtle text-danger float-end">{{userPendingAppointments()}}+</span>
            @endif
            <span data-key="t-calendar">Appoinments</span>           
        </a>
    </li>
    <li>
        <a href="javascript: void(0);" class="has-arrow">
            <i style="width:20px; height:20px" class="me-2" data-feather="trello"></i>
            @if(!is_null(userPendingTransactions()))
                <span class="badge rounded-pill bg-danger-subtle text-danger float-end">{{userPendingTransactions()}}+</span>
            @endif
            <span data-key="t-tasks">Transactions</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li>
                <a href="{{ route('user.transactions.initiated') }}" class="nav-link {{ Request::is('user/transactions/initiated') ? 'active' : '' }}">
                    <i style="width:20px; height:20px" class="me-2" data-feather="trello"></i>
                    @if(!is_null(userPendingTransactions()))
                        <span class="badge rounded-pill bg-danger-subtle text-danger float-end">{{userPendingTransactions()}}+</span>
                    @endif
                    <span data-key="t-tasks">Initiated Transactions</span>
                </a>
            </li>
            <li>
                <a href="{{ route('user.transactions.index') }}" class="nav-link {{ Request::is('user/transactions/') ? 'active' : '' }}">
                    <i style="width:20px; height:20px" class="me-2" data-feather="trello"></i>
                    <span data-key="t-tasks">All Transactions</span>
                </a>
            </li>
        
        </ul>
    </li>
    <li>
        <a href="{{$settings->whatsapp_contact}}">
            <i style="width:20px; height:20px" class="me-2" data-feather="message-circle"></i>
            <span data-key="t-tasks">Contact Admin</span>
        </a>
    </li>
@endcan




{{-- admin --}}
@can('is_staff')
    <li class="menu-title" data-key="t-apps">Details</li>

    <li>
        <a href="javascript: void(0);" class="has-arrow">
            <i style="width:20px; height:20px" class="me-2" data-feather="calendar"></i>
            <span data-key="t-calendar">Appointments</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
        <li>
                <a href="{{ roleBasedRoute('appointments.create') }}"
                    class="nav-link {{ Request::is('appointments/create') ? 'active' : '' }}" key="t-products">
                    Create Appointment
                </a>
            </li>
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
            <i style="width:20px; height:20px" class="me-2" data-feather="trello"></i>
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
            <i style="width:20px; height:20px" class="me-2" data-feather="link-2"></i>
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
            <i style="width:20px; height:20px" class="me-2" data-feather="user-plus"></i>
            <span data-key="t-dashboard">Staff</span>
        </a>
    </li>
    <li>
        <a href="{{ route('admin.users.index') }}" wire:navigate>
            <i style="width:20px; height:20px" class="me-2" data-feather="user-plus"></i>
            <span data-key="t-dashboard">Users</span>
        </a>
    </li>
    <li>
        <a href="javascript: void(0);" class="has-arrow">
            <i style="width:20px; height:20px" class="me-2" data-feather="settings"></i>
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
        <i style="width:20px; height:20px" class="me-2" data-feather="user"></i>
        <span data-key="t-user">Profile</span>
    </a>
</li>



{{-- <li>
   
            <form action="{{ route('logout') }}" method="post">
                @csrf
                 <a style="cursor: pointer;">
                <button type="submit" style="border: none; background: none; cursor: pointer;">
                    <i style="width:20px; height:20px" class="me-2" data-feather="power"></i>
                    <span data-key="t-email">Log Out</span>
                </button>
                 </a>
            </form>
   
    
</li> --}}
{{-- <li> 
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="dropdown-item"><i style="width:20px; height:20px" class="me-2"
                class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</button>
    </form>
</li> --}}
