<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/admin/mouvements' => [[['_route' => 'admin_mouvement_index', '_controller' => 'App\\Controller\\Admin\\AdminMouvementController::index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/produits' => [[['_route' => 'admin_produit_index', '_controller' => 'App\\Controller\\Admin\\AdminProduitController::index'], null, ['GET' => 0], null, false, false, null]],
        '/mouvement' => [[['_route' => 'app_mouvement_index', '_controller' => 'App\\Controller\\MouvementController::index'], null, ['GET' => 0], null, false, false, null]],
        '/mouvement/stats' => [[['_route' => 'app_mouvement_stats', '_controller' => 'App\\Controller\\MouvementController::stats'], null, ['GET' => 0], null, false, false, null]],
        '/mouvement/pdf' => [[['_route' => 'app_mouvement_pdf', '_controller' => 'App\\Controller\\MouvementController::pdf'], null, ['GET' => 0], null, false, false, null]],
        '/mouvement/new' => [[['_route' => 'app_mouvement_new', '_controller' => 'App\\Controller\\MouvementController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/produit' => [[['_route' => 'app_produit_index', '_controller' => 'App\\Controller\\ProduitController::index'], null, ['GET' => 0], null, false, false, null]],
        '/produit/new' => [[['_route' => 'app_produit_new', '_controller' => 'App\\Controller\\ProduitController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/produit/stats' => [[['_route' => 'app_produit_stats', '_controller' => 'App\\Controller\\ProduitController::stats'], null, ['GET' => 0], null, false, false, null]],
        '/produit/pdf' => [[['_route' => 'app_produit_pdf', '_controller' => 'App\\Controller\\ProduitController::pdf'], null, ['GET' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/mouvement/(?'
                    .'|(\\d+)(*:221)'
                    .'|(\\d+)/edit(*:239)'
                    .'|(\\d+)(*:252)'
                .')'
                .'|/produit/(?'
                    .'|(\\d+)(*:278)'
                    .'|(\\d+)/edit(*:296)'
                    .'|(\\d+)(*:309)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        221 => [[['_route' => 'app_mouvement_show', '_controller' => 'App\\Controller\\MouvementController::show'], ['id_mo'], ['GET' => 0], null, false, true, null]],
        239 => [[['_route' => 'app_mouvement_edit', '_controller' => 'App\\Controller\\MouvementController::edit'], ['id_mo'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        252 => [[['_route' => 'app_mouvement_delete', '_controller' => 'App\\Controller\\MouvementController::delete'], ['id_mo'], ['POST' => 0], null, false, true, null]],
        278 => [[['_route' => 'app_produit_show', '_controller' => 'App\\Controller\\ProduitController::show'], ['id_p'], ['GET' => 0], null, false, true, null]],
        296 => [[['_route' => 'app_produit_edit', '_controller' => 'App\\Controller\\ProduitController::edit'], ['id_p'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        309 => [
            [['_route' => 'app_produit_delete', '_controller' => 'App\\Controller\\ProduitController::delete'], ['id_p'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
