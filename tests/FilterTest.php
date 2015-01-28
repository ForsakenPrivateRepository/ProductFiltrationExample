<?php

use ReenExe\ProductFiltrationExample\Filter;
use ReenExe\ProductFiltrationExample\Generator;

class FilterTest extends PHPUnit_Framework_TestCase
{
    public function testTime()
    {
        $generator = Generator::get(500000, 12);

        $generatedProducts = $generator->getProducts();

        $startTime = microtime(true);
        $filteredProducts = Filter::execute($generator->getPositions(), $generatedProducts);
        echo microtime(true) - $startTime;

        $this->assertEquals(count($generatedProducts), count($filteredProducts));
    }
} 