@extends('layouts.app')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Editar Médico



              <a href="{{ route('doctor.index','') }}" class="btn btn-sm btn-default"><i class="fas fa-undo"></i> Voltar</a>  
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
                        <form id="form_cadastrar" role="form" method="POST" action="{{ route('doctor.store') }}" enctype="multipart/form-data" >
                            @csrf

                            <div class="form-group col-md-6" style="display: inline-block;">
                              <label>Código:</label>
                              <input type="text" readonly="true" class="form-control"  id="id" name="id" placeholder="" value="{{$doctor->id}}">
                               
                            </div> 

                            <div class="form-group col-md-6" style="display: inline-block;">
                              <label>Nome:</label>
                              <input type="text" class="form-control" name="name"  id="name" placeholder="" value="{{$doctor->name}}" >
                              @error('name')
                                  <div class="alert" style="padding: 0; color: red; font-weight: 600;">{{ $message }}</div>
                              @enderror                                         
                            </div> 

                            <div class="form-group col-md-6" style="display: inline-block;">
                              <label>CRM:</label>
                              <input type="text" class="form-control" name="crm"  id="crm" placeholder="" value="{{$doctor->crm}}" />
                              @error('crm')
                                  <div class="alert" style="padding: 0; color: red; font-weight: 600;">{{ $message }}</div>
                              @enderror                                         
                            </div> 

                            <div class="form-group col-md-6" style="display: inline-block;">
                              <label>Especialidade:</label>
                              <input type="text" class="form-control" name="speciality"  id="speciality" value="{{$doctor->speciality}}" >
                              @error('speciality')
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
