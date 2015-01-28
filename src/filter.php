<?php

namespace ReenExe\ProductFiltrationExample;

class Filter
{
    public static function execute(array $positions, array $products)
    {
        $flips = [];

        foreach ($products as $productCode => $productPositions) {
            $flips[] = array_fill_keys($productPositions, $productCode);
        }

        $flip = call_user_func_array('array_merge', $flips);
        Output::write('count', count($flip));

        return array_intersect_key($flip, array_fill_keys($positions, true));
    }
} 