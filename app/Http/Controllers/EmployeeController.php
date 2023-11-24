<?php

namespace App\Http\Controllers;

use App\services\EmployeeService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
   public function createEmployee(Request $request): JsonResponse
   {
       try {
           $employeeService = new EmployeeService();
           $employeeService->createEmployee($request);

           return sendSuccessResponse('Employee created successfully');
       }catch (Exception $exception) {
           return sendErrorResponse('Error creating employee'.$exception->getMessage());
       }
   }
}
