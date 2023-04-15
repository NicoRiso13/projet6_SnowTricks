<?php

namespace ContainerONj7YTp;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_Listener_UserChecker_MainService extends App_KernelProdContainer
{
    /*
     * Gets the private 'security.listener.user_checker.main' shared service.
     *
     * @return \Symfony\Component\Security\Http\EventListener\UserCheckerListener
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['security.listener.user_checker.main'] = new \Symfony\Component\Security\Http\EventListener\UserCheckerListener(new \Symfony\Component\Security\Core\User\InMemoryUserChecker());
    }
}
