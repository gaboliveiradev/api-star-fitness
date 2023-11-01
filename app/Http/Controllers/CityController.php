<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Models\CityModel;
use Illuminate\Http\Request;

class CityController extends Controller
{
    private CityModel $cityModel;

    public function __construct()
    {
        $this->cityModel = new CityModel();
    }

    public function update(UpdateCityRequest $request, $id) 
    {
        $city = CityModel::find($id);

        if (!$city) {
            return $this->error('City Not Found', 404);
        }

        $city->fill($request->only(['name', 'state']));
        $city->save();

        return $this->success('City has updated', $city, 200);
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
