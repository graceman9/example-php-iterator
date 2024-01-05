# example-php-generator
Example PHP generator

For now it's just a simple example of PHP iterator, let's see if it will grow up into something more fun.

This files intended to run as a CLI scripts:
```console
php ./iterator1.php
php ./iterator2.php
php ./iterator3.php
php ./iterator4.php
```

There are four examples:
1. Basic iterator based on \Iterator using PHP array functions: current(), next(), key(), reset().
2. Basic iterator based on \Iterator using class property $key.
3. Basic iterator based on \IteratorAggregate and \ArrayIterator.
4. Basic iterator based on \IteratorAggregate and \ArrayIterator and abstract Collection class.
