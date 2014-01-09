<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Album\Controller\Album' => 'Album\Controller\AlbumController',
        ),
    ),
    'routers' => array(// routes for module starts here
        'routes' => array(
            'album' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/album[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',),
                    'defaults' => array(
                        'controller' => 'Album\Controller\Album',
                        'action' => 'index',),
                ),
            ),
        ),
    ), // routes for module ends here
    'view_manager' => array(
        'template_path_stack' => array(
            'album' => __DIR__ . '/../view',
        ),
    ),
);