 @can('is_admin')
         <li>
            <a href="{{ roleBasedRoute('settings.index') }}"
                class="nav-link {{ Request::is('settings*') ? 'active' : '' }}" data-key="t-generalSettings" wire:navigate>
                General Settings
            </a>
        </li>
    @endcan