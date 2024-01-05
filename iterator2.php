<?php

/**
 * Basic iterator based on \Iterator using class property $key.
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

class ProductCollection implements \Iterator
{
    private int $key;

    public function __construct(
        /** @var Product[] */
        private array $products
    ) {
    }

    public function current(): mixed
    {
        return $this->products[$this->key];
    }

    public function next(): void
    {
        ++$this->key;
    }

    public function key(): mixed
    {
        return $this->key;
    }

    public function valid(): bool
    {
        return isset($this->products[$this->key]);
    }

    public function rewind(): void
    {
        $this->key = 0;
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
