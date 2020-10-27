<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeopleController extends ApiResourceController
{
    public function __construct()
    {
        $this->url = config('swapi.swapi_url').'people';
        $this->type = 'people';
    }
}
