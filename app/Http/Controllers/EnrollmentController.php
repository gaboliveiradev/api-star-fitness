<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEnrollmentRequest;
use App\Models\EnrollmentModel;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    private EnrollmentModel $enrollmentModel;

    public function __construct()
    {
        $this->enrollmentModel = new EnrollmentModel();
    }

    public function create(CreateEnrollmentRequest $request)
    {
        $enrollment = $this->enrollmentModel::create($request->all());

        return $this->success('Enrollment Created', $enrollment, 201);
    }
}
