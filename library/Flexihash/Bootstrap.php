<?php
/**
 * @category Autoload
 * @package  Flexihash
 * @author   Till Klampaeckel <till@php.net>
 * @license  http:// MIT License
 * @version  Release: @package_version@
 * @link     http://github.com/till/flexihash
 */
class Flexihash_Bootstrap
{
    /**
     * SPL autoload function, loads a flexihash class file based on the class name.
     *
     * @param string $className
     *
     * @return boolean
     */
    public static function autoload($className)
    {
        static $base;
        if ($base === null) {
            $base = dirname(__DIR__);
        }
        if (substr($className, 0, 10) == 'Flexihash_') {
            return include $base . str_replace('_', '/', $className) . '.php';
        }
        return false;
    }
}
