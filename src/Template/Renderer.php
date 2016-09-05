<?php
/**
 * Created by PhpStorm.
 * User: suliman
 * Date: 03/09/16
 * Time: 11:53 م
 */
namespace Example\Template;

interface Renderer
{
    public function render($template, $data = []);
}