<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="{{ asset('css/all.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/fullcalendar/fullcalendar.css') }}" rel="stylesheet">





</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a id="pushmenu" class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
                            
    </ul>
        
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>   
                        
      </ul>



  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link" style="text-align: center;">

      <span class="brand-text font-weight-light">CONSULTORIO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('appointment.index') }}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Agenda

              </p>
            </a>
          </li>
                  
          <li class="nav-item has-treeview">
            <a  class="nav-link">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Cadastros
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('patient.index') }}" class="nav-link"> 
                <i class="nav-icon fas fa-user"></i>                 
                  <p>Pacientes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('doctor.index') }}" class="nav-link">                  
                  <i class="nav-icon fas fa-user-md"></i>                 
                  <p>Médicos</p>
                </a>
              </li>


            </ul>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <main class="content-wrapper">
    @yield('content')
  </main>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; <script>document.write(new Date().getFullYear());</script> </strong> Todos os direitos reservados | Consultorio
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> {{ config('app.version') }}

    </div>
  </footer>
 

</div>
<!-- ./wrapper -->

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('vendor/fullcalendar/fullcalendar.js') }}"></script>
<script src="{{ asset('vendor/fullcalendar/pt-br.js') }}"></script>


@yield('js')

<script>
        $(document).ready(function() {


          $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
          
          $('.table-datatable').dataTable( {
              "language": {
                  "url": "{{ asset('vendor/datatable/Portuguese-Brasil.json') }}"
              }
          } );   

          
          var valor = "{{ session()->get('open') }}";
          var url = "{{ route('home.open_menu') }}";
          
          if(valor==1){            
            $('body').addClass('sidebar-mini layout-fixed'); 
          }else{
            
            $('body').addClass('sidebar-mini layout-fixed sidebar-collapse');                       
          }


          $( "#pushmenu" ).on( "click", function() {
                
                var open = $('body').hasClass('sidebar-collapse');

                 $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                 
                 $.ajax({
                    url: url,
                    method: 'post',
                    data: {open: (open ? 1 : 0)},
                    success: function(result){
                    
                      
                    }});

                 
                  
          });     


        });
</script>


</body>
</html>
