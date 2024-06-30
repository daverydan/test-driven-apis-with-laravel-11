<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentController extends Controller
{
    public function index(): JsonResource
    {
        return DepartmentResource::collection(Department::all());
    }
}
