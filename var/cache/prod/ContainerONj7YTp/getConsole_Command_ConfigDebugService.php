<?php

namespace ContainerONj7YTp;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getConsole_Command_ConfigDebugService extends App_KernelProdContainer
{
    /*
     * Gets the private 'console.command.config_debug' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\ConfigDebugCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->privates['console.command.config_debug'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\ConfigDebugCommand();

        $instance->setName('debug:config');
        $instance->setDescription('Dump the current configuration for an extension');

        return $instance;
    }
}
