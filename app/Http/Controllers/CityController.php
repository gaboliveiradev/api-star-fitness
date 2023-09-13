<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCityRequest;
use App\Models\CityModel;
use Illuminate\Http\Request;

class CityController extends Controller
{
    private CityModel $cityModel;

    public function __construct()
    {
        $this->cityModel = new CityModel();
    }

    public function create(CreateCityRequest $request) 
    {
        $isCity = CityModel::where('name', 'BARIRI')->first();

        if(!$isCity) {
            $city = $this->cityModel::create($request->all());
        }

        return $this->success(
            ($isCity) ? 'City found' : 'City Created',
            ($isCity) ? $isCity : $city,
        201);
    }
}
