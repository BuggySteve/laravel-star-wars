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
        $view = $this->type . '.index';

        try {
            $items = $this->fetchData($this->url);

            return view($view, compact('items'));
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
