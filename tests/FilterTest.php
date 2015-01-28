<?php

use ReenExe\ProductFiltrationExample\Filter;
use ReenExe\ProductFiltrationExample\Generator;

class FilterTest extends PHPUnit_Framework_TestCase
{
    public function testTime()
    {
        $generator = Generator::get(50000);

        $generatedProducts = $generator->getProducts();

        $filteredProducts = Filter::execute($generator->getPositions(), $generatedProducts);

        $this->assertEquals(count($generatedProducts), count($filteredProducts));
    }
} 