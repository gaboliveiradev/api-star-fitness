<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMeasurementRequest;
use App\Models\MeasurementModel;
use Illuminate\Http\Request;

class MeasurementController extends Controller
{
    public function create(CreateMeasurementRequest $request)
    {
        $measurement = MeasurementModel::create($request->all());

        return $this->success('Measurement Created', $measurement, 201);
    }
}
