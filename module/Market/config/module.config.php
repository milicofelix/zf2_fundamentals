<?php

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'market-index-controller',
                        'action' => 'index'
                    )
                )
            ),
            'market' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/market',
                    'defaults' => array(
                        'controller' => 'market-index-controller',
                        'action' => 'index'
                    )
                ),               
                'may_terminate' => true,
                'child_routes' => array(
                    'view' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/view',
                            'defaults' => array(
                                'controller' => 'market-view-controller',
                                'action' => 'index'
                            )
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'main' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/main[/:category]',
                                    'defaults' => array(
                                        'action' => 'index'
                                    )
                                )
                            ),
                            'item' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/item[/:itemId]',
                                    'defaults' => array(
                                        'action' => 'item'
                                    ),
                                    'constraints' => array(
                                        'itemId' => '[0-9]*'
                                    )
                                )
                            )
                        )
                    )
                )
            ),
            'market-test' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/market/test',
                    'defaults' => array(
                        'controller' => 'market-test-controller',
                        'action' => 'index',
                    )
                )
            )
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'market-index-controller' => 'Market\Controller\IndexController',
            'market-test-controller' => 'Market\Controller\TestController',
            'market-view-controller' => 'Market\Controller\ViewController'
        ),
        'factories' => array(
            'market-post-controller' => 'Market\Factory\PostControllerFactory'
        //'market-post-controller' => 'Market\Controller\PostControllerFactory'  /** foi apenas um teste **/
        ),
        'aliases' => array(
            'alt' => 'market-view-controller'
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    )
);

