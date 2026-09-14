<div class="dashboard-sidebar">
    <div class="dashboard-sidebar__nav-toggle">
        <span class="dashboard-sidebar__nav-toggle-text">@lang('My Account')</span>
        <button type="button" class="btn dashboard-sidebar__nav-toggle-btn">
            <i class="las la-bars"></i>
        </button>
    </div>
    <div class="dashboard-menu">
        <div class="dashboard-menu__head">
            <span class="dashboard-menu__head-text">@lang('My Account')</span>
            <button type="button" class="btn dashboard-menu__head-close">
                <i class="las la-times"></i>
            </button>
        </div>
        <div class="dashboard-menu__body" data-simplebar="">
            <ul class="list dashboard-menu__list">

                <li>
                    <a href="{{ route('user.home') }}"
                        class="dashboard-menu__link {{ request()->routeIs('user.home') ? 'active' : '' }}">
                        <span class="dashboard-menu__icon">
                            <i class="las la-tachometer-alt"></i>
                        </span>
                        <span class="dashboard-menu__text">@lang('Dashboard')</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('user.chat') }}"
                        class="dashboard-menu__link {{ request()->routeIs('user.chat') ? 'active' : '' }}">
                        <span class="dashboard-menu__icon">
                            <i class="las la-money-bill"></i>
                        </span>
                        <span class="dashboard-menu__text">@lang('Chat')</span>
                    </a>
                </li>


                {{--  <li>
                    <a href="{{ route('user.transactions') }}"
                        class="dashboard-menu__link {{ request()->routeIs('user.transactions') ? 'active' : '' }}">
                        <span class="dashboard-menu__icon">
                            <i class="las la-money-bill"></i>
                        </span>
                        <span class="dashboard-menu__text">@lang('Transactions')</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.plans') }}"
                        class="dashboard-menu__link {{ request()->routeIs('user.plans') ? 'active' : '' }}">
                        <span class="dashboard-menu__icon">
                            <i class="lab la-pagelines"></i>
                        </span>
                        <span class="dashboard-menu__text">@lang('Plans')</span>
                    </a>
                </li>  --}}
                <li>
                    <div class="accordion" id="postDesk">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#postDeskCollapse"
                                    aria-expanded="{{ request()->routeIs('user.ai*') ? 'true' : 'false' }}">
                                    <span class="accordion-button__icon">
                                        <i class="las la-question-circle"></i>
                                    </span>
                                    <span class="accordion-button__text">
                                        @lang('AI Post')
                                    </span>
                                </button>
                            </h2>
                            <div id="postDeskCollapse"
                                class="accordion-collapse collapse {{ request()->routeIs('ticket*') ? 'show' : '' }}"
                                data-bs-parent="#postpDesk">
                                <div class="accordion-body">
                                    <ul class="list dashboard-menu__inner">
                                        <li>
                                            <a href="{{ route('user.ai') }}"
                                                class="dashboard-menu__inner-link {{ request()->routeIs('user.ai') ? 'active' : '' }}">
                                                @lang('Post Now')
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.ai.posts') }}"
                                                class="dashboard-menu__inner-link {{ request()->routeIs('user.ai.posts') ? 'active' : '' }}">
                                                @lang('All Post')
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="accordion" id="helpDesk">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#helpDeskCollapse"
                                    aria-expanded="{{ request()->routeIs('ticket*') ? 'true' : 'false' }}">
                                    <span class="accordion-button__icon">
                                        <i class="las la-question-circle"></i>
                                    </span>
                                    <span class="accordion-button__text">
                                        @lang('Help &amp; Support')
                                    </span>
                                </button>
                            </h2>
                            <div id="helpDeskCollapse"
                                class="accordion-collapse collapse {{ request()->routeIs('ticket*') ? 'show' : '' }}"
                                data-bs-parent="#helpDesk">
                                <div class="accordion-body">
                                    <ul class="list dashboard-menu__inner">
                                        <li>
                                            <a href="{{ route('ticket.index') }}"
                                                class="dashboard-menu__inner-link {{ request()->routeIs('ticket.index') ? 'active' : '' }}">
                                                @lang('Support Ticket')
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('ticket.open') }}"
                                                class="dashboard-menu__inner-link {{ request()->routeIs('ticket.open') ? 'active' : '' }}">
                                                @lang('New Ticket')
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="accordion" id="account">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accountCollapse"
                                    aria-expanded="{{ request()->routeIs('user.profile.setting') || request()->routeIs('user.change.password') || request()->routeIs('user.twofactor') ? 'true' : 'false' }}">
                                    <span class="accordion-button__icon">
                                        <i class="las la-user-circle"></i>
                                    </span>
                                    <span class="accordion-button__text">
                                        @lang('Account')
                                    </span>
                                </button>
                            </h2>
                            <div id="accountCollapse"
                                class="accordion-collapse collapse {{ request()->routeIs('user.profile.setting') || request()->routeIs('user.change.password') || request()->routeIs('user.twofactor') ? 'show' : '' }}"
                                data-bs-parent="#account">
                                <div class="accordion-body">
                                    <ul class="list dashboard-menu__inner">
                                        <li>
                                            <a href="{{ route('user.profile.setting') }}"
                                                class="dashboard-menu__inner-link {{ request()->routeIs('user.profile.setting') ? 'active' : '' }}">
                                                @lang('Profile')
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.change.password') }}"
                                                class="dashboard-menu__inner-link {{ request()->routeIs('user.change.password') ? 'active' : '' }}">
                                                @lang('Change Password')
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.twofactor') }}"
                                                class="dashboard-menu__inner-link {{ request()->routeIs('user.twofactor') ? 'active' : '' }}">
                                                @lang('Two Factor')
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li>
                    <a href="{{ route('user.logout') }}" class="dashboard-menu__link">
                        <span class="dashboard-menu__icon">
                            <i class="las la-sign-out-alt"></i>
                        </span>
                        <span class="dashboard-menu__text">@lang('Logout')</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
