<?php

namespace ContainerONj7YTp;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCommentarysRepositoryService extends App_KernelProdContainer
{
    /*
     * Gets the private 'App\Repository\CommentarysRepository' shared autowired service.
     *
     * @return \App\Repository\CommentarysRepository
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['App\\Repository\\CommentarysRepository'] = new \App\Repository\CommentarysRepository(($container->services['doctrine'] ?? $container->getDoctrineService()));
    }
}
