<?php

namespace ReenExe\ProductFiltrationExample;

class Generator
{
    private $products = [];
    private $positions = [];

    public function getProducts()
    {
        return $this->products;
    }

    public function getPositions()
    {
        return $this->positions;
    }

    public static function get($count)
    {
        $values = range(1, $count);
        $positions = array_combine($values, $values);
        $rests = array_combine($values, range($count + 1, 2 * $count));

        $products = [];

        $shift = 1000000;

        foreach ($values as $key) {
            $products[++$shift + $key * 3] = [$positions[$key], $rests[$key]];
        }

        return new self($positions, $products);
    }

    private function __construct(array $positions, array $products)
    {
        $this->positions = $positions;
        $this->products = $products;
    }
} 