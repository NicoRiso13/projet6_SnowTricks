<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerWTtRKU3\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerWTtRKU3/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerWTtRKU3.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerWTtRKU3\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerWTtRKU3\App_KernelDevDebugContainer([
    'container.build_hash' => 'WTtRKU3',
    'container.build_id' => '9b5a195b',
    'container.build_time' => 1683060615,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerWTtRKU3');