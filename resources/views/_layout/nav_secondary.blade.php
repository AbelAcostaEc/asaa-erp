<!--begin::Tab panel-->
<div class="tab-pane fade @if (@$menu == 'dashboard') active show @endif" id="kt_navs_dashboard">
    <!--begin::Menu wrapper-->
    <div class="header-menu flex-column align-items-stretch flex-lg-row">
        <!--begin::Menu-->
        <div class="menu menu-rounded menu-column menu-lg-row menu-root-here-bg-desktop menu-active-bg menu-title-gray-700 menu-state-primary menu-arrow-gray-400 fw-semibold align-items-stretch flex-grow-1 px-2 px-lg-0" id="#kt_header_menu" data-kt-menu="true">
            <!--begin:Menu item-->
            <div class="menu-item @if (@$submenu == 'dashboard' && @$menu == 'dashboard') here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                <!--begin:Menu link-->
                <a class="menu-link py-3" href="{{ url('/administration/dashboard') }}">
                    <span class="menu-title">Dashboard</span>
                    <span class="menu-arrow d-lg-none"></span>
                </a>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
        </div>
        <!--end::Menu-->
    </div>
    <!--end::Menu wrapper-->
</div>
<!--end::Tab panel-->

<!--begin::Tab panel-->
<div class="tab-pane fade @if (@$menu == 'administration') active show @endif" id="kt_navs_administration">
    <!--begin::Menu wrapper-->
    <div class="header-menu flex-column align-items-stretch flex-lg-row">
        <!--begin::Menu-->
        <div class="menu menu-rounded menu-column menu-lg-row menu-root-here-bg-desktop menu-active-bg menu-title-gray-700 menu-state-primary menu-arrow-gray-400 fw-semibold align-items-stretch flex-grow-1 px-2 px-lg-0" id="#kt_header_menu" data-kt-menu="true">
            @if (auth()->user()->hasPermissionTo('Ver Usuario'))
                <!--begin:Menu item-->
                <div class="menu-item @if (@$submenu == 'user' && @$menu == 'administration') here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <!--begin:Menu link-->
                    <a class="menu-link py-3" href="{{ route('administration.user') }}">
                        <span class="menu-title">Usuarios</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif


            @if (auth()->user()->hasRole('Administrador'))
                <!--begin:Menu item-->
                <div class="menu-item @if (@$submenu == 'role' && @$menu == 'administration') here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <!--begin:Menu link-->
                    <a class="menu-link py-3" href="{{ route('administration.role') }}">
                        <span class="menu-title">Roles</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif

            @if (auth()->user()->hasPermissionTo('Ver Usuario'))
                <!--begin:Menu item-->
                <div class="menu-item @if (@$submenu == 'configuration' && @$menu == 'administration') here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <!--begin:Menu link-->
                    <a class="menu-link py-3" href="{{ route('administration.configuration') }}">
                        <span class="menu-title">Configuración</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif

            @if (auth()->user()->hasPermissionTo('Ver Tipo Deuda'))
                <!--begin:Menu item-->
                <div class="menu-item @if (@$submenu == 'debt_type' && @$menu == 'administration') here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <!--begin:Menu link-->
                    <a class="menu-link py-3" href="{{ route('administration.debt-type') }}">
                        <span class="menu-title">Tipo de Deuda</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif

            @if (auth()->user()->hasPermissionTo('Ver Usuario'))
                <!--begin:Menu item-->
                <div class="menu-item @if (@$submenu == 'board' && @$menu == 'administration') here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <!--begin:Menu link-->
                    <a class="menu-link py-3" href="{{ route('administration.board') }}">
                        <span class="menu-title">Junta</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif
            
        </div>
        <!--end::Menu-->
    </div>
    <!--end::Menu wrapper-->
</div>
<!--end::Tab panel-->

