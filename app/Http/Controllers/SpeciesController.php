<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpeciesController extends ApiResourceController
{
    public function __construct()
    {
        $this->url = config('swapi.swapi_url').'species';
        $this->type = 'species';
    }
}
