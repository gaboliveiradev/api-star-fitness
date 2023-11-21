<?php

namespace App\Http\Controllers;

use App\Models\AccessGroupModel;
use Illuminate\Http\Request;

class AccessGroupController extends Controller
{
    public function getAll()
    {
        $accessGroup = AccessGroupModel::all();

        return $this->success('Access Groups', $accessGroup, 200);
    }
}
