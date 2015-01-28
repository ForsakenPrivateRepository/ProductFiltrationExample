<?php

use ReenExe\ProductFiltrationExample\Filter;
use ReenExe\ProductFiltrationExample\Generator;

class FilterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testTime($count, $avg)
    {
        $generator = Generator::get($count, $avg);

        $generatedProducts = $generator->getProducts();

        $startTime = microtime(true);
        $filteredProducts = Filter::execute($generator->getPositions(), $generatedProducts);
        echo microtime(true) - $startTime;

        $this->assertEquals(count($generatedProducts), count($filteredProducts));
    }

    public function dataProvider()
    {
        return [
            [500000, 2],
            [500000, 3],
            [500000, 5],
            [500000, 6],
            [500000, 8],
            [500000, 15],
        ];
    }
} 