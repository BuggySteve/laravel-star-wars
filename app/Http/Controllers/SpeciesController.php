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

    public function show($id) {
        $individualUrl = $this->url.'/'.$id;
        $species = $this->fetchData($individualUrl);

        $i = 0;
        foreach ($species['people'] as $item) {
            $species['people'][$i] = $this->fetchData($item);
            $i++;
        }

        $i = 0;
        foreach ($species['films'] as $item) {
            $species['films'][$i] = $this->fetchData($item);
            $i++;
        }

        $item = $species;

        return view('show', compact('item'));
    }
}
