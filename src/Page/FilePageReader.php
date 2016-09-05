<?php
/**
 * Created by PhpStorm.
 * User: suliman
 * Date: 04/09/16
 * Time: 01:53 ص
 */

namespace Example\Page;


use InvalidArgumentException;

class FilePageReader implements PageReader
{
    private $pageFolder;

    /**
     * FilePageReader constructor.
     * @param $pageFolder
     */
    public function __construct($pageFolder)
    {
        if (!is_string($pageFolder)) {
            throw new InvalidArgumentException('pageFolder must be a string');
        }
        $this->pageFolder = $pageFolder;
    }


    /**
     * @param $slug
     * @return string
     * @throws InvalidPageException
     */
    public function readBySlug($slug)
    {
        if (!is_string($slug)) {
            throw new InvalidArgumentException('slug must be a string');
        }
        $path = "$this->pageFolder/$slug.md";

        if (!file_exists($path)) {
            throw new InvalidPageException($slug);
        }
        return file_get_contents($path);
    }
}