<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class People extends ApiResourceController
{
    public function __construct()
    {
        $this->url = config('swapi.swapi_url').'people';
        $this->type = 'people';
    }
}
