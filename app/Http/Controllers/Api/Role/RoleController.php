<?php

namespace App\Http\Controllers\Api\Role;

use App\Http\Controllers\Controller;
use App\Http\Response\ApiResponse;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function getAll()
    {
        try {
            $role = Role::all()->toArray();

            return new ApiResponse(200, $role, "fetched all roles sucessfully");

        } catch (\Exception $e) {
            ApiResponse::throw($e, $e->getMessage());
            ApiResponse::serverError();
        }
    }
}
