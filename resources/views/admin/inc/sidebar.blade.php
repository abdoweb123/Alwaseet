<nav class="sidebar-nav">
    <ul>
        <x-nav-item title="{{ __('dash.dashboard') }}" icon="fa-solid fa-chart-simple"
            routeName="dashboard.home">
        </x-nav-item>
        <x-nav-item title="{{ __('dash.categories') }}" icon="fa-solid fa-sitemap"
            routeName="dashboard.categories" id="categories">
        </x-nav-item>
        <x-nav-item title="{{ __('dash.members') }}" icon="fa-solid fa-users"
            routeName="dashboard.members" id="members">
        </x-nav-item>
        <x-nav-item title="{{ __('dash.wallet') }}" icon="fa-solid fa-wallet"
                    routeName="dashboard.wallet" id="wallet">
        </x-nav-item>
        <x-nav-item title="{{ __('dash.workers') }}" icon="fa-solid fa-users"
                    routeName="dashboard.workers" id="members">
        </x-nav-item>
        <hr>
        <x-nav-item title="{{ __('dash.admins') }}" icon="fas fa-users-cog"
            routeName="dashboard.admins" id="admins">
        </x-nav-item>
        <x-nav-item title="{{ __('dash.public_setting') }}" icon="fas fa-tools"
            routeName="dashboard.public_setting">
        </x-nav-item>
        <x-nav-item title="{{ __('dash.slider') }}" icon="fa-solid fa-panorama"
            routeName="dashboard.slider">
        </x-nav-item>
        <x-nav-item title="{{ __('dash.contactus') }}" icon="fas fa-envelope-open-text"
            routeName="dashboard.contact_us">
        </x-nav-item>

        {{-- <x-nav-item title="{{ __('dash.contactus') }}" icon="fas fa-envelope-open-text"
            routeName="dashboard.contacts">
        </x-nav-item>
        <x-nav-item title="{{ __('dash.public_setting') }}" icon="fas fa-tools"
            routeName="dashboard.public_setting">
        </x-nav-item>
        <x-nav-item title="{{ __('dash.payment_methods') }}" icon="fa-solid fa-credit-card"
            routeName="dashboard.payment_methods">
        </x-nav-item>
        <x-nav-item title="{{ __('dash.about_us') }}" icon="fa-solid fa-file"
            routeName="dashboard.aboutus">
        </x-nav-item>
        <x-nav-item title="{{ __('dash.tac') }}" icon="fa-solid fa-file"
            routeName="dashboard.terms">
        </x-nav-item>
        <x-nav-item title="{{ __('dash.pp') }}" icon="fa-solid fa-file"
            routeName="dashboard.privacy">
        </x-nav-item> --}}
        {{-- <x-nav-item title="{{ __('dash.countries') }}" icon="fa-solid fa-flag"
            routeName="dashboard.countries">
        </x-nav-item> --}}

        {{-- <x-nav-item title="{{ __('dash.services') }}" icon="fa-solid fa-notes-medical"
            routeName="dashboard.services" id="services">
        </x-nav-item>
        <x-nav-item title="{{ __('dash.clients') }}" icon="fa-solid fa-users"
            routeName="dashboard.clients" id="clients">
        </x-nav-item>
        <x-nav-item title="{{ __('dash.newsletter') }}" icon="fa-regular fa-newspaper"
            routeName="dashboard.newsletters">
        </x-nav-item>
        <x-nav-item title="{{ __('dash.blogs') }}" icon="fa-solid fa-newspaper"
            routeName="dashboard.blogs" id="blogs">
        </x-nav-item>
        <x-nav-item title="{{ __('dash.public_setting') }}" icon="fas fa-tools"
            routeName="dashboard.public_setting">
        </x-nav-item>
        <x-nav-item title="{{ __('dash.side_pages') }}" icon="fa-solid fa-pager"
            routeName="dashboard.side_pages">
        </x-nav-item>
        <x-nav-item title="{{ __('dash.galleries') }}" icon="fa-regular fa-images"
            routeName="dashboard.galleries" id="galleries">
        </x-nav-item> --}}

        {{--<x-nav-item title="{{ __('dash.doctors') }}" icon="fa-solid fa-user-doctor"
            routeName="dashboard.doctors" id="doctors">
        </x-nav-item>
        <x-nav-item title="{{ __('dash.articles') }}" icon="fa-solid fa-newspaper"
            routeName="dashboard.articles" id="articles">
        </x-nav-item>

        <x-nav-item title="{{ __('dash.instructions') }}" icon="fa-solid fa-info"
            routeName="dashboard.instructions" id="instructions">
        </x-nav-item>
        <x-nav-item title="{{ __('dash.beforeAfter') }}" icon="fa-solid fa-arrows-rotate"
            routeName="dashboard.before-after" id="before-after">
        </x-nav-item>
        <x-nav-item title="{{ __('dash.locations') }}" icon="fa-solid fa-flag"
            routeName="dashboard.locations" id="locations">
        </x-nav-item>
        <x-nav-item title="{{ __('dash.managers') }}" icon="fa-solid fa-people-roof"
            routeName="dashboard.management-team" id="managers">
        </x-nav-item> --}}
        {{-- <x-nav-item title="Fields" icon="fa-solid fa-notes-medical"
            routeName="dashboard.fields" id="fields">
        </x-nav-item>
        <x-nav-item title="{{ __('dash.slider') }}" icon="fa-solid fa-panorama"
            routeName="dashboard.slider-images">
        </x-nav-item> --}}

        @if (lang('en'))
            <li class="nav-item">
                <a href="{{ route('lang', 'ar') }}">
                    <span class="icon text-center">
                        <img src="{{ asset('admin/language/ar.png') }}" style="width: 20px;" class="mx-2">
                    </span>
                    <span class="text">Arabic</span>
                </a>
            </li>
        @else
            <li class="nav-item">
                <a href="{{ route('lang', 'en') }}">
                    <span class="icon text-center">
                        <img src="{{ asset('admin/language/en.png') }}" style="border-radius: 50%;width: 20px;"
                            class="mx-2">
                    </span>
                    <span class="text">English</span>
                </a>
            </li>
        @endif
    </ul>
</nav>
