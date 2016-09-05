<?php
/**
 * Created by PhpStorm.
 * User: suliman
 * Date: 03/09/16
 * Time: 02:38 م
 */

return [
    ['GET', '/', ['Example\Controllers\Homepage', 'show']],
    ['GET', '/{slug}', ['Example\Controllers\Page', 'show']],
];