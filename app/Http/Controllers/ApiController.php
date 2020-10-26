<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ApiController extends Controller
{


	/**
	* @OA\Info(title="Documentação API", 
	*   contact={
	*     "email": "alexfd7@gmail.com"
	*   },
	*   version="0.1")
	*/

	/**
	 * @OA\Tag(
	 *     name="Medicos", 
	 * )
	*/

	/**
	 * @OA\Get(path="/consultorio/public/api/doctor",  tags={"Medicos"},
	 *   operationId="doctor", summary="Retorna lista com todos os médicos",
	 *   @OA\Response(response=200,
	 *     description="Successful!",         
	 *   ),         
	 * )
	 */


    public function doctor()
    {
        
        $doctors = Doctor::where('deleted_at', NULL)->get(); 
        return response()->json($doctors);
        
    } 



 
}
