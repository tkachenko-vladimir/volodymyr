<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li class="{{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.audit-logs.index") }}">
                                    <i class="fa-fw fas fa-file-alt">

                                    </i>
                                    <span>{{ trans('cruds.auditLog.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('language_access')
                            <li class="{{ request()->is("admin/languages") || request()->is("admin/languages/*") ? "active" : "" }}">
                                <a href="{{ route("admin.languages.index") }}">
                                    <i class="fa-fw fas fa-globe">

                                    </i>
                                    <span>{{ trans('cruds.language.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('product_access')
                <li class="{{ request()->is("admin/products") || request()->is("admin/products/*") ? "active" : "" }}">
                    <a href="{{ route("admin.products.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.product.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('order_access')
                <li class="{{ request()->is("admin/orders") || request()->is("admin/orders/*") ? "active" : "" }}">
                    <a href="{{ route("admin.orders.index") }}">
                        <i class="fa-fw fab fa-wpforms">

                        </i>
                        <span>{{ trans('cruds.order.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('client_access')
                <li class="{{ request()->is("admin/clients") || request()->is("admin/clients/*") ? "active" : "" }}">
                    <a href="{{ route("admin.clients.index") }}">
                        <i class="fa-fw fas fa-user-ninja">

                        </i>
                        <span>{{ trans('cruds.client.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('notarization_access')
                <li class="{{ request()->is("admin/notarizations") || request()->is("admin/notarizations/*") ? "active" : "" }}">
                    <a href="{{ route("admin.notarizations.index") }}">
                        <i class="fa-fw fas fa-gavel">

                        </i>
                        <span>{{ trans('cruds.notarization.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('translator_access')
                <li class="{{ request()->is("admin/translators") || request()->is("admin/translators/*") ? "active" : "" }}">
                    <a href="{{ route("admin.translators.index") }}">
                        <i class="fa-fw far fa-address-card">

                        </i>
                        <span>{{ trans('cruds.translator.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('primer_access')
                <li class="{{ request()->is("admin/primers") || request()->is("admin/primers/*") ? "active" : "" }}">
                    <a href="{{ route("admin.primers.index") }}">
                        <i class="fa-fw fas fa-coins">

                        </i>
                        <span>{{ trans('cruds.primer.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('schet_access')
                <li class="{{ request()->is("admin/schets") || request()->is("admin/schets/*") ? "active" : "" }}">
                    <a href="{{ route("admin.schets.index") }}">
                        <i class="fa-fw far fa-credit-card">

                        </i>
                        <span>{{ trans('cruds.schet.title') }}</span>

                    </a>
                </li>
            @endcan
            <li class="{{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "active" : "" }}">
                <a href="{{ route("admin.systemCalendar") }}">
                    <i class="fas fa-fw fa-calendar">

                    </i>
                    <span>{{ trans('global.systemCalendar') }}</span>
                </a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                        <a href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>
</aside>