<!--begin::Tab panel-->
<div class="tab-pane fade @if (@$menu == 'supply') active show @endif" id="kt_navs_supply">
    <!--begin::Menu wrapper-->
    <div class="header-menu flex-column align-items-stretch flex-lg-row">
        <!--begin::Menu-->
        <div class="menu menu-rounded menu-column menu-lg-row menu-root-here-bg-desktop menu-active-bg menu-title-gray-700 menu-state-primary menu-arrow-gray-400 fw-semibold align-items-stretch flex-grow-1 px-2 px-lg-0" id="#kt_header_menu" data-kt-menu="true">
            
            @if (auth()->user()->hasPermissionTo('Ver Solicitud'))
                <!--begin:Menu item-->
                <div class="menu-item @if (@$submenu == 'client' && @$menu == 'supply') here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <!--begin:Menu link-->
                    <a class="menu-link py-3" href="{{ route('supply.client') }}">
                        <span class="menu-title">Clientes</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif
            @if (auth()->user()->hasPermissionTo('Ver Solicitud'))
                <!--begin:Menu item-->
                <div class="menu-item @if (@$submenu == 'application' && @$menu == 'supply') here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <!--begin:Menu link-->
                    <a class="menu-link py-3" href="{{ route('supply.application') }}">
                        <span class="menu-title">Solicitudes</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif

            @if (auth()->user()->hasPermissionTo('Ver Suministro'))
                <!--begin:Menu item-->
                <div class="menu-item @if (@$submenu == 'supply' && @$menu == 'supply') here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <!--begin:Menu link-->
                    <a class="menu-link py-3" href="{{ route('supply.supply') }}">
                        <span class="menu-title">Suministros</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif

            @if (auth()->user()->hasPermissionTo('Ver Suministro'))
                <!--begin:Menu item-->
                <div class="menu-item @if (@$submenu == 'supply_removed' && @$menu == 'supply') here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <!--begin:Menu link-->
                    <a class="menu-link py-3" href="{{ route('supply.supply-removed') }}">
                        <span class="menu-title">Suministros Retirados</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif

        </div>
        <!--end::Menu-->
    </div>
    <!--end::Menu wrapper-->
</div>
<!--end::Tab panel-->

<!--begin::Tab panel-->
<div class="tab-pane fade @if (@$menu == 'meterreading') active show @endif" id="kt_navs_meterreading">
    <!--begin::Menu wrapper-->
    <div class="header-menu flex-column align-items-stretch flex-lg-row">
        <!--begin::Menu-->
        <div class="menu menu-rounded menu-column menu-lg-row menu-root-here-bg-desktop menu-active-bg menu-title-gray-700 menu-state-primary menu-arrow-gray-400 fw-semibold align-items-stretch flex-grow-1 px-2 px-lg-0" id="#kt_header_menu" data-kt-menu="true">
            @if (auth()->user()->hasPermissionTo('Ver Lectura'))
                <!--begin:Menu item-->
                <div class="menu-item @if (@$submenu == 'list' && @$menu == 'meterreading') here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <!--begin:Menu link-->
                    <a class="menu-link py-3" href="{{ route('meterreading.list') }}">
                        <span class="menu-title">Lecturas</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif
            @if (auth()->user()->hasPermissionTo('Ver Lectura'))
                <!--begin:Menu item-->
                <div class="menu-item @if (@$submenu == 'export_excel' && @$menu == 'meterreading') here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <!--begin:Menu link-->
                    <a class="menu-link py-3" href="{{ route('meterreading.export.excel') }}">
                        <span class="menu-title">Excel Lecturas</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif
            @if (auth()->user()->hasPermissionTo('Ver Lectura'))
                <!--begin:Menu item-->
                <div class="menu-item @if (@$submenu == 'import_excel' && @$menu == 'meterreading') here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <!--begin:Menu link-->
                    <a class="menu-link py-3" href="{{ route('meterreading.import.excel') }}">
                        <span class="menu-title">Ingreso Excel</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif

        </div>
        <!--end::Menu-->
    </div>
    <!--end::Menu wrapper-->
</div>
<!--end::Tab panel-->

<!--begin::Tab panel-->
<div class="tab-pane fade @if (@$menu == 'account') active show @endif" id="kt_navs_account">
    <!--begin::Menu wrapper-->
    <div class="header-menu flex-column align-items-stretch flex-lg-row">
        <!--begin::Menu-->
        <div class="menu menu-rounded menu-column menu-lg-row menu-root-here-bg-desktop menu-active-bg menu-title-gray-700 menu-state-primary menu-arrow-gray-400 fw-semibold align-items-stretch flex-grow-1 px-2 px-lg-0" id="#kt_header_menu" data-kt-menu="true">
            @if (auth()->user()->hasPermissionTo('Ver Cuenta'))
                <!--begin:Menu item-->
                <div class="menu-item @if (@$submenu == 'account' && @$menu == 'account') here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <!--begin:Menu link-->
                    <a class="menu-link py-3" href="{{ route('account.list') }}">
                        <span class="menu-title">Cuentas</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif

        </div>
        <!--end::Menu-->
    </div>
    <!--end::Menu wrapper-->
</div>
<!--end::Tab panel-->

