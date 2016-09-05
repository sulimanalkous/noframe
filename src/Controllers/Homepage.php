<?php
/**
 * Created by PhpStorm.
 * User: suliman
 * Date: 03/09/16
 * Time: 07:26 م
 */
namespace Example\Controllers;

use Http\Request;
use Http\Response;
use Example\Template\FrontendRenderer;


class Homepage
{

    private $request;
    private $response;
    private $renderer;


    /**
     * Homepage constructor.
     * @param Request $request
     * @param Response $response
     * @param FrontendRenderer|Renderer $renderer
     */
    public function __construct(
        Request $request,
        Response $response,
        FrontendRenderer $renderer
    )
    {
        $this->response = $response;
        $this->request = $request;
        $this->renderer = $renderer;
    }

    public function show()
    {
        $data = [
          'name' => $this->request->getParameter('name', 'stranger'),
        ];
        $html = $this->renderer->render('Homepage', $data);
        $this->response->setContent($html);
    }

}