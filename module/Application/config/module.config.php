<?php

namespace Application;

use Application\Controller\MotoristaController;
use Application\Controller\VeiculoController;
use Application\Domain\Service\MotoristaService;
use Application\Domain\Service\VeiculoService;

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Home',
                        'action'     => 'index',
                    ),
                ),
            ),
            'veiculo' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/veiculo[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\Veiculo',
                        'action'     => 'index',
                    ),
                ),
            ),
            'motorista' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/motorista[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\Motorista',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Application\Domain\Service\VeiculoServiceInterface' => function($serviceManager) {
                return new VeiculoService($serviceManager);
            },
            'Application\Domain\Service\MotoristaServiceInterface' => function($serviceManager) {
                return new MotoristaService($serviceManager);
            }
        ),
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Home' => 'Application\Controller\HomeController'
        ),
        'factories' => array(
            'Application\Controller\Veiculo' => function($serviceManager) {
                $locator = $serviceManager->getServiceLocator();
                $service = $locator->get('Application\Domain\Service\VeiculoServiceInterface');

                return new VeiculoController($service);
            },
            'Application\Controller\Motorista' => function($serviceManager) {
                $locator = $serviceManager->getServiceLocator();
                $service = $locator->get('Application\Domain\Service\MotoristaServiceInterface');
                $veiculoService = $locator->get('Application\Domain\Service\VeiculoServiceInterface');

                return new MotoristaController($service, $veiculoService);
            },
        )
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/home/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'models' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Domain/Model')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Application\Domain\Model' => 'models'
                )
            )
        )
    ),
);
