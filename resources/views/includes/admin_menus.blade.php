 @can('is_admin')
     

 <li>
            <a href="{{ roleBasedRoute('clinicUsers.index') }}"
                class="nav-link {{ Request::is('clinicUsers*') ? 'active' : '' }}" data-key="t-product-detail" wire:navigate>
                Clinic Users
            </a>
        </li>
         <li>
            <a href="{{ roleBasedRoute('currencyLists.index') }}"
                class="nav-link {{ Request::is('currencyLists*') ? 'active' : '' }}" data-key="t-customers" wire:navigate>
                Currency Lists
            </a>
        </li>
        <li>
            <a href="{{ roleBasedRoute('roles.index') }}" class="nav-link {{ Request::is('roles*') ? 'active' : '' }}"
                data-key="t-roles" wire:navigate>
                Roles
            </a>
        </li>
        <li>
            <a href="{{ roleBasedRoute('userStages.index') }}"
                class="nav-link {{ Request::is('userStages*') ? 'active' : '' }}" data-key="t-userStages" wire:navigate>
                User Stages
            </a>
        </li>
         <li>
            <a href="{{ roleBasedRoute('settings.index') }}"
                class="nav-link {{ Request::is('settings*') ? 'active' : '' }}" data-key="t-generalSettings" wire:navigate>
                General Settings
            </a>
        </li>
    @endcan