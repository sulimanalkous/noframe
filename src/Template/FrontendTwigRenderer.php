<?php
/**
 * Created by PhpStorm.
 * User: suliman
 * Date: 04/09/16
 * Time: 01:38 ص
 */

namespace Example\Template;


use Example\Menu\MenuReader;
use Twig_Environment;
use Twig_Loader_Filesystem;

class FrontendTwigRenderer implements FrontendRenderer
{
    private $renderer;
    private $menuReader;

    /**
     * FrontendTwigRenderer constructor.
     * @param Renderer $renderer
     * @param MenuReader $menuReader
     */
    public function __construct(Renderer $renderer, MenuReader $menuReader)
    {
        $loader = new Twig_Loader_Filesystem('Templates/');
        $twig = new Twig_Environment($loader);
        $this->renderer = $twig;
        $this->menuReader = $menuReader;
    }


    public function render($template, $data = [])
    {
        $data = array_merge($data, [
            'menuItems' => $this->menuReader->readMenu(),
        ]);
        return $this->renderer->render("$template.twig", $data);
    }
}