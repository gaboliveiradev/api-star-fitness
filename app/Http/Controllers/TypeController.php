<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTypeRequest;
use App\Models\TypeModel;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    private TypeModel $typeModel;

    public function __construct()
    {
        $this->typeModel = new TypeModel();
    }

    public function getAll()
    {
        $type = TypeModel::all(['*']);

        return $this->success('Types', $type, 200);
    }

    public function create(CreateTypeRequest $request)
    {
        $type = $this->typeModel::create($request->all());

        return $this->success('Type Created', $type, 201);
    }
}
