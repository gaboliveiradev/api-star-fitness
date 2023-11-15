<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWorkoutRoutineRequest;
use App\Models\WorkoutRoutineModel;
use Illuminate\Http\Request;

class WorkoutRoutineController extends Controller
{
    public function getAll()
    {
        $workoutRoutine = WorkoutRoutineModel::all();

        return $this->success('Workout Routines', $workoutRoutine, 200);
    }

    public function getAllByIdGymMember($id)
    {
        $workoutRoutine = WorkoutRoutineModel::where('id_gym_member', $id)->get();

        return $this->success('Workout Routines By Gym Member', $workoutRoutine, 200);
    }

    public function create(CreateWorkoutRoutineRequest $request)
    {
        $workoutRoutine = WorkoutRoutineModel::create($request->all());

        return $this->success('Workout Routine Created', $workoutRoutine, 201);
    }
}
