<div id="nav" class="nav-container d-flex">
    <div class="nav-content d-flex">
        <!-- Logo Start -->
        <div class="logo position-relative">
            <a href="{{route('administration.dashboard')}}">
                <!-- Logo can be added directly -->
                <img src="{{ asset('img/logo/logo-light.svg') }}" alt="logo" />
            </a>
        </div>
        <!-- Logo End -->

        <!-- Language Switch Start -->
        <div class="language-switch-container">
            <button class="btn btn-empty language-button dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ strtoupper(app()->getLocale()) }}
            </button>
            <div class="dropdown-menu">
                <a href="{{ route('lang.switch', 'es') }}" class="dropdown-item {{ app()->getLocale() == 'es' ? 'active' : '' }}">ES</a>
                <a href="{{ route('lang.switch', 'en') }}" class="dropdown-item {{ app()->getLocale() == 'en' ? 'active' : '' }}">EN</a>
            </div>
        </div>
        <!-- Language Switch End -->

        <!-- User Menu Start -->
        <div class="user-container d-flex">
            <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="profile" alt="profile" src="{{ asset('img/profile/profile-9.webp') }}" />
                <div class="name">{{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-end user-menu wide">
                <div class="row mb-3 ms-0 me-0">
                    <div class="col-12 ps-1 mb-2">
                        <div class="text-extra-small text-primary text-uppercase">@lang('layout.account')</div>
                    </div>
                    <div class="col-12 ps-1 pe-1">
                        <ul class="list-unstyled">
                            <li>
                                <a href="#">
                                    <i data-acorn-icon="user" class="me-2" data-acorn-size="17"></i>
                                    <span class="align-middle">@lang('layout.my_profile')</span>
                                </a>
                            </li> <li>
                                <a href="{{ route('administration.logout') }}">
                                    <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                                    <span class="align-middle">@lang('layout.logout')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- User Menu End -->

        <!-- Icons Menu Start -->
        <ul class="list-unstyled list-inline text-center menu-icons">
            <li class="list-inline-item">
                <a href="#" data-bs-toggle="dropdown" data-bs-target="#notifications" aria-haspopup="true" aria-expanded="false" class="notification-button">
                    <div class="position-relative d-inline-flex">
                        <i data-acorn-icon="bell" data-acorn-size="18"></i>
                        <span class="position-absolute notification-dot rounded-xl"></span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end wide notification-dropdown scroll-out" id="notifications">
                    <div class="scroll">
                        <ul class="list-unstyled border-last-none">
                            <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                                <img src="{{ asset('img/profile/profile-9.webp') }}" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                                <div class="align-self-center">
                                    <a href="#">Test Notification!</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
        <!-- Icons Menu End -->
        @php
            $menu = !empty($menu) ? $menu : '';
            $submenu = !empty($submenu) ? $submenu : '';
        @endphp

        <!-- Menu Start -->
        <div class="menu-container flex-grow-1">
            <ul id="menu" class="menu">
                <li>
                    <a href="{{ route('administration.dashboard') }}" class="{{ $menu == 'dashboard' ? 'active' : '' }}">
                        <i data-acorn-icon="home" class="icon" data-acorn-size="18"></i>
                        <span class="label">@lang('layout.home')</span>
                    </a>
                </li>
                <li>
                    <a href="#inventoryMenu" class="{{ $menu == 'inventory' ? 'active' : '' }}">
                        <i data-acorn-icon="home" class="icon" data-acorn-size="18"></i>
                        <span class="label">@lang('inventory::layout.inventory')</span>
                    </a>
                    <ul id="inventoryMenu">
                        <li>
                            <a href="{{ route('inventory.categories') }}" class="{{ $submenu == 'category' ? 'active' : '' }}">
                                <span class="label">@lang('inventory::layout.categories')</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Menu End -->

        <!-- Mobile Buttons Start -->
        <div class="mobile-buttons-container">
            <!-- Scrollspy Mobile Button Start -->
            <a href="#" id="scrollSpyButton" class="spy-button" data-bs-toggle="dropdown">
                <i data-acorn-icon="menu-dropdown"></i>
            </a>
            <!-- Scrollspy Mobile Button End -->

            <!-- Scrollspy Mobile Dropdown Start -->
            <div class="dropdown-menu dropdown-menu-end" id="scrollSpyDropdown"></div>
            <!-- Scrollspy Mobile Dropdown End -->

            <!-- Menu Button Start -->
            <a href="#" id="mobileMenuButton" class="menu-button">
                <i data-acorn-icon="menu"></i>
            </a>
            <!-- Menu Button End -->
        </div>
        <!-- Mobile Buttons End -->
    </div>
    <div class="nav-shadow"></div>
</div>
