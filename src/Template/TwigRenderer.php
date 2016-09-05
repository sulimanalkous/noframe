<?php
/**
 * Created by PhpStorm.
 * User: suliman
 * Date: 04/09/16
 * Time: 01:29 ص
 */

namespace Example\Template;


use Twig_Environment;
use Twig_Loader_Filesystem;

class TwigRenderer implements Renderer
{
    private $renderer;

    /**
     * TwigRenderer constructor.
     * @param $renderer
     */
    public function __construct(Twig_Environment $renderer)
    {
        $loader = new Twig_Loader_Filesystem('Templates/');
        $twig = new Twig_Environment($loader);
        $this->renderer = $twig;
    }


    public function render($template, $data = [])
    {
        return $this->renderer->render("$template.twig", $data);
    }
}