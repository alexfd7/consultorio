@extends('layouts.app')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Editar Paciente



              <a href="{{ route('patient.index','') }}" class="btn btn-sm btn-default"><i class="fas fa-undo"></i> Voltar</a>  
            </h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
                           
              <!-- /.card-header -->
              <div class="card-body">
  
                      <div  class="row" style="display: inline-block;">
                        <form id="form_cadastrar" role="form" method="POST" action="{{ route('patient.store') }}" enctype="multipart/form-data" >
                            @csrf


                            <div class="form-group col-md-6" style="display: inline-block;">
                              <label>Código:</label>
                              <input type="text" readonly="true" class="form-control"  id="id" name="id" placeholder="" value="{{$patient->id}}">
                               
                            </div>                             

                            <div class="form-group col-md-6" style="display: inline-block;">
                              <label>Nome:</label>
                              <input type="text" class="form-control" name="name"  id="name" placeholder="" value="{{$patient->name}}"  >
                              @error('name')
                                  <div class="alert" style="padding: 0; color: red; font-weight: 600;">{{ $message }}</div>
                              @enderror                                         
                            </div> 

                            <div class="form-group col-md-6" style="display: inline-block;">
                              <label>CPF:</label>
                              <input type="number" class="form-control" name="cpf" id="cpf" placeholder="" value="{{$patient->cpf}}" />
                              @error('cpf')
                                  <div class="alert" style="padding: 0; color: red; font-weight: 600;">{{ $message }}</div>
                              @enderror                                         
                            </div> 


                            @php
                                $arr = explode("/", $patient->birthday);
                                $data_formatada = $arr[2].'-'.$arr[1].'-'.$arr[0];                                
                            @endphp
                            <div class="form-group col-md-6" style="display: inline-block;">
                              <label>Data de Nascimento:</label>
                              <input type="date" class="form-control" name="birthday"  id="birthday" value="{{$data_formatada}}" >
                              @error('birthday')
                                  <div class="alert" style="padding: 0; color: red; font-weight: 600;">{{ $message }}</div>
                              @enderror                                         
                            </div>                                                         
                           

                            <div class="form-group col-md-5" style="display: inline-block;">
                              
                            </div>                        

                          
                            <div class=" col-md-12" >
                                <button type="submit" class="btn btn-sm btn-success">Salvar</button> 
                            </div> 
                        </form>
                         
                     </div>

              </div>

          
      </div>    
    </section>
@endsection


@section('js')
    <script> 

    $(document).ready(function() {
      
   

    });


  
     </script>
@stop
