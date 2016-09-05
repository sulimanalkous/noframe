<?php
/**
 * Created by PhpStorm.
 * User: suliman
 * Date: 05/09/16
 * Time: 02:38 ص
 */

namespace Example\Menu;


class ArrayMenuReader implements MenuReader
{

    public function readMenu()
    {
        return [
            ['href' => '/', 'text' => 'Homepage'],
            ['href' => '/page-one', 'text' => 'Page One'],
        ];
    }
}