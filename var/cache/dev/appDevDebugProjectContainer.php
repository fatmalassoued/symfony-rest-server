<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerD7tvdti\appDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerD7tvdti/appDevDebugProjectContainer.php') {
    touch(__DIR__.'/ContainerD7tvdti.legacy');

    return;
}

if (!\class_exists(appDevDebugProjectContainer::class, false)) {
    \class_alias(\ContainerD7tvdti\appDevDebugProjectContainer::class, appDevDebugProjectContainer::class, false);
}

return new \ContainerD7tvdti\appDevDebugProjectContainer(array(
    'container.build_hash' => 'D7tvdti',
    'container.build_id' => 'fb89d2f7',
    'container.build_time' => 1546456394,
), __DIR__.\DIRECTORY_SEPARATOR.'ContainerD7tvdti');
