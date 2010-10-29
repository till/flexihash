Flexihash
=========

Flexihash is a small PHP library which implements [consistent hashing][0], which is most useful in distributed caching.  It requires PHP5 and uses [SimpleTest][1] for unit testing.

[0]: http://en.wikipedia.org/wiki/Consistent_hashing
[1]: http://simpletest.org/

Usage Example
-------------

<pre>
&lt;?php
require_once 'Flexihash/Bootstrap.php';
$hash = new Flexihash();

// bulk add
$hash->addTargets(array('cache-1', 'cache-2', 'cache-3'));

// simple lookup
$hash->lookup('object-a'); // "cache-1"
$hash->lookup('object-b'); // "cache-2"

// add and remove
$hash
  ->addTarget('cache-4')
  ->removeTarget('cache-1');

// lookup with next-best fallback (for redundant writes)
$hash->lookupList('object', 2); // ["cache-2", "cache-4"]

// remove cache-2, expect object to hash to cache-4
$hash->removeTarget('cache-2');
$hash->lookup('object'); // "cache-4"
</pre>

Further Reading
---------------

  * http://www.spiteful.com/2008/03/17/programmers-toolbox-part-3-consistent-hashing/
  * http://weblogs.java.net/blog/tomwhite/archive/2007/11/consistent_hash.html
