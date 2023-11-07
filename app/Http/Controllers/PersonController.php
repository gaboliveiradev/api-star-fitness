<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePersonRequest;
use App\Models\PersonModel;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function update(UpdatePersonRequest $request, $id)
    {
        $person = PersonModel::find($id);

        if (!$person) {
            return $this->error('Person Not Found', 404);
        }

        $person->fill($request->only(['name', 'email', 'document', 'phone', 'birthday', 'gender']));
        $person->save();

        return $this->success('Person has updated', $person, 200);
    }
}
