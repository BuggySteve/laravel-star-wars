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

    public function show($id) {
        $individualUrl = $this->url.'/'.$id;
        $planet = $this->fetchData($individualUrl);

        $i = 0;
        foreach ($planet['films'] as $item) {
            $planet['films'][$i] = $this->fetchData($item);
            $i++;
        }

        $i = 0;
        foreach ($planet['residents'] as $item) {
            $planet['residents'][$i] = $this->fetchData($item);
            $i++;
        }

        $item = $planet;

        return view('show', compact('item'));
    }
}
