<?php
class Flexihash_Bootstrap
{
    /**
     * @param mixed $items Path or paths as string or array
     */
    function flexihash_unshift_include_path($items)
    {
        $elements = explode(PATH_SEPARATOR, get_include_path());

        if (is_array($items)) {
            set_include_path(implode(PATH_SEPARATOR, array_merge($items, $elements)));
        } else {
            array_unshift($elements, $items);
            set_include_path(implode(PATH_SEPARATOR, $elements));
        }
    }

    /**
     * SPL autoload function, loads a flexihash class file based on the class name.
     *
     * @param string $className
     *
     * @return boolean
     */
    public static function autoload($className)
    {
        if (substr($className, 0, 10) == 'Flexihash_') {
            return include str_replace('_', '/', $className) . '.php';
        }
        return false;
    }
}
