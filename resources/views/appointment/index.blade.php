@extends('layouts.app')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Agenda </h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
              @include('flash::message')                           
              <!-- /.card-header -->
              <div class="card-body">
  
                      <div  class="row col-md-12" >
                        <form id="form_cadastrar" role="form" class="col-md-12" method="POST" action="{{ route('appointment.store') }}" style="display: inline-flex;"  >
                            @csrf

                            <div class="form-group col-md-3" style="display: inline-block;">
                              <label>Médico:</label>
                              <select name="doctor_id"  id="doctor_id"  class="form-control" ></select>
                              @error('doctor_id')
                                  <div class="alert" style="padding: 0; color: red; font-weight: 600;">{{ $message }}</div>
                              @enderror                                         
                            </div> 

                            <div class="form-group col-md-3" style="display: inline-block;">
                              <label>Paciente:</label>
                              <select  class="form-control" name="patient_id"  id="patient_id"> </select>
                              @error('patient_id')
                                  <div class="alert" style="padding: 0; color: red; font-weight: 600;">{{ $message }}</div>
                              @enderror                                         
                            </div> 

                            <div class="form-group col-md-3" style="display: inline-block;">
                              <label>Data:</label>
                              <input type="datetime-local" class="form-control" name="date_appointment" placeholder="Data da consulta"  id="date_appointment" >
                              @error('date_appointment')
                                  <div class="alert" style="padding: 0; color: red; font-weight: 600;">{{ $message }}</div>
                              @enderror                                         
                            </div>                                                         
                           
                            <div class=" col-md-1" style="display: inline-block;" >
                                <button type="submit" class="btn btn-sm btn-success" style="margin-top: 35px;">Incluir</button> 
                            </div> 
                        </form>
                         
                     </div>

                    <hr>


                      <div  class="row col-md-12" >
                            <div class="form-group col-md-3" style="display: inline-block;">
                              <label>Filtrar Agenda:</label>
                              <select  id="doctor_id_agenda"  class="form-control" ></select>
                                           
                            </div> 
                      </div>
                      <div  class="row col-md-12" >
                        <div id="calendar"></div>
                      </div>
                         



              </div>

          
      </div>    
    </section>
@endsection


@section('js')


    <script> 

    $(document).ready(function() {
        
        /*INICIO*/
        $("#date_appointment").attr('min',formatDate()+"T00:00");
        
  
        /*EVENTOS*/
        $('#doctor_id,#doctor_id_agenda').select2({

            ajax: {
              url: "{{route('doctor.json')}}",
              type:"POST",
              dataType: 'json',
              delay: 250,
              data: function (params) {
                return {
                  q: params.term, // search term
                  page: params.page,
                  _token: $('meta[name="csrf-token"]').attr('content')
                };
              },
              processResults: function (data, params) {

                return {
                  results: data.items,

                };
              },
              cache: true
            },
            allowClear:true,
            templateResult: formatRecords,
            placeholder: "Pesquisar Médico...",
            minimumInputLength: 3,
            language: {
                 noResults: function(){
                     return "Nenhum Registro!"
                 },
                inputTooShort: function () {
                  return "Entre com 3 letras...";
                }, 
                searching: function () {
                  return "Pesquisando...";
                }                 
                              
           },
          });

        $('#patient_id').select2({

            ajax: {
              url: "{{route('patient.json')}}",
              type:"POST",
              dataType: 'json',
              delay: 250,
              data: function (params) {
                return {
                  q: params.term, // search term
                  page: params.page,
                  _token: $('meta[name="csrf-token"]').attr('content')
                };
              },
              processResults: function (data, params) {

                return {
                  results: data.items,

                };
              },
              cache: true
            },       
            allowClear:true,   
           templateResult: formatRecords,
           placeholder: "Pesquisar Paciente...",
           minimumInputLength: 3,
           language: {
                 noResults: function(){
                     return "Nenhum Registro!"
                 },
                inputTooShort: function () {
                  return "Entre com 3 letras...";
                }, 
                searching: function () {
                  return "Pesquisando...";
                }                 
                              
           },
          });    

        $('#doctor_id_agenda').on('change', function (e) {

            
             $.ajax({
                url: "{{ route('appointment.json') }}",
                method: 'POST',
                dataType: 'json',
                data: { _token: $('meta[name="csrf-token"]').attr('content') , doctor_id: $('#doctor_id_agenda').val()},               
                success: function(result){

                  calendar.setOption('events', result.items);  
                }});             


        });


        /*FULL CALENDAR*/
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
          headerToolbar: {
            left: 'prevYear,prev,next,nextYear today',
            center: 'title',
            right: 'dayGridMonth,dayGridWeek,dayGridDay'
          },          
          locale: 'pt-br',
          navLinks: true, 
          editable: true,
          dayMaxEvents: true
          
        });

        calendar.render();


        $('.fc-icon-chevrons-left, .fc-icon-chevrons-right, .fc-icon-chevron-left, .fc-icon-chevron-right, .fc-today-button, .fc-dayGridMonth-button, .fc-dayGridWeek-button, .fc-dayGridDay-button').on('click', function (e) {
            if($('#doctor_id_agenda').val()){
              $('#doctor_id_agenda').trigger('change');  
            }
            

        });



    });

    /*FUNCOES*/
    function formatRecords (repo) {
      
        return repo.text.toUpperCase();
      
    }   

    function formatDate() {
        var d = new Date(),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) 
            month = '0' + month;
        if (day.length < 2) 
            day = '0' + day;

        return [year, month, day].join('-');
    } 


  
     </script>


@stop



