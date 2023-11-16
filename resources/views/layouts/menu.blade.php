<li>
    <a href="{{ url('/home') }}">
        <i data-feather="home"></i>
        <span class="badge rounded-pill bg-success-subtle text-success float-end">9+</span>
        <span data-key="t-dashboard">Dashboard</span>
    </a>
</li>
<li class="menu-title" data-key="t-apps">Main</li>
<li>
    <a href="{{ route('appointments.index') }}">
        <i data-feather="message-square"></i>
        <span data-key="t-chat">Appointments</span>
    </a>
</li>
<li>
    <a href="javascript: void(0);" class="has-arrow">
        <i data-feather="shopping-cart"></i>
        <span data-key="t-ecommerce">Settings</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li>
            <a href="{{ route('cities.index') }}" class="nav-link {{ Request::is('cities*') ? 'active' : '' }}"
                key="t-products">
                Cities
            </a>
        </li>
        <li>
            <a href="{{ route('clinicUsers.index') }}"
                class="nav-link {{ Request::is('clinicUsers*') ? 'active' : '' }}" data-key="t-product-detail">
                Clinic Users
            </a>
        </li>
        <li>
            <a href="{{ route('countries.index') }}" class="nav-link {{ Request::is('countries*') ? 'active' : '' }}"
                data-key="t-orders">
                Countries
            </a>
        </li>
        <li>
            <a href="{{ route('countryPhoneCodes.index') }}"
                class="nav-link {{ Request::is('countryPhoneCodes*') ? 'active' : '' }}" data-key="t-customers">
                Country Phone Codes
            </a>
        </li>
        <li>
            <a href="{{ route('currencyLists.index') }}"
                class="nav-link {{ Request::is('currencyLists*') ? 'active' : '' }}" data-key="t-customers">
                Currency Lists
            </a>
        </li>
        <li>
            <a href="{{ route('roles.index') }}" class="nav-link {{ Request::is('roles*') ? 'active' : '' }}"
                data-key="t-roles">
                Roles
            </a>
        </li>

        <li>
            <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}"
                data-key="t-users">
                Users
            </a>
        </li>

        <li>
            <a href="{{ route('userStages.index') }}"
                class="nav-link {{ Request::is('userStages*') ? 'active' : '' }}" data-key="t-userStages">
                User Stages
            </a>
        </li>

        <li>
            <a href="{{ route('subServices.index') }}"
                class="nav-link {{ Request::is('subServices*') ? 'active' : '' }}" data-key="t-subServices">
                Sub Services
            </a>
        </li>

        <li>
            <a href="{{ route('states.index') }}" class="nav-link {{ Request::is('states*') ? 'active' : '' }}"
                data-key="t-states">
                States
            </a>
        </li>

        <li>
            <a href="{{ route('stages.index') }}" class="nav-link {{ Request::is('stages*') ? 'active' : '' }}"
                data-key="t-stages">
                Stages
            </a>
        </li>

        <li>
            <a href="{{ route('comments.index') }}" class="nav-link {{ Request::is('comments*') ? 'active' : '' }}"
                data-key="t-comments">
                Comments
            </a>
        </li>

        <li>
            <a href="{{ route('services.index') }}" class="nav-link {{ Request::is('services*') ? 'active' : '' }}"
                data-key="t-services">
                Services
            </a>
        </li>

        <li>
            <a href="{{ route('passwordResets.index') }}"
                class="nav-link {{ Request::is('passwordResets*') ? 'active' : '' }}" data-key="t-passwordResets">
                Password Resets
            </a>
        </li>

        <li>
            <a href="{{ route('generalSettings.index') }}"
                class="nav-link {{ Request::is('generalSettings*') ? 'active' : '' }}" data-key="t-generalSettings">
                General Settings
            </a>
        </li>

    </ul>
</li>



<li>
    <a href="javascript: void(0);" class="has-arrow">
        <i data-feather="mail"></i>
        <span data-key="t-email">Email</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="apps-email-inbox.html" data-key="t-inbox">Inbox</a></li>
        <li><a href="apps-email-read.html" data-key="t-read-email">Read Email</a></li>
    </ul>
</li>

<li>
    <a href="apps-calendar.html">
        <i data-feather="calendar"></i>
        <span data-key="t-calendar">Calendar</span>
    </a>
</li>

<li>
    <a href="javascript: void(0);" class="has-arrow">
        <i data-feather="users"></i>
        <span data-key="t-contacts">Contacts</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="apps-contacts-grid.html" data-key="t-user-grid">User Grid</a></li>
        <li><a href="apps-contacts-list.html" data-key="t-user-list">User List</a></li>
        <li><a href="apps-contacts-profile.html" data-key="t-profile">Profile</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);" class="has-arrow">
        <i data-feather="trello"></i>
        <span data-key="t-tasks">Tasks</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="tasks-list.html" key="t-task-list">Task List</a></li>
        <li><a href="tasks-kanban.html" key="t-kanban-board">Kanban Board</a></li>
        <li><a href="tasks-create.html" key="t-create-task">Create Task</a></li>
    </ul>
</li>
