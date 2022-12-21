<?php

class RouterController extends Controller
{

    /**
     * The inner controller instance
     *
     * @var Controller
     */
    protected $controller;

    /**
     * Parses the URL address and creates appropiate  controller
     *
     * @param [type] $params
     * @return void
     */
    public function process($params)
    {
        $parsedUrl = $this->parseUrl($params[0]);
        //the controller name is the first URL parameter
        $controllerClass = $this->dashesToCamel(array_shift($parsedUrl)) . 'Controller';
        // Printing the controller class name just to be sure we're going to instantiate the right class
		echo("Controller Class: ". $controllerClass);
		echo('<br /> Parsed URL');
		print_r($parsedUrl);
		// To be continued :)

    }

    /**
     * Parses the URL address using slashes and returns params as array
     *
     * @param string $url - the URL address to be parsed
     * @return array The URL parameters
     */
    private function parseUrl($url) 
    {
        //Parses URL parts into an associative array 
        $parsedUrl = parse_url($url);
        //removes the leading slash
        $parsedUrl["path"] = ltrim($parsedUrl["path"], "/");
        //removes white-spaces around the address
        $parsedUrl["path"] = trim($parsedUrl["path"]);
        //splits the address by slashes
        $explodedUrl = explode("/", $parsedUrl["path"]);
        return $explodedUrl;
    }


    /**
	 * Converts dashed controller name from URL into a CamelCase class name
     *
	 * @param string $text The controller name using dashes like article-list   
     * @return string - the class name of the controller like ArticleList
     */
    private function dashesToCamel($text)
    {
        $text = str_replace('-', ' ', $text);
        $text = ucwords($text);
$       $text = str_replace(' ', '', $text);
        return $text;
    }



}