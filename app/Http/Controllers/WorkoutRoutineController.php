<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWorkoutRoutineExerciseAssocMobileRequest;
use App\Http\Requests\CreateWorkoutRoutineExerciseAsssocRequest;
use App\Http\Requests\CreateWorkoutRoutineRequest;
use App\Models\ExerciseModel;
use App\Models\RoutineExerciseAssocModel;
use App\Models\WorkoutRoutineModel;
use Illuminate\Http\Request;

class WorkoutRoutineController extends Controller
{
    public function getAll()
    {
        $workoutRoutine = WorkoutRoutineModel::all();

        return $this->success('Workout Routines', $workoutRoutine, 200);
    }

    public function getAllWorkoutRoutineByIdAndWeekDay($weekday, $id) 
    {
        $workoutRoutine = RoutineExerciseAssocModel::where('id_workout_routine', $id)->where('week_day', $weekday)::with('exercise')->get();

        return $this->success('Workout Routine Exercise Assoc By Id And Week Day', $workoutRoutine, 200);
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

    public function createInMobile(CreateWorkoutRoutineExerciseAssocMobileRequest $request)
    {
        $workout = RoutineExerciseAssocModel::create([
            'id_workout_routine' => $request->all()['id_workout_routine'],
            'id_exercise' => $request['id_exercise'],
            'week_day' => $request['week_day'],
            'sets' => $request['sets'],
            'repetitions' => $request['repetitions'],
            'rest_seconds' => $request['rest_seconds'],
            'observation' => $request['observation'],
        ]);

        return $this->success("Workout Routine Exercise Assoc Created", $workout, 201);
    }

    public function createWorkoutRoutineExerciseAssoc(CreateWorkoutRoutineExerciseAsssocRequest $request)
    {
        foreach($request->all()['array_exercises'] as $item) {
            RoutineExerciseAssocModel::create([
                'id_workout_routine' => $request->all()['id_workout_routine'],
                'id_exercise' => $item['idExercise'],
                'week_day' => $item['weekDay'],
                'sets' => $item['sets'],
                'repetitions' => $item['repetitions'],
                'rest_seconds' => $item['rest'],
                'observation' => $item['observation'],
            ]);
        }

        $workout = RoutineExerciseAssocModel::where('id_workout_routine', $request->all()['id_workout_routine'])->get();

        return $this->success("Workout Routine Exercise Assoc Created", $workout, 201);
    }
}
