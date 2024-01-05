<?php

/**
 * Basic iterator based on \IteratorAggregate and \ArrayIterator and abstract Collection class.
 */

class Product
{
    public function __construct(
        private int $id,
        private string $name,
        private string $price,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): string
    {
        return $this->price;
    }
}

abstract class Collection implements \IteratorAggregate
{
    public function __construct(
        private array $items
    ) {
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }
}

class ProductCollection extends Collection
{
}

$p1 = new Product(1, 'Hat', '50');
$p2 = new Product(2, 'Rat', '1500');
$p3 = new Product(3, 'Cat', '3050');
$c = new ProductCollection([$p1, $p2, $p3]);

/** @var Product $item */
echo "Idx\tID\tName\tPrice" . PHP_EOL;
foreach ($c as $idx => $item) {
    echo $idx . ':';
    echo "\t";
    echo $item->getId();
    echo "\t";
    echo $item->getName();
    echo "\t";
    echo $item->getPrice();
    echo PHP_EOL;
}
