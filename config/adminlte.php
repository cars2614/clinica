<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |cambia los titulos de cada pagina
     1 pone un titulo general
     2 pone el titulo y antes aparece el titulo de la pagina en la que este
     3 pone el titulo y despues aparece el titulo de la pagina en la que este
    | 
    */

    'title' => '',
    'title_prefix' => 'Admin | ',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | habilita o desabilita el favicon
    */

    'use_ico_only' => true,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |todo lo relacionado con el logo que aparece en la parte superior izquierda
    | 
    */

    'logo' => '<b>Administrador</b>',
    'logo_img' => 'vendor/adminlte/dist/img/logo_clinica.jpg',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Admin',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | mustra todos los cambios que se le pueden hacer a el logo del 
      usuario y sus respectivos cambios.
      los ultimos 3 se deben crear en la base de datos para poder 
      hacer los cambios
    */

    'usermenu_enabled' => true, /* nombre del usuario */
    'usermenu_header' => true,  /* muestra el nombre del usuario */
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |cambia las configuraciones del saiderbar "menu general"

    
    */

    'layout_topnav' => null, /* pone el menu arriba */
    'layout_boxed' => null, /* ajusta el ancho "no lo recomiendo" */
    'layout_fixed_sidebar' => true, /* deja el menu fijo */
    'layout_fixed_navbar' => true, /* deja el nav fijo */
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |configura la pagina de login 
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
    |personaliza el menu 
    |
    */

    'classes_body' => '',
    'classes_brand' => '',/* cambia el color logo del menu "bg-white" */
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',/* cambia el color del menu y los link activos*/
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | personalizacion del menu
    */

    'sidebar_mini' => 'lg',/* cierra completamente el menu */
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300, /* tiempo despliegue del menu */

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark', /* abre mini menu en la parte derecha */
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'home', /* cambia la ruta de la imagen del menu */
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
    |modificar lo que aparece en el menu geberal 
    */

    'menu' => [
        // Navbar items:
        /* 
       quito el menu de busqueda en el navbar
       [
            'type'         => 'navbar-search',
            'text'         => 'search',
            'topnav_right' => true,
        ], */
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:
        /* 
       quito el menu de busqueda del menu sidebar       
       [
            'type' => 'sidebar-menu-search',
            'text' => 'search',
        ], */



        /*                    
        
        [
            'text'        => 'pages',
            'url'         => 'admin/pages',
            'icon'        => 'far fa-fw fa-file',
            'label'       => 4,
            'label_color' => 'success',
        ], */




        ['header' => 'CLIENTES'],
        [
            'text' => 'Cliente',
            'url'  => '/clientes', 
            'icon' => 'fas fa-fw fa-user-plus',
        ],

        ['header' => ' FACTURAS'],
        [
            'text' => 'FACTURAS',
            'icon' => 'fas fa-handshake',
            'url'  => '/facturas/create'
        ],
        /*[
                                              */


        ['header' => 'GESTION'],
        [
            'text' => 'GESTION',
            'icon' => 'fas fa-sitemap',
            'submenu' => [


                [
                    'text' => 'Cuaderno Pago Empleados',
                    'icon' => 'fas fa-fw fa-address-book',
                    'url' => '/cuadernoPago'
                ],
                [
                    'text' => 'Paquete Entregado',
                    'url'  => '/detallesEstados',
                    'icon' => 'fas fa-check-double'
                ]
                

            ]
        ],
                                                
        

        ['header' => 'INFORMES'],
        [
            'text' => 'INFORMES',
            'icon' => 'fas fa-chart-pie',
            'submenu' => [

                [
                    'text' => 'Informe General',
                    'icon' => 'fas fa-fw fa-book-open',
                    'url' => '/informes'
                ],
                [
                    'text' => 'Informe Cliente',
                    'icon' => 'fas fa-fw fa-user-check',
                    'url' => '/informes/clientes'
                ],
                [
                    'text' => 'Informe Empleado',
                    'icon' => 'fas fa-fw fa-hard-hat',
                    'url' => '/informes/empleados'
                ]
            ]
         ],

        ['header' => 'EMPLEADOS'],
        [
            'text' => 'EMPLEADOS',
            'icon' => 'fas fa-id-card',
            'submenu' => [
               
               
                [
                    'text' => 'Prestamos Empleado',
                    'icon' => 'fas fa-fw fa-money-check-alt',
                    'url' => '/prestamos'
                ],
                [
                    'text' => 'Empleado',
                    'url'  => '/empleados',
                    'icon' => 'fas fa-fw fa-user-plus'
                ]

            ]
        ],

        ['header' => ' '],
        [            
        ],
        
        ['header' => ' '],
        [            
        ],
        
        ['header' => ' '],
        [           
        ],


        /* [
            'text'    => 'multilevel',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text' => 'level_one',
                    'url'  => '#',
                ],
                [
                    'text'    => 'level_one',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'level_two',
                            'url'  => '#',
                        ],
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
        ], */



        /* 
        ['header' => 'labels'],
        [
            'text'       => 'important',
            'icon_color' => 'red',
            'url'        => '#',
        ],
        [
            'text'       => 'warning',
            'icon_color' => 'yellow',
            'url'        => '#',
        ],
        [
            'text'       => 'information',
            'icon_color' => 'cyan',
            'url'        => '#',
        ], */
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
    |debemos crear la seccion en la pagina ejemplo

     @section('plugins.Sweetalert2', true)

     asi estaria listo el plugin para poder utilizarlo


    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
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
            'active' => true,/* si lo activamos desde aca queda en todas las paginas */
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
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