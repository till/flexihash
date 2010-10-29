<?php
/**
 * @category Autoload
 * @package  Flexihash
 * @author   Till Klampaeckel <till@php.net>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @version  Git: $Id$
 * @link     http://github.com/till/flexihash
 */

/**
 * @desc Register autoload!
 */
spl_autoload_register(array('Flexihash_Bootstrap', 'autoload'));

/**
 * A small and lean autoloader! ;-)
 *
 * @category Autoload
 * @package  Flexihash
 * @author   Till Klampaeckel <till@php.net>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
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
            $base = dirname(__DIR__) . '/';
        }
        if (substr($className, 0, 9) == 'Flexihash') {
            return include $base . str_replace('_', '/', $className) . '.php';
        }
        return false;
    }
}
