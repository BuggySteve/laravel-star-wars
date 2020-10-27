<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanetController extends ApiResourceController
{
    public function __construct()
    {
        $this->url = config('swapi.swapi_url').'planets';
        $this->type = 'planets';
    }
}
