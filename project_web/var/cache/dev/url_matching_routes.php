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
        '/admin' => [
            [['_route' => 'admin_dashboard', '_controller' => 'App\\Controller\\AdminController::index'], null, null, null, false, false, null],
            [['_route' => 'app_admin', '_controller' => 'App\\Controller\\AdminController::index'], null, null, null, false, false, null],
        ],
        '/admin/tasks' => [[['_route' => 'admin_tasks', '_controller' => 'App\\Controller\\AdminTasksController::index'], null, null, null, false, false, null]],
        '/admin/users' => [[['_route' => 'admin_users', '_controller' => 'App\\Controller\\AdminUsersController::index'], null, null, null, false, false, null]],
        '/api/tasks/today' => [[['_route' => 'api_tasks_today', '_controller' => 'App\\Controller\\AdvancedTaskApiController::today'], null, ['GET' => 0], null, false, false, null]],
        '/api/tasks/overdue' => [[['_route' => 'api_tasks_overdue', '_controller' => 'App\\Controller\\AdvancedTaskApiController::overdue'], null, ['GET' => 0], null, false, false, null]],
        '/api/tasks/batch/status' => [[['_route' => 'api_tasks_batch_status', '_controller' => 'App\\Controller\\AdvancedTaskApiController::batchStatus'], null, ['POST' => 0], null, false, false, null]],
        '/api/tasks/batch/delete' => [[['_route' => 'api_tasks_batch_delete', '_controller' => 'App\\Controller\\AdvancedTaskApiController::batchDelete'], null, ['POST' => 0], null, false, false, null]],
        '/api/tasks/auto-prioritize' => [[['_route' => 'api_tasks_auto_prioritize', '_controller' => 'App\\Controller\\AdvancedTaskApiController::autoPrioritize'], null, ['POST' => 0], null, false, false, null]],
        '/api/ai/description' => [[['_route' => 'api_ai_description', '_controller' => 'App\\Controller\\AiApiController::description'], null, ['POST' => 0], null, false, false, null]],
        '/api/ai/analyze' => [[['_route' => 'api_ai_analyze', '_controller' => 'App\\Controller\\AiApiController::analyze'], null, ['POST' => 0], null, false, false, null]],
        '/api/ai/subtasks' => [[['_route' => 'api_ai_subtasks', '_controller' => 'App\\Controller\\AiApiController::subtasks'], null, ['POST' => 0], null, false, false, null]],
        '/api/ai/executions-summary' => [[['_route' => 'api_ai_executions_summary', '_controller' => 'App\\Controller\\AiApiController::executionsSummary'], null, ['POST' => 0], null, false, false, null]],
        '/api/ai/estimate' => [[['_route' => 'api_ai_estimate', '_controller' => 'App\\Controller\\AiApiController::estimate'], null, ['POST' => 0], null, false, false, null]],
        '/api/ai/risk-score' => [[['_route' => 'api_ai_risk_score', '_controller' => 'App\\Controller\\AiApiController::riskScore'], null, ['POST' => 0], null, false, false, null]],
        '/api/analytics/throughput' => [[['_route' => 'api_analytics_throughput', '_controller' => 'App\\Controller\\AnalyticsApiController::throughput'], null, ['GET' => 0], null, false, false, null]],
        '/api/analytics/workload' => [[['_route' => 'api_analytics_workload', '_controller' => 'App\\Controller\\AnalyticsApiController::workload'], null, ['GET' => 0], null, false, false, null]],
        '/api/analytics/cycle-time' => [[['_route' => 'api_analytics_cycle_time', '_controller' => 'App\\Controller\\AnalyticsApiController::cycleTime'], null, ['GET' => 0], null, false, false, null]],
        '/api/password/generate' => [[['_route' => 'api_password_generate', '_controller' => 'App\\Controller\\ApiPasswordController::generate'], null, ['GET' => 0], null, false, false, null]],
        '/api/calendar/events' => [[['_route' => 'api_calendar_events', '_controller' => 'App\\Controller\\CalendarApiController::events'], null, ['GET' => 0], null, false, false, null]],
        '/api/categories' => [
            [['_route' => 'api_categories_list', '_controller' => 'App\\Controller\\CategoryApiController::list'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_categories_create', '_controller' => 'App\\Controller\\CategoryApiController::create'], null, ['POST' => 0], null, false, false, null],
        ],
        '/category' => [[['_route' => 'app_category_index', '_controller' => 'App\\Controller\\CategoryController::index'], null, ['GET' => 0], null, false, false, null]],
        '/category/new' => [[['_route' => 'app_category_new', '_controller' => 'App\\Controller\\CategoryController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/conscience' => [[['_route' => 'app_conscience_index', '_controller' => 'App\\Controller\\ConscienceController::index'], null, ['GET' => 0], null, false, false, null]],
        '/api/dashboard/stats' => [[['_route' => 'api_dashboard_stats', '_controller' => 'App\\Controller\\DashboardApiController::stats'], null, ['GET' => 0], null, false, false, null]],
        '/api/executions' => [
            [['_route' => 'api_executions_list', '_controller' => 'App\\Controller\\ExecutionApiController::list'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_executions_create', '_controller' => 'App\\Controller\\ExecutionApiController::create'], null, ['POST' => 0], null, false, false, null],
        ],
        '/execution' => [[['_route' => 'app_execution_index', '_controller' => 'App\\Controller\\ExecutionController::index'], null, ['GET' => 0], null, false, false, null]],
        '/execution/new' => [[['_route' => 'app_execution_new', '_controller' => 'App\\Controller\\ExecutionController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/goal' => [[['_route' => 'app_goal_index', '_controller' => 'App\\Controller\\GoalController::index'], null, ['GET' => 0], null, true, false, null]],
        '/goal/new' => [[['_route' => 'app_goal_new', '_controller' => 'App\\Controller\\GoalController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/' => [[['_route' => 'app_public_home', '_controller' => 'App\\Controller\\HomeController::home'], null, null, null, false, false, null]],
        '/app' => [[['_route' => 'app_landing', '_controller' => 'App\\Controller\\HomeController::landing'], null, null, null, false, false, null]],
        '/api/jobs' => [[['_route' => 'api_jobs_create', '_controller' => 'App\\Controller\\JobApiController::create'], null, ['POST' => 0], null, false, false, null]],
        '/milestones' => [[['_route' => 'app_milestones_index', '_controller' => 'App\\Controller\\MileStonesController::index'], null, ['GET' => 0], null, true, false, null]],
        '/milestones/new' => [[['_route' => 'app_milestones_new', '_controller' => 'App\\Controller\\MileStonesController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/motivation' => [[['_route' => 'app_motivation_index', '_controller' => 'App\\Controller\\MotivationController::index'], null, ['GET' => 0], null, true, false, null]],
        '/motivation/new' => [[['_route' => 'app_motivation_new', '_controller' => 'App\\Controller\\MotivationController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/mouvement' => [
            [['_route' => 'app_mouvement_index', '_controller' => 'App\\Controller\\MouvementController::index'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'admin_mouvement_index', '_controller' => 'App\\Controller\\MouvementController::index'], null, ['GET' => 0], null, false, false, null],
        ],
        '/mouvement/stats' => [[['_route' => 'app_mouvement_stats', '_controller' => 'App\\Controller\\MouvementController::stats'], null, ['GET' => 0], null, false, false, null]],
        '/mouvement/pdf' => [[['_route' => 'app_mouvement_pdf', '_controller' => 'App\\Controller\\MouvementController::pdf'], null, ['GET' => 0], null, false, false, null]],
        '/mouvement/new' => [[['_route' => 'app_mouvement_new', '_controller' => 'App\\Controller\\MouvementController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/phoenix/goal' => [[['_route' => 'app_phoenix_goal_index', '_controller' => 'App\\Controller\\PhoenixGoalController::index'], null, ['GET' => 0], null, false, false, null]],
        '/phoenix/goal/new' => [[['_route' => 'app_phoenix_goal_new', '_controller' => 'App\\Controller\\PhoenixGoalController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/phoenix/network' => [[['_route' => 'app_phoenix_network_index', '_controller' => 'App\\Controller\\PhoenixNetworkController::index'], null, ['GET' => 0], null, false, false, null]],
        '/phoenix/network/new' => [[['_route' => 'app_phoenix_network_new', '_controller' => 'App\\Controller\\PhoenixNetworkController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/phoenix/wisdom' => [[['_route' => 'app_phoenix_wisdom_index', '_controller' => 'App\\Controller\\PhoenixWisdomController::index'], null, ['GET' => 0], null, false, false, null]],
        '/phoenix/wisdom/new' => [[['_route' => 'app_phoenix_wisdom_new', '_controller' => 'App\\Controller\\PhoenixWisdomController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/produit' => [
            [['_route' => 'app_produit_index', '_controller' => 'App\\Controller\\ProduitController::index'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'admin_produit_index', '_controller' => 'App\\Controller\\ProduitController::index'], null, ['GET' => 0], null, false, false, null],
        ],
        '/produit/new' => [[['_route' => 'app_produit_new', '_controller' => 'App\\Controller\\ProduitController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/produit/stats' => [[['_route' => 'app_produit_stats', '_controller' => 'App\\Controller\\ProduitController::stats'], null, ['GET' => 0], null, false, false, null]],
        '/produit/pdf' => [[['_route' => 'app_produit_pdf', '_controller' => 'App\\Controller\\ProduitController::pdf'], null, ['GET' => 0], null, false, false, null]],
        '/question' => [[['_route' => 'app_question_index', '_controller' => 'App\\Controller\\QuestionController::index'], null, ['GET' => 0], null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/api/tasks' => [
            [['_route' => 'api_tasks_list', '_controller' => 'App\\Controller\\TaskApiController::list'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_tasks_create', '_controller' => 'App\\Controller\\TaskApiController::create'], null, ['POST' => 0], null, false, false, null],
        ],
        '/task' => [[['_route' => 'app_task_index', '_controller' => 'App\\Controller\\TaskController::index'], null, ['GET' => 0], null, false, false, null]],
        '/task/new' => [[['_route' => 'app_task_new', '_controller' => 'App\\Controller\\TaskController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/theme' => [[['_route' => 'app_theme_index', '_controller' => 'App\\Controller\\ThemeController::index'], null, null, null, true, false, null]],
        '/admin/theme/new' => [[['_route' => 'app_theme_new', '_controller' => 'App\\Controller\\ThemeController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/theme/user/theme' => [[['_route' => 'user_theme_index', '_controller' => 'App\\Controller\\ThemeController::userThemes'], null, null, null, false, false, null]],
        '/admin/theme/theme/assistant' => [[['_route' => 'app_theme_assistant', '_controller' => 'App\\Controller\\ThemeController::themeAssistant'], null, ['POST' => 0], null, false, false, null]],
        '/time-message' => [[['_route' => 'app_time_message_index', '_controller' => 'App\\Controller\\TimeMessageController::index'], null, null, null, true, false, null]],
        '/user' => [[['_route' => 'app_user_list', '_controller' => 'App\\Controller\\UserController::list'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\UserController::register'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/profile' => [[['_route' => 'app_profile', '_controller' => 'App\\Controller\\UserController::profile'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/weather/current' => [[['_route' => 'api_weather_current', '_controller' => 'App\\Controller\\WeatherApiController::current'], null, ['GET' => 0], null, false, false, null]],
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
                .'|/a(?'
                    .'|dmin/t(?'
                        .'|asks/delete/([^/]++)(*:236)'
                        .'|heme/(?'
                            .'|(\\d+)/show(*:262)'
                            .'|(\\d+)/edit(*:280)'
                            .'|(\\d+)/delete(*:300)'
                        .')'
                    .')'
                    .'|pi/(?'
                        .'|categories/([^/]++)(?'
                            .'|(*:338)'
                        .')'
                        .'|executions/([^/]++)(?'
                            .'|(*:369)'
                        .')'
                        .'|jobs/([^/]++)(?'
                            .'|(*:394)'
                            .'|/result(*:409)'
                        .')'
                        .'|tasks/(\\d+)(?'
                            .'|(*:432)'
                        .')'
                    .')'
                .')'
                .'|/category/([^/]++)(?'
                    .'|(*:464)'
                    .'|/edit(*:477)'
                    .'|(*:485)'
                .')'
                .'|/execution/([^/]++)(?'
                    .'|(*:516)'
                    .'|/edit(*:529)'
                    .'|(*:537)'
                .')'
                .'|/goal/([^/]++)(?'
                    .'|(*:563)'
                    .'|/(?'
                        .'|edit(*:579)'
                        .'|delete(*:593)'
                        .'|progress/(?'
                            .'|up(*:615)'
                            .'|down(*:627)'
                        .')'
                    .')'
                .')'
                .'|/m(?'
                    .'|ilestones/([^/]++)(?'
                        .'|(*:664)'
                        .'|/(?'
                            .'|edit(*:680)'
                            .'|complete(*:696)'
                        .')'
                        .'|(*:705)'
                    .')'
                    .'|o(?'
                        .'|tivation/(?'
                            .'|([^/]++)(?'
                                .'|(*:741)'
                                .'|/edit(*:754)'
                                .'|(*:762)'
                            .')'
                            .'|mood/([^/]++)(*:784)'
                        .')'
                        .'|uvement/(?'
                            .'|(\\d+)(*:809)'
                            .'|(\\d+)/edit(*:827)'
                            .'|(\\d+)(*:840)'
                        .')'
                    .')'
                .')'
                .'|/p(?'
                    .'|hoenix/(?'
                        .'|goal/(?'
                            .'|([^/]++)(?'
                                .'|(*:885)'
                                .'|/edit(*:898)'
                                .'|(*:906)'
                            .')'
                            .'|resurrect\\-from\\-goal/([^/]++)(*:945)'
                        .')'
                        .'|network/([^/]++)(?'
                            .'|(*:973)'
                            .'|/edit(*:986)'
                            .'|(*:994)'
                        .')'
                        .'|wisdom/([^/]++)(?'
                            .'|(*:1021)'
                            .'|/edit(*:1035)'
                            .'|(*:1044)'
                        .')'
                    .')'
                    .'|roduit/(?'
                        .'|(\\d+)(*:1070)'
                        .'|(\\d+)/edit(*:1089)'
                        .'|(\\d+)(*:1103)'
                    .')'
                .')'
                .'|/t(?'
                    .'|heme/([^/]++)/(?'
                        .'|question(?'
                            .'|/new(*:1151)'
                            .'|s(*:1161)'
                        .')'
                        .'|answer(?'
                            .'|\\-preview(*:1189)'
                            .'|(*:1198)'
                        .')'
                        .'|rapport(?'
                            .'|(*:1218)'
                            .'|/pdf(*:1231)'
                        .')'
                    .')'
                    .'|ask/([^/]++)(?'
                        .'|(*:1257)'
                        .'|/edit(*:1271)'
                        .'|(*:1280)'
                    .')'
                    .'|ime\\-message/(?'
                        .'|new/([^/]++)(*:1318)'
                        .'|([^/]++)(?'
                            .'|(*:1338)'
                            .'|/delete(*:1354)'
                        .')'
                        .'|api/reflection\\-prompt/([^/]++)(*:1395)'
                    .')'
                .')'
                .'|/question/([^/]++)(?'
                    .'|/(?'
                        .'|edit(*:1435)'
                        .'|answer(*:1450)'
                    .')'
                    .'|(*:1460)'
                .')'
                .'|/user/([^/]++)(*:1484)'
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
        236 => [[['_route' => 'admin_tasks_delete', '_controller' => 'App\\Controller\\AdminTasksController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        262 => [[['_route' => 'app_theme_show', '_controller' => 'App\\Controller\\ThemeController::show'], ['id'], ['GET' => 0], null, false, false, null]],
        280 => [[['_route' => 'app_theme_edit', '_controller' => 'App\\Controller\\ThemeController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        300 => [[['_route' => 'app_theme_delete', '_controller' => 'App\\Controller\\ThemeController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        338 => [
            [['_route' => 'api_categories_show', '_controller' => 'App\\Controller\\CategoryApiController::show'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_categories_update', '_controller' => 'App\\Controller\\CategoryApiController::update'], ['id'], ['PATCH' => 0, 'PUT' => 1], null, false, true, null],
            [['_route' => 'api_categories_delete', '_controller' => 'App\\Controller\\CategoryApiController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        369 => [
            [['_route' => 'api_executions_update', '_controller' => 'App\\Controller\\ExecutionApiController::update'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_executions_delete', '_controller' => 'App\\Controller\\ExecutionApiController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        394 => [[['_route' => 'api_jobs_status', '_controller' => 'App\\Controller\\JobApiController::status'], ['id'], ['GET' => 0], null, false, true, null]],
        409 => [[['_route' => 'api_jobs_result', '_controller' => 'App\\Controller\\JobApiController::result'], ['id'], ['GET' => 0], null, false, false, null]],
        432 => [
            [['_route' => 'api_tasks_show', '_controller' => 'App\\Controller\\TaskApiController::show'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_tasks_update', '_controller' => 'App\\Controller\\TaskApiController::update'], ['id'], ['PATCH' => 0, 'PUT' => 1], null, false, true, null],
            [['_route' => 'api_tasks_delete', '_controller' => 'App\\Controller\\TaskApiController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        464 => [[['_route' => 'app_category_show', '_controller' => 'App\\Controller\\CategoryController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        477 => [[['_route' => 'app_category_edit', '_controller' => 'App\\Controller\\CategoryController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        485 => [[['_route' => 'app_category_delete', '_controller' => 'App\\Controller\\CategoryController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        516 => [[['_route' => 'app_execution_show', '_controller' => 'App\\Controller\\ExecutionController::show'], ['id_exe'], ['GET' => 0], null, false, true, null]],
        529 => [[['_route' => 'app_execution_edit', '_controller' => 'App\\Controller\\ExecutionController::edit'], ['id_exe'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        537 => [[['_route' => 'app_execution_delete', '_controller' => 'App\\Controller\\ExecutionController::delete'], ['id_exe'], ['POST' => 0], null, false, true, null]],
        563 => [[['_route' => 'app_goal_show', '_controller' => 'App\\Controller\\GoalController::show'], ['id_g'], ['GET' => 0], null, false, true, null]],
        579 => [[['_route' => 'app_goal_edit', '_controller' => 'App\\Controller\\GoalController::edit'], ['id_g'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        593 => [[['_route' => 'app_goal_delete', '_controller' => 'App\\Controller\\GoalController::delete'], ['id_g'], ['POST' => 0], null, false, false, null]],
        615 => [[['_route' => 'app_goal_progress_up', '_controller' => 'App\\Controller\\GoalController::progressUp'], ['id'], ['POST' => 0], null, false, false, null]],
        627 => [[['_route' => 'app_goal_progress_down', '_controller' => 'App\\Controller\\GoalController::progressDown'], ['id'], ['POST' => 0], null, false, false, null]],
        664 => [[['_route' => 'app_milestones_show', '_controller' => 'App\\Controller\\MileStonesController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        680 => [[['_route' => 'app_milestones_edit', '_controller' => 'App\\Controller\\MileStonesController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        696 => [[['_route' => 'app_milestones_complete', '_controller' => 'App\\Controller\\MileStonesController::complete'], ['id'], ['POST' => 0], null, false, false, null]],
        705 => [[['_route' => 'app_milestones_delete', '_controller' => 'App\\Controller\\MileStonesController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        741 => [[['_route' => 'app_motivation_show', '_controller' => 'App\\Controller\\MotivationController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        754 => [[['_route' => 'app_motivation_edit', '_controller' => 'App\\Controller\\MotivationController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        762 => [[['_route' => 'app_motivation_delete', '_controller' => 'App\\Controller\\MotivationController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        784 => [[['_route' => 'app_motivation_by_mood', '_controller' => 'App\\Controller\\MotivationController::byMood'], ['mood'], ['GET' => 0], null, false, true, null]],
        809 => [[['_route' => 'app_mouvement_show', '_controller' => 'App\\Controller\\MouvementController::show'], ['id_mo'], ['GET' => 0], null, false, true, null]],
        827 => [[['_route' => 'app_mouvement_edit', '_controller' => 'App\\Controller\\MouvementController::edit'], ['id_mo'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        840 => [[['_route' => 'app_mouvement_delete', '_controller' => 'App\\Controller\\MouvementController::delete'], ['id_mo'], ['POST' => 0], null, false, true, null]],
        885 => [[['_route' => 'app_phoenix_goal_show', '_controller' => 'App\\Controller\\PhoenixGoalController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        898 => [[['_route' => 'app_phoenix_goal_edit', '_controller' => 'App\\Controller\\PhoenixGoalController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        906 => [[['_route' => 'app_phoenix_goal_delete', '_controller' => 'App\\Controller\\PhoenixGoalController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        945 => [[['_route' => 'app_phoenix_resurrect_from_goal', '_controller' => 'App\\Controller\\PhoenixGoalController::resurrectFromGoal'], ['goalId'], ['POST' => 0], null, false, true, null]],
        973 => [[['_route' => 'app_phoenix_network_show', '_controller' => 'App\\Controller\\PhoenixNetworkController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        986 => [[['_route' => 'app_phoenix_network_edit', '_controller' => 'App\\Controller\\PhoenixNetworkController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        994 => [[['_route' => 'app_phoenix_network_delete', '_controller' => 'App\\Controller\\PhoenixNetworkController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        1021 => [[['_route' => 'app_phoenix_wisdom_show', '_controller' => 'App\\Controller\\PhoenixWisdomController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1035 => [[['_route' => 'app_phoenix_wisdom_edit', '_controller' => 'App\\Controller\\PhoenixWisdomController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1044 => [[['_route' => 'app_phoenix_wisdom_delete', '_controller' => 'App\\Controller\\PhoenixWisdomController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        1070 => [[['_route' => 'app_produit_show', '_controller' => 'App\\Controller\\ProduitController::show'], ['id_p'], ['GET' => 0], null, false, true, null]],
        1089 => [[['_route' => 'app_produit_edit', '_controller' => 'App\\Controller\\ProduitController::edit'], ['id_p'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1103 => [[['_route' => 'app_produit_delete', '_controller' => 'App\\Controller\\ProduitController::delete'], ['id_p'], ['POST' => 0], null, false, true, null]],
        1151 => [[['_route' => 'app_question_new', '_controller' => 'App\\Controller\\QuestionController::new'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1161 => [[['_route' => 'app_questions_by_theme', '_controller' => 'App\\Controller\\QuestionController::byTheme'], ['id'], null, null, false, false, null]],
        1189 => [[['_route' => 'app_theme_answer_preview', '_controller' => 'App\\Controller\\QuestionController::answerByTheme'], ['id'], null, null, false, false, null]],
        1198 => [[['_route' => 'app_theme_answer', '_controller' => 'App\\Controller\\UserResponseController::answerByTheme'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1218 => [[['_route' => 'app_theme_rapport', '_controller' => 'App\\Controller\\UserResponseController::themeRapport'], ['id'], null, null, false, false, null]],
        1231 => [[['_route' => 'app_theme_rapport_pdf', '_controller' => 'App\\Controller\\UserResponseController::themeRapportPdf'], ['id'], null, null, false, false, null]],
        1257 => [[['_route' => 'app_task_show', '_controller' => 'App\\Controller\\TaskController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1271 => [[['_route' => 'app_task_edit', '_controller' => 'App\\Controller\\TaskController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1280 => [[['_route' => 'app_task_delete', '_controller' => 'App\\Controller\\TaskController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        1318 => [[['_route' => 'app_time_message_new', '_controller' => 'App\\Controller\\TimeMessageController::new'], ['type'], null, null, false, true, null]],
        1338 => [[['_route' => 'app_time_message_show', '_controller' => 'App\\Controller\\TimeMessageController::show'], ['id'], null, null, false, true, null]],
        1354 => [[['_route' => 'app_time_message_delete', '_controller' => 'App\\Controller\\TimeMessageController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        1395 => [[['_route' => 'app_time_message_prompt', '_controller' => 'App\\Controller\\TimeMessageController::getReflectionPrompt'], ['mood'], null, null, false, true, null]],
        1435 => [[['_route' => 'app_question_edit', '_controller' => 'App\\Controller\\QuestionController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1450 => [[['_route' => 'app_user_answer', '_controller' => 'App\\Controller\\UserResponseController::answer'], ['id'], null, null, false, false, null]],
        1460 => [[['_route' => 'app_question_delete', '_controller' => 'App\\Controller\\QuestionController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        1484 => [
            [['_route' => 'app_user_show', '_controller' => 'App\\Controller\\UserController::show'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
