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
                'type' => 'Segment',
                'options' => array(
                    'route' => '/market[/]',
                    'defaults' => array(
                        'controller' => 'market-index-controller',
                        'action' => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'view' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => 'view[/]',
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
                                    'route' => 'main[/:category]',
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
            
            'market-post' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/market/post[/]',
                    'defaults' => array(
                        'controller' => 'market-post-controller',
                        'action' => 'index'
                    )
                    
                )
            ),
            
            'market-test' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/market/test[/]',
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
            'market-test-controller'    => 'Market\Controller\TestController',            
        ),
        'factories' => array(
            'market-index-controller'   => 'Market\Factory\IndexControllerFactory',
            'market-post-controller'    => 'Market\Factory\PostControllerFactory',
            'market-view-controller'    => 'Market\Factory\ViewControllerFactory'
        //'market-post-controller' => 'Market\Controller\PostControllerFactory'  /** foi apenas um teste **/
        ),
        'aliases' => array(
            'alt' => 'market-view-controller'
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'general-adapter'       => 'Zend\Db\Adapter\AdapterServiceFactory',
            'market-post-form'      => 'Market\Factory\PostFormFactory',
            'market-post-filter'    => 'Market\Factory\PostFilterFactory',
            'listings-table'        => 'Market\Factory\ListingsTableFactory'
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    )
);

