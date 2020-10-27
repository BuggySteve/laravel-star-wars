<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

abstract class ApiResourceController extends Controller
{
    protected $url;
    
    /**
     * Display a listing of the items
     */
    public function index(Request $request) {
        $type = $request->type;

        if ($type != '') {
            $this->url .= $type;
        }

        try {
            $items = $this->fetchData($this->url);

            return view('index', compact('items', 'type'));
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
