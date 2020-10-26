<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
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
        $patients = Patient::all();
        //dd($patients);
        return view('patient.index', compact('patients'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create($id=null)
    {
        if(isset($id)){
            $patient = Patient::where('id', $id)->get();
            return view('patient.edit',  ['patient' => $patient[0]]);

        }else{
            $patient= array();
            return view('patient.create',  ['patient' => $patient]);
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
            'cpf' => 'required',
            'birthday' => 'required|date_format:"Y-m-d"',
        ],['required' => 'Este campo é obrigatório!','date_format' => 'O campo não corresponde ao formato d/m/Y ']);

        if ($validator->fails()) {                
            return redirect()->route('patient.create',['id' => $request->id])->withErrors($validator)->withInput();
        }        


        //EDIT
        if(isset($request->id)){
            Patient::where('id', $request->id)->update($request->except('_token'));  
            flash('Paciente atualizado com sucesso!')->success();
        }else{
        //CREATE
            Patient::create($request->all()); 
            flash('Paciente cadastrado com sucesso!')->success();
        }
        
        
        return redirect()->route('patient.index');
    }

    public function delete(Request $request)
    {
        
        Patient::findOrFail($request->id)->delete();                      
        flash('Paciente removido com sucesso!')->success();
        return redirect()->route('patient.index');
         
    }  

    public function patientJson(Request $request)
    {
        

        $patients = DB::table('patients')
        ->select('patients.id', 'patients.name as text')           
        ->where('patients.name', 'like', '%' . $request->q . '%')
        ->where('patients.deleted_at', NULL)->get(); 

              
        return response()->json(['items'=> $patients]);
        
    }   

}