<!--begin::Tab panel-->
<div class="tab-pane fade @if (@$menu == 'zone') active show @endif" id="kt_navs_zone">
    <!--begin::Menu wrapper-->
    <div class="header-menu flex-column align-items-stretch flex-lg-row">
        <!--begin::Menu-->
        <div class="menu menu-rounded menu-column menu-lg-row menu-root-here-bg-desktop menu-active-bg menu-title-gray-700 menu-state-primary menu-arrow-gray-400 fw-semibold align-items-stretch flex-grow-1 px-2 px-lg-0" id="#kt_header_menu" data-kt-menu="true">
            @if (auth()->user()->hasPermissionTo('Ver Zona'))
                <!--begin:Menu item-->
                <div class="menu-item @if (@$submenu == 'zone' && @$menu == 'zone') here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <!--begin:Menu link-->
                    <a class="menu-link py-3" href="{{ route('supply.zone') }}">
                        <span class="menu-title">Zonas</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif

            @if (auth()->user()->hasPermissionTo('Ver Barrio'))
                <!--begin:Menu item-->
                <div class="menu-item @if (@$submenu == 'district' && @$menu == 'zone') here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <!--begin:Menu link-->
                    <a class="menu-link py-3" href="{{ route('supply.district') }}">
                        <span class="menu-title">Barrios</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif

        </div>
        <!--end::Menu-->
    </div>
    <!--end::Menu wrapper-->
</div>
<!--end::Tab panel-->

<!--begin::Tab panel-->
<div class="tab-pane fade @if (@$menu == 'report') active show @endif" id="kt_navs_report">
    <!--begin::Menu wrapper-->
    <div class="header-menu flex-column align-items-stretch flex-lg-row">
        <!--begin::Menu-->
        <div class="menu menu-rounded menu-column menu-lg-row menu-root-here-bg-desktop menu-active-bg menu-title-gray-700 menu-state-primary menu-arrow-gray-400 fw-semibold align-items-stretch flex-grow-1 px-2 px-lg-0" id="#kt_header_menu" data-kt-menu="true">
            @if (auth()->user()->hasPermissionTo('Ver Reportes'))
                <!--begin:Menu item-->
                <div class="menu-item @if (@$submenu == 'payment' && @$menu == 'report') here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <!--begin:Menu link-->
                    <a class="menu-link py-3" href="{{ route('report.payment') }}">
                        <span class="menu-title">Pagos</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif
            @if (auth()->user()->hasPermissionTo('Ver Reportes'))
                <!--begin:Menu item-->
                <div class="menu-item @if (@$submenu == 'debt' && @$menu == 'report') here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <!--begin:Menu link-->
                    <a class="menu-link py-3" href="{{ route('report.debt') }}">
                        <span class="menu-title">Deudas</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif
            @if (auth()->user()->hasPermissionTo('Ver Reportes'))
                <!--begin:Menu item-->
                <div class="menu-item @if (@$submenu == 'accounting' && @$menu == 'report') here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <!--begin:Menu link-->
                    <a class="menu-link py-3" href="{{ route('report.accounting') }}">
                        <span class="menu-title">Contable</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif
            @if (auth()->user()->hasPermissionTo('Ver Reportes'))
                <!--begin:Menu item-->
                <div class="menu-item @if (@$submenu == 'other-values' && @$menu == 'report') here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <!--begin:Menu link-->
                    <a class="menu-link py-3" href="{{ route('report.other-values') }}">
                        <span class="menu-title">Otros Valores</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif
            @if (auth()->user()->hasPermissionTo('Ver Reportes'))
                <!--begin:Menu item-->
                <div class="menu-item @if (@$submenu == 'withdrawal' && @$menu == 'report') here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <!--begin:Menu link-->
                    <a class="menu-link py-3" href="{{ route('report.withdrawal') }}">
                        <span class="menu-title">Deudores</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif
            @if (auth()->user()->hasPermissionTo('Ver Reportes'))
                <!--begin:Menu item-->
                <div class="menu-item @if (@$submenu == 'total' && @$menu == 'report') here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <!--begin:Menu link-->
                    <a class="menu-link py-3" href="{{ route('report.total') }}">
                        <span class="menu-title">Totales</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif
            @if (auth()->user()->hasPermissionTo('Ver Reportes'))
                <!--begin:Menu item-->
                <div class="menu-item @if (@$submenu == 'annual' && @$menu == 'report') here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <!--begin:Menu link-->
                    <a class="menu-link py-3" href="{{ route('report.annual') }}">
                        <span class="menu-title">Anual</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif
            @if (auth()->user()->hasPermissionTo('Ver Reportes'))
                <!--begin:Menu item-->
                <div class="menu-item @if (@$submenu == 'meter' && @$menu == 'report') here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <!--begin:Menu link-->
                    <a class="menu-link py-3" href="{{ route('report.meter') }}">
                        <span class="menu-title">Metraje</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif

        </div>
        <!--end::Menu-->
    </div>
    <!--end::Menu wrapper-->
</div>
<!--end::Tab panel-->