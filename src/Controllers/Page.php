<?php
/**
 * Created by PhpStorm.
 * User: suliman
 * Date: 04/09/16
 * Time: 01:49 ص
 */

namespace Example\Controllers;


use Http\Response;
use Example\Page\PageReader;
use Example\Page\InvalidPageException;
use Example\Template\FrontendRenderer;

class Page
{

    private $response;
    private $renderer;
    private $PageReader;

    /**
     * Page constructor.
     * @param $response
     * @param $renderer
     * @param $PageReader
     */
    public function __construct(
        Response $response,
        PageReader $PageReader,
        FrontendRenderer $renderer
    )
    {
        $this->response = $response;
        $this->PageReader = $PageReader;
        $this->renderer = $renderer;
    }


    public function show($params)
    {
        $slug = $params['slug'];
        try {
            $data['content'] = $this->PageReader->readBySlug($slug);
        } catch (InvalidPageException $e) {
            $this->response->setStatusCode(404);
            return $this->response->setContent('404 - Page not found<br>'. $e);
        }

        $html = $this->renderer->render('Page', $data);
        $this->response->setContent($html);
    }
}