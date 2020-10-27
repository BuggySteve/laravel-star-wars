<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

abstract class ApiResourceController extends Controller
{
    protected $url;
    protected $type;
    
    /**
     * Display a listing of the items
     */
    public function index(Request $request) {
        // $type = $request->query('');
        $view = $this->type .= 'index';

        if ($this->type != '') {
            $this->url .= $this->type;
        }

        try {
            $items = $this->fetchData($this->url);

            return view($view, compact('items', 'type'));
        } catch(Exception $exception) {
            // throw new Exception("Could not fetch ".$type." from the STRAPI...", $exception);
            throw $exception;
        }
    }

    /**
     * Fetch resources from the API.
     *
     * @param  string  $url
     * @return array
     */
    private function fetchData($url) {
        try {
            $contents = file_get_contents($url);
            return json_decode($contents, true);
        } catch(Exception $exception) {
            throw $exception;
        }
    }
}
