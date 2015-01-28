<?php

namespace ReenExe\ProductFiltrationExample;

class Output
{
    public static function write($label, $value)
    {
        echo "|$label:$value|";
    }
}