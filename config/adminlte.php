<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'AdminLTE 3',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>Admin</b>LTE',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // Navbar items: nggak guna
        // [
        //     'type'         => 'navbar-search',
        //     'text'         => 'searchs',
        //     'topnav_right' => true,
        // ],
        //menu notftikasi
        [
            'type'         => 'navbar-notification',
            'id'           => 'my-notification',
            'icon'         => 'fas fa-bell',
            'url'          => 'notifications/show',
            'topnav_right' => true,
            'dropdown_mode'   => true,
            'dropdown_flabel' => 'All notifications',
            'update_cfg'   => [
                'url' => 'notifications/get',
                'period' => 30,
            ],
        ],
        [
            'type'         => 'navbar-notification',
            'id'           => 'my-notification',
            'icon'         => 'far fa-comments',
            'url'          => 'notifications/show',
            'topnav_right' => true,
            'dropdown_mode'   => true,
            'dropdown_flabel' => 'All notifications',
            'update_cfg'   => [
                'url' => 'notifications/get',
                'period' => 30,
            ],
        ],



        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
        ],
        // Sidebar items: nggak guna
        // [
        //     'type' => 'sidebar-menu-search',
        //     'text' => 'search',
        // ],
        [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
            // 'can'     => ['dev','admin','user']
        ],
        [
            'text'        => 'Home',
            'url'         => '/home',
            'icon'        => 'fas fa-cat',
            // 'label'       => 4,
            'label_color' => 'success',
        ],
        ['header' => 'account_settings'],
        [
            'text'    => 'Setup',
            'icon'    => 'fas fa-fw fa-share',
            'can'     => ['setup', 'admin'],
            'submenu' => [
                [
                    'text'        => 'Tabel',
                    'url'         => '/tabels',
                    'icon'        => 'fas fa-city',
                    'label_color' => 'success',
                    'can'     => ['tabels.index']
                ],
                [
                    'text' => 'User',
                    'url'  => '/users',
                    'icon'  => 'fa fa-users',
                    'can'     => ['users.index']
                ],
                [
                    'text' => 'Role',
                    'url'  => '/roles',
                    'icon'  => 'fa fa-users',
                    'can'     => ['roles.index']
                ],
                [
                    'text'        => 'Permission',
                    'url'         => '/permissions',
                    'icon'        => 'fas fa-city',
                    'label_color' => 'success',
                    'can'     => ['permissions.index']
                ],
                [
                    'text'        => 'Role Permission',
                    'url'         => '/rolepermissions',
                    'icon'        => 'fas fa-city',
                    'label_color' => 'success',
                    'can'     => ['rolepermissions.index']
                ],


                [
                    'text' => 'UserRole',
                    'url'  => '/userroles',
                    'icon'  => 'fa fa-users',
                    'can'     => ['userroles.index']
                ],
                [
                    'text'        => 'Divisi',
                    'url'         => '/divisis',
                    'icon'        => 'fas fa-city',
                    'label_color' => 'success',
                    'can'     => ['divisis.index']
                ],
                [
                    'text'        => 'Departemen',
                    'url'         => '/departemens',
                    'icon'        => 'fas fa-code-branch',
                    'label_color' => 'success',
                    'can'     => ['departemens.index']
                ],
                [
                    'text'        => 'Parameter',
                    'url'         => '/params',
                    'icon'        => 'fas fa-city',
                    'label_color' => 'success',
                    'can'     => ['params.index']
                ],
                [
                    'text' => 'Sequence',
                    'url'  => '/seqs',
                    'icon' => 'fas fa-fw fa-user',
                    'can'     => ['seqs.index']
                ],
                [
                    'text' => 'File',
                    'url'  => '/files',
                    'icon' => 'fas fa-fw fa-user',
                    'can'     => ['files.index']
                ],
            ]
        ],



        [
            'text' => 'profile',
            'url'  => '/profile',
            'icon' => 'fas fa-fw fa-user',
            // 'can'     => ['.index']
        ],
        [
            'text'    => 'Task',
            'can'     => ['task'],
            'submenu' => [
                [
                    'text' => 'Inisiasi',
                    'url'  => '/tasks',
                    'icon' => 'fas fa-fw fa-user',
                    'can'     => ['task']
                ],
                [
                    'text' => 'Project',
                    'url'  => '/projects',
                    'icon' => 'fas fa-fw fa-user',
                    'can'     => ['projects.index']
                ]
            ]
        ],

        [
            'text'    => 'TMS',
            'icon'    => 'fas fa-fw fa-share',
            'can'     => ['tms','super_admin'],
            'submenu' => [
                [
                    'text' => 'Pegawai',
                    'url'  => '/pegawais',
                    'can'     => ['pegawais', 'pegawais.index','super_admin']
                ],
                [
                    'text' => 'Rencana Training',
                    'url'  => '/training_plans',
                    'can'     => ['training_plans', 'training_plans.index']
                ],
                [
                    'text' => 'Trainee Info',
                    'url'  => '/training_notes',
                    'can'     => ['training_notes', 'training_notes.index']
                ],
                [
                    'text' => 'Training Cost',
                    'url'  => '/training_costs',
                    'can'     => [/*'training_costs', 'training_costs.index',*/'super_admin']
                ],
                [
                    'text' => 'Vendor',
                    'url'  => '/vm_perusahaans',
                    'can'     => ['vm_perusahaans', 'vm_perusahaans.index']
                ],
                [
                    'text' => 'Training License',
                    'url'  => '/training_licenses',
                    'can'     => ['training_licenses', 'training_licenses.index','super_admin']
                ],
                [
                    'text' => 'Training Peserta',
                    'url'  => '/training_plan_pesertas_detail/test',
                    'can'     => [/*'training_plan_pesertas', 'training_plan_pesertas.index',*/'super_admin']
                ],
                [
                    'text' => 'Training Fasilitator',
                    'url'  => '/training_intrainers',
                    'can'     => [/*'training_intrainers', 'training_intrainers.index',*/'super_admin']
                ],
            ]
        ],
        
        [
            'text'    => 'Mentor',
            'icon'    => 'fas fa-fw fa-share',
            'can'     => ['mentor_surtugs','super_admin'],
            'submenu' => [
                [
                    'text' => 'Surat Tugas',
                    'url'  => '/mentor_surtugs',
                    'can'     => ['mentor_surtugs', 'mentor_surtugs.index']
                ],
                // [
                //     'text' => 'Mentors',
                //     'url'  => '/mentor_mentors',
                //     'can'     => ['mentor_mentors', 'mentor_mentors.index']
                // ],
                // [
                //     'text' => 'Mentee',
                //     'url'  => '/mentor_mentes',
                //     'can'     => ['mentor_mentes', 'mentor_mentes.index']
                // ],
                [
                    'text' => 'Kegiatan',
                    'url'  => '/mentor_events',
                    'can'     => ['mentor_events', 'mentor_events.index']
                ],
                // [
                //     'text' => 'mentor_event_members',
                //     'url'  => '/mentor_event_members',
                //     'can'     => ['mentor_event_members', 'mentor_event_members.index']
                // ],

            ]
        ],
        [
            'text'    => 'LSP',
            'icon'    => 'fas fa-fw fa-share',
            'can'     => ['lsp','super_admin'],
            'submenu' => [
                [
                    'text' => 'Dasboard',
                    'url'  => '/lsp_dashboard',
                    // 'can'     => ['lsp_skemas', 'lsp_skemas.index']
                ],
                [
                    'text' => 'Skema',
                    'url'  => '/lsp_skemas',
                    'can'     => ['lsp_skemas', 'lsp_skemas.index']
                ],
                [
                    'text' => 'Daftar Sertifikats',
                            'url'  => '/lsp_sertifikats',
                            'can'     => ['lsp_skemas','lsp_sertifikats.index']
                ],
                
            ]
        ],


        





        [
            'text'    => 'Test',
            'icon'    => 'fas fa-fw fa-share',
            'can'     => ['setup', 'admin'],
            'submenu' => [
                [
                    'text' => 'Kendaraan',
                    'url'  => '/kendaraans',
                    'icon' => 'fas fa-fw fa-user',
                    // 'can'     => ['.index']
                ],
                [
                    'text'    => 'Cobain',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'Coba',
                            'url'  => '/cobas',
                            'can'     => ['cobas', 'cobas.index']
                        ],
                        [
                            'text' => 'Jajal',
                            'url'  => '/jajals',
                            'can'     => ['jajals', 'jajals.index']
                        ],
                        
                        // [
                        //     'text' => 'Sertifikats',
                        //     'url'  => '/lsp_sertifikats',
                        //     'can'     => ['lsp_skemas', 'lsp_sertifikats.index']
                        // ],
                      
                        [
                            'text'    => 'level_two',
                            'url'     => '#',
                            'submenu' => [
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'text' => 'level_one',
                    'url'  => '#',
                ],
            ],
        ],
        ['header' => 'labels',
        'can'     => ['setup', 'admin'],],
        [
            'text'       => 'important',
            'icon_color' => 'red',
            'url'        => '#',
            'can'     => ['setup', 'admin'],
        ],
        [
            'text'       => 'warning',
            'icon_color' => 'yellow',
            'url'        => '#',
            'can'     => ['setup', 'admin'],
        ],
        [
            'text'       => 'information',
            'icon_color' => 'cyan',
            'url'        => '#',
            'can'     => ['setup', 'admin'],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '/vendor/sweetalert2/sweetalert2.css',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
