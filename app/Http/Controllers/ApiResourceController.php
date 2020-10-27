<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

abstract class ApiResourceController extends Controller
{
    protected $url;
    protected $type;
    
    /**
     * Display a listing of the items
     */
    public function index(Request $request) {
        $page = $request->query('page', '');
        $type = $this->type;

        if ($page != '') {
            $this->url .= '?page=' . $page;
        }

        try {
            $resultData = $this->fetchData($this->url);
            $pagination = $this->getPagination($resultData);
            $next = $pagination['next'];
            $previous = $pagination['previous'];
            $items = $resultData['results'];

            return view('index', compact('items', 'next', 'previous', 'type'));
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

    private function getPagination($result) {
        return [
            'next' => isset($result['next']) ? Str::after($result['next'], 'page=') : '',
            'previous' => isset($result['previous']) ? Str::after($result['previous'], 'page=') : ''
        ];

    }
}
