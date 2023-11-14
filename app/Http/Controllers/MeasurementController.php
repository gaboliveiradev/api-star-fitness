<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMeasurementRequest;
use App\Models\MeasurementModel;
use Illuminate\Http\Request;

class MeasurementController extends Controller
{
    public function getAllByIdEvolution($id) 
    {
        $measurement = MeasurementModel::where('id_evolution', $id)->first();

        return $this->success('Measurement By Evolution', $measurement, 200);
    }

    public function create(CreateMeasurementRequest $request)
    {
        $measurement = MeasurementModel::create($request->all());

        return $this->success('Measurement Created', $measurement, 201);
    }
}
