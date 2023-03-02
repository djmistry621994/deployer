<?php

return [
    [
        'name'          => 'words.dashboard',
        'icon'          => '<i class="nav-main-link-icon si si-speedometer"></i>',
        'route'         => 'admin.home.index',
        'active_routes' => ['admin.home.index'],
        'permission'    => 'dashboard_sidebar',
    ],

    [
        'name'          => 'words.companies',
        'icon'          => '<i class="nav-main-link-icon fa fa-building"></i>',
        'route'         => 'admin.companies.index',
        'active_routes' => ['admin.companies.index'],
        'permission'    => 'companies_sidebar',
    ],

];
