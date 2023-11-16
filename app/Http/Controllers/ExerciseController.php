<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExerciseRequest;

use App\Models\ExerciseModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class ExerciseController extends Controller
{
    public function getAll() 
    {
        $exercises = ExerciseModel::all();

        return $this->success('Exercises', $exercises, 200);
    }

    public function create(CreateExerciseRequest $request) 
    {
        // Gif Execution
        $gifExercise = $request->file('exercise_gif');
        $gifName = sprintf('%s_%s.%s', $request->all()['name'], time(), $gifExercise->getClientOriginalExtension());
        $gifPath = 'exerciseGif/' . $gifName;

        Storage::disk('public')->put($gifPath, File::get($gifExercise));

        // Image Equipament
        $imageEquipament = $request->file('equipment_gym_photo');
        $imageName = sprintf('%s_%s.%s', $request->all()['name'], time(), $imageEquipament->getClientOriginalExtension());
        $imagePath = 'equipamentsImage/' . $imageName;

        Storage::disk('public')->put($imagePath, File::get($imageEquipament));

        $exercise = ExerciseModel::create([
            'name' => $request->all()['name'],
            'exercise_gif' => url("/storage/" . $gifPath),
            'equipment_gym_photo' => url("/storage/" . $imagePath),
            'muscle_groups' => $request->all()['muscle_groups'],
        ]);

        return $this->success('Exercise Created', $exercise, 201);
    }

    public function delete($id)
    {
        $exercise = ExerciseModel::where('id', $id)->first();

        if(!$exercise) {
            return $this->error('Exercise Not Found', 404);
        }

        if(!$exercise->active) {
            return $this->error('This plan is already deactivated.', 422);
        }

        $exercise->active = false;
        $exercise->save();

        return $this->success('Exercise Deactivated Successfully', $exercise, 200);
    }
}
