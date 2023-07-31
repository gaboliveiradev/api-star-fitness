<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTypeRequest;
use App\Models\TypeModel;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    private TypeModel $typeModel;

    public function __construct()
    {
        $this->typeModel = new TypeModel();
    }

    public function create(CreateTypeRequest $request)
    {
        $type = $this->typeModel::create($request->all());

        return $this->success('Type Created', $type, 201);
    }
}
