<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends ApiResourceController
{
    public function __construct()
    {
        $this->url = config('swapi.swapi_url').'people';
        $this->type = 'people';
    }

    public function show($id) {
        $individualUrl = $this->url.'/'.$id;
        $person = $this->fetchData($individualUrl);
        $person['homeworld'] = $this->fetchData($person['homeworld']);

        $i = 0;
        foreach ($person['species'] as $item) {
            $person['species'][$i] = $this->fetchData($item);
            $i++;
        }

        $item = $person;

        return view('show', compact('item'));
    }
}
