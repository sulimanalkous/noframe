<?php
/**
 * Created by PhpStorm.
 * User: suliman
 * Date: 03/09/16
 * Time: 11:55 م
 */

namespace Example\Template;


use Mustache_Engine;

class MustacheRenderer implements Renderer
{
    private $engine;

    /**
     * MustacheRenderer constructor.
     * @param $engine
     */
    public function __construct(Mustache_Engine $engine)
    {
        $this->engine = $engine;
    }


    public function render($template, $data = [])
    {
        return $this->engine->render("$template.html", $data);
    }
}