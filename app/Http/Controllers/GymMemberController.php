<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGymMemberRequest;
use App\Models\EnrollmentModel;
use App\Models\GymMemberModel;
use Illuminate\Http\Request;

class GymMemberController extends Controller
{
    private GymMemberModel $gymMemberModel;
    private EnrollmentModel $enrollmentModel;

    public function __construct()
    {
        $this->gymMemberModel = new GymMemberModel();
        $this->enrollmentModel = new EnrollmentModel();
    }

    public function create(Request $request) 
    {
        $gymMember = $this->gymMemberModel::create($request->all());

        return $this->success('Gym Member Created', $gymMember, 201);
    }
}
