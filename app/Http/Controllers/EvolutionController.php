<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEvolutionRequest;
use App\Models\EvolutionModel;
use Illuminate\Http\Request;

class EvolutionController extends Controller
{
    public function create(CreateEvolutionRequest $request)
    {
        $evolution = EvolutionModel::create($request->all());

        return $this->success('Evolution Created', $evolution, 201);
    }
}
