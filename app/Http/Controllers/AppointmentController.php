<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }    
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('appointment.index');
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $formData = $request->all();

               
        /*Validador dos campos da View*/
        $validator = Validator::make($formData, [            
            'doctor_id' => 'required',
            'patient_id' => 'required',
            'date_appointment' => 'required',            
        ],['required' => 'Este campo é obrigatório!']);


        if(!isset($formData['doctor_id'])){            
            $validator->errors()->add('doctor_id', 'Este campo é obrigatório!');
        }

        if(!isset($formData['patient_id'])){            
            $validator->errors()->add('patient_id', 'Este campo é obrigatório!');
        }        


        if ($validator->fails()) { 
                       
            return redirect()->back()->withErrors($validator->errors());
        }        
        
        
        Appointment::create($request->all()); 
        flash('Agendamento cadastrado com sucesso!')->success();

        return redirect()->route('appointment.index');
    }


    public function appointmentJson(Request $request)
    {
        

        $appointments = DB::table('appointments')
        ->join('patients', 'patients.id', '=', 'appointments.patient_id')            
        ->select('patients.name as title', 'appointments.date_appointment as start')
        ->where('appointments.doctor_id', $request->doctor_id)->get();   

              
        return response()->json(['items'=> $appointments]);
        
    }       


  

}
