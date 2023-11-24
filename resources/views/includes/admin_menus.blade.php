 @can('is_admin')
     

 <li>
            <a href="{{ roleBasedRoute('clinicUsers.index') }}"
                class="nav-link {{ Request::is('clinicUsers*') ? 'active' : '' }}" data-key="t-product-detail">
                Clinic Users
            </a>
        </li>
         <li>
            <a href="{{ roleBasedRoute('currencyLists.index') }}"
                class="nav-link {{ Request::is('currencyLists*') ? 'active' : '' }}" data-key="t-customers">
                Currency Lists
            </a>
        </li>
        <li>
            <a href="{{ roleBasedRoute('roles.index') }}" class="nav-link {{ Request::is('roles*') ? 'active' : '' }}"
                data-key="t-roles">
                Roles
            </a>
        </li>
        <li>
            <a href="{{ roleBasedRoute('userStages.index') }}"
                class="nav-link {{ Request::is('userStages*') ? 'active' : '' }}" data-key="t-userStages">
                User Stages
            </a>
        </li>
         <li>
            <a href="{{ roleBasedRoute('generalSettings.index') }}"
                class="nav-link {{ Request::is('generalSettings*') ? 'active' : '' }}" data-key="t-generalSettings">
                General Settings
            </a>
        </li>
    @endcan