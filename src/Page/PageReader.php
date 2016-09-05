<?php

/**
 * Created by PhpStorm.
 * User: suliman
 * Date: 04/09/16
 * Time: 01:52 ص
 */
namespace Example\Page;


interface PageReader
{
    public function readBySlug($slug);
}