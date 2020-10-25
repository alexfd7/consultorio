<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class DoctorController extends Controller
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
        $doctors = Doctor::where('deleted_at', NULL)->get(); 

        return view('doctor.index', compact('doctors'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


    public function create($id=null)
    {
        if(isset($id)){
            $doctor = Doctor::where('id', $id)->get();            
            return view('doctor.edit', ['doctor' => $doctor[0]]);


        }else{
            $doctor= array();
            return view('doctor.create', ['doctor' => $doctor]);
        }
        
    
        
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        /*Validador dos campos da View*/
        $validator = Validator::make($request->all(), [            
            'name' => 'required',
            'crm' => 'required',
            'speciality' => 'required',
        ],['required' => 'Este campo é obrigatório!']);

        if ($validator->fails()) {                
            return redirect()->route('doctor.create',['id' => $request->id])->withErrors($validator)->withInput();
        }        

        //EDIT
        if(isset($request->id)){
            Doctor::where('id', $request->id)->update($request->except('_token'));  
            flash('Médico atualizado com sucesso!')->success();  
        }else{
        //CREATE
            Doctor::create($request->all());    
            flash('Médico cadastrado com sucesso!')->success();
        }
        

        
        return redirect()->route('doctor.index');
    }


    public function delete(Request $request)
    {
        
        Doctor::findOrFail($request->id)->delete();                      
        
        flash('Médico removido com sucesso!')->success();
        return redirect()->route('doctor.index');
         
    }

}
