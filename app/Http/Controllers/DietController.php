<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDietRequest;
use App\Models\DietModel;
use Illuminate\Http\Request;

class DietController extends Controller
{
    public function getAll()
    {
        $diets = DietModel::all();

        return $this->success('Diets', $diets, 200);
    }

    public function getAllByIdGymMember($id)
    {
        $diets = DietModel::where('id_gym_member', $id)->get();

        return $this->success('Diets By Gym Member', $diets, 200);
    }

    public function create(CreateDietRequest $request)
    {
        $diet = DietModel::create($request->all());

        return $this->success('Diet Created', $diet, 201);
    }
}
