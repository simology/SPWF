<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit371dff1d4d341cc8bbf47a9d67753c68
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit371dff1d4d341cc8bbf47a9d67753c68', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit371dff1d4d341cc8bbf47a9d67753c68', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit371dff1d4d341cc8bbf47a9d67753c68::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
