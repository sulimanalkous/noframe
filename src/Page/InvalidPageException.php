<?php
/**
 * Created by PhpStorm.
 * User: suliman
 * Date: 04/09/16
 * Time: 02:07 ص
 */

namespace Example\Page;


use Exception;

class InvalidPageException extends Exception
{


    /**
     * InvalidPageException constructor.
     * @param string $slug
     * @param int $code
     * @param Exception $previous
     */
    public function __construct($slug, $code = 0, Exception $previous = null)
    {
        $message = "No page with the slug `$slug` was found";
        parent::__construct($message, $code, $previous);
    }
}