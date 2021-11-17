<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    private Country $countryModel;

    public function __construct(Country $country)
    {
        $this->countryModel = $country;
    }

    public function getAll()
    {
        return response($this->countryModel->all());
    }
}
