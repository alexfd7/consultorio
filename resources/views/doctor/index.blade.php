@extends('layouts.app')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Lista de Médicos
              <a href="{{ route('doctor.create','') }}" class="btn btn-sm btn-default"><i class="fas fa-plus"></i> Novo Cadastro</a>  
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

                @if (count($doctors))
                  <table id="table-doctors" class="table table-bordered table-datatable">
                    <thead>                  
                      <tr>
                        <th style="width: 10px">Cód.</th>
                        <th>Nome</th>
                        <th>Crm</th>
                        <th>Especialidade</th>
                        <th>Cadastrado em</th>
                        <th>Ações</th>
                        
                                                
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($doctors as $d)
                        <tr>                        
                          
                          <td>{{$d->id }}</td>
                          <td>{{$d->name }}</td>
                          <td>{{$d->crm }}</td>
                          <td>{{$d->speciality}}</td>
                          <td>{{$d->created_at}}</td>
                          <td >                                                                         

                            <a href="{{ route('doctor.create', $d->id) }}" class="btn btn-xs btn-default"><i class="fas fa-edit cp" title="Editar Médico"></i></a>

                            <a  doctor_id="{{$d->id}}" style="color:red;"  class="btn btn-xs btn-default btn_remover"><i class="fas fa-times cp" title="Remover Médico"></i></a>  


                          </td>                          
                                           
                        </tr>

                        @endforeach                     

                    </tbody>
                  </table>
                  <br>


                    <form id="form_remover" role="form" method="POST" action="{{ route('doctor.delete') }}" enctype="multipart/form-data" > @csrf<input id="id_doctor" name="id" type="hidden" /> </form>

                 @else
                  <div class="alert alert-info alert-dismissible">
                    <h5><i class="icon fas fa-info"></i> Não existem médicos cadastrados!</h5>
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
               var id = $(this).attr('doctor_id');
               $("#id_doctor").val(id);
              
                Swal.fire({
                  title: 'Atenção!',
                  text: "Tem certeza que deseja remover o médico?",
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
