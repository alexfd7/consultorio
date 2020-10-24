@extends('layouts.app')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Cadastrar Novo Paciente



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
                              <label>Nome:</label>
                              <input type="text" class="form-control" name="name"  id="name" placeholder="Digite o nome"  value="{{ old('name') }}" >
                              @error('name')
                                  <div class="alert" style="padding: 0; color: red; font-weight: 600;">{{ $message }}</div>
                              @enderror                                         
                            </div> 

                            <div class="form-group col-md-6" style="display: inline-block;">
                              <label>CPF:</label>
                              <input type="number" class="form-control" name="cpf" id="cpf" placeholder="Digite o CPF"  value="{{ old('cpf') }}"/>
                              @error('cpf')
                                  <div class="alert" style="padding: 0; color: red; font-weight: 600;">{{ $message }}</div>
                              @enderror                                         
                            </div> 

                            <div class="form-group col-md-6" style="display: inline-block;">
                              <label>Data de Nascimento:</label>
                              <input type="date" class="form-control" name="birthday"  id="birthday" placeholder="Digite a Data de Nascimento" value="{{ old('birthday') }}">
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
