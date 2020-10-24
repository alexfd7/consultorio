@extends('layouts.app')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Lista de Pacientes
              <a href="{{ route('patient.create','') }}" class="btn btn-sm btn-default"><i class="fas fa-plus"></i> Novo Cadastro</a>  
            </h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
            
              @include('flash::message')
              <!-- /.card-header -->
              <div class="card-body">

                @if (count($patients))
                  <table id="table-patients" class="table table-bordered table-datatable ">
                    <thead>                  
                      <tr>
                        <th style="width: 10px">Cód.</th>
                        <th>Nome</th>
                        <th>Cpf</th>
                        <th>Data Nascimento</th>
                        <th>Cadastrado em</th>
                        <th>Ações</th>
                        
                                                
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($patients as $p)
                        <tr>                        
                          
                          <td>{{$p->id }}</td>
                          <td>{{$p->name }}</td>
                          <td>{{$p->cpf }}</td>
                          <td>{{$p->birthday}}</td>
                          <td>{{$p->created_at}}</td>
                          <td >                                                                         

                            <a href="{{ route('patient.create', $p->id) }}" class="btn btn-xs btn-default"><i class="fas fa-edit cp" title="Editar Paciente"></i></a>

                            <a  id_patient="{{$p->id}}" style="color:red;"  class="btn btn-xs btn-default btn_remover"><i class="fas fa-times cp" title="Remover Paciente"></i></a>  


                          </td>                            
                                           
                        </tr>

                        @endforeach                     

                    </tbody>
                  </table>
                  <br>

                    <form id="form_remover" role="form" method="POST" action="{{ route('patient.delete') }}" enctype="multipart/form-data" > @csrf<input id="id_patient" name="id" type="hidden" /> </form>                  


                 @else
                  <div class="alert alert-info alert-dismissible">
                    <h5><i class="icon fas fa-info"></i> Não existem pacientes cadastrados!</h5>
                  </div>        
                @endif                  
                            
                   
                    
              </div>



           
      </div>    
    </section>
@endsection


@section('js')
    <script> 

  $(document).ready(function() {


          $( ".btn_remover" ).on( "click", function() {
               var id = $(this).attr('id_patient');
               $("#id_patient").val(id);
              
                Swal.fire({
                  title: 'Atenção!',
                  text: "Tem certeza que deseja remover o paciente?",
                  icon: 'info',
                  showCancelButton: true,
                  confirmButtonColor: '#007bff',
                  cancelButtonColor: '#ffc107',
                  confirmButtonText: 'Sim',
                  cancelButtonText: 'Voltar'
                }).then((result) => {
                  if (result.value) {                
                    $("#form_remover").submit();
                  }
                })             

          });    

      


  });


  
     </script>
@stop
