<?php
namespace Materials;

use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'materials_home' => [
                'type'    => 'Literal',
                'options' => [
                    // Change this to something specific to your module
                    'route'    => '/materials',
                    'defaults' => [
                        'controller' => 'Materials\Controller\IndexController',
                        'action'        => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'paged' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '/page/:page' ,   // /materials/page/:page
                            'constraints' => [ 'page' => '[0-9]+' ],
                            'defaults' => [
                                'controller' => 'Materials\Controller\Index',
                                'action' => 'index'
                            ]
                        ]
                    ]
                ],
            ],
            'materials_add' => [
              'type' => 'Literal',
              'options' => [
                'route' => '/materials/add',
                'defaults' => [
                  'controller'  => 'Materials\Controller\Index',
                  'action'      => 'add'
                ]
              ]
            ],
            'edit_item' => [
              'type' => 'Segment',
              'options' => [
                'route' => '/materials/edit/:itemId',
                'constraints' => [
                  'itemId' => '[0-9]+'
                ],
                'defaults' => [
                  'controller'  => 'Materials\Controller\Index',
                  'action'      => 'edit'
                ]
              ]
            ],
            'delete_item' => [
              'type' => 'Segment',
              'options' => [
                'route' => '/materials/delete/:itemId',
                'constraints' => [
                  'itemId' => '[0-9]+'
                ],
                'defaults' => [
                  'controller'  => 'Materials\Controller\Index',
                  'action'      => 'delete'
                ]
              ]
            ],
            'display_item' => [
              'type' => 'Segment',
              'options' => [
                'route' => '/materials/:itemSlug',
                'contraints' => [
                  'itemSlug'      => '[a-zA-Z0-9-]+',
                ],
                'defaults' => [
                  'controller'  => 'Materials\Controller\Index',
                  'action'      => 'viewitem'
                ]
              ]
            ]
        ],
    ],         
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
           'view' => __DIR__ . '/../view',
        ],
    ],
];
