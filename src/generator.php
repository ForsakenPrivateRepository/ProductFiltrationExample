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

    public static function get($count, $avg)
    {
        $values = range(1, $count);
        $positions = array_combine($values, $values);

        $products = [];

        $shift = $count + 1000000;

        foreach ($positions as $position) {
            $productPosition = [$position];

            for ($rest = 1; $rest < $avg; $rest++) {
                $productPosition[] = $shift + $count * $rest;
            }

            $products[++$shift] = $productPosition;
        }

        return new self($positions, $products);
    }

    private function __construct(array $positions, array $products)
    {
        $this->positions = $positions;
        $this->products = $products;
    }
} 