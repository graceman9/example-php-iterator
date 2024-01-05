<?php

/**
 * Basic iterator based on \Iterator using PHP array functions: current(), next(), key(), reset().
 */

class Product
{
    public function __construct(
        private int $id,
        private string $name,
        private string $price,
    ) {
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPrice(): string {
        return $this->price;
    }
}

class ProductCollection implements \Iterator
{
    public function __construct(
        /** @var Product[] */
        private array $products
    ) {
    }

    public function current(): mixed
    {
        return current($this->products);
    }

    public function next(): void
    {
        next($this->products);
    }

    public function key(): mixed
    {
        return key($this->products);
    }

    public function valid(): bool
    {
        return current($this->products) !== false;
    }

    public function rewind(): void
    {
        reset($this->products);
    }
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
