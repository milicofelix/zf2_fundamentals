<?php

return array(
    'router' => array(
        'routes' => array(
            'market' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/market',
                    'defaults' => array(
                        'controller' => 'market-index-controller',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            
// used to test that the controller shows up
            'market-test' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/market/test',
                    'defaults' => array(
                        'controller'    => 'market-test-controller',
                        'action'        => 'index',
                    ),

                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'market-index-controller' => 'Market\Controller\IndexController',
            'market-test-controller' => 'Market\Controller\TestController',
            'market-view-controller' => 'Market\Controller\ViewController'
        ),
        'factories' => array(
           //'market-post-controller' => 'Market\Factory\PostControllerFactory'  Não consegui fazer funcionar desta forma ;(
          'market-post-controller' => 'Market\Controller\PostControllerFactory'  
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    )
);

