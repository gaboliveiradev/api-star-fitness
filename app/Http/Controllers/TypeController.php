<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTypeRequest;
use App\Models\TypeModel;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    public function getAll()
    {
        $type = TypeModel::all();

        return $this->success('Types', $type, 200);
    }

    public function create(CreateTypeRequest $request)
    {
        $type = TypeModel::create($request->all());

        return $this->success('Type Created', $type, 201);
    }

    public function delete($id) 
    {
        $type = TypeModel::where('id', $id)->first();

        if (!$type) {
            return $this->error('Plan Not Found', 404);
        }

        if (!$type->active) {
            return $this->error('This plan is already deactivated.', 422);
        }

        $type->active = false;
        $type->save();

        return $this->success('Plan Deactivated Successfully', $type, 200);
    }
}
