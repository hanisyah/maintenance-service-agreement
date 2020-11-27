<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Maintenance Service Agreement</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="shortcut icon" href="{{{ asset('/inka2.png') }}}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('material/css/bootstrap.min.css')}}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('material/css/font-awesome.min.css')}}">
    <!-- adminpro icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('material/css/adminpro-custon-icon.css')}}">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('material/css/meanmenu.min.css')}}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('material/css/jquery.mCustomScrollbar.min.css')}}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('material/css/animate.css')}}">
     <!-- modals CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('material/css/modals.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('material/css/data-table/bootstrap-table.css')}}">
    <link rel="stylesheet" href="{{url('material/css/data-table/bootstrap-editable.css')}}">
        <!-- charts CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('material/css/c3.min.css')}}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('material/style.css')}}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('material/css/responsive.css')}}">
    <!-- datapicker CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('material/css/datapicker/datepicker3.css')}}">
    <!-- select2 CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('material/css/select2/select2.min.css')}}">
    <!-- colorpicker CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('material/css/colorpicker/colorpicker.css')}}">
    <!-- charts CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('material/css/charts.css')}}">
    <!-- chosen CSS
		============================================ -->
    <link rel="stylesheet" href="{{url('material/css/chosen/bootstrap-chosen.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <style type="text/css"> 
        .dropdown:hover > .dropdown-menu, .dropright:hover > .dropdown-menu {
            display: block;
        }
        .box{
            border-bottom-width: 2px;
            border-bottom-style: solid;
            border-bottom-color: #e6212a;
            top: 0;
            position: fixed;
            width: 100%;
            z-index: 1;
        }
        .box1{
            border-right-width: 1px;
            border-right-style: solid;
            padding:10px;
        }
        main {
          margin-top:60px;
        }
         
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div id="app" class="wrapper">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm box">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    
                
                
                    <nav class=" navbar-white navbar-light">
                        @include('layouts/main-header')
                    </nav>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto float-right">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                          
                        @else
                            <li class="nav-item dropdown">
                            
                                <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
                               
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        @include('layouts/footer')
    </div>


    <!-- jquery
		============================================ -->
    <script src="{{url('material/js/vendor/jquery-1.11.3.min.js')}}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{url('material/js/bootstrap.min.js')}}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{url('material/js/jquery.meanmenu.js')}}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{url('material/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <!-- sticky JS
		============================================ -->
    <script src="{{url('material/js/jquery.sticky.js')}}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{url('material/js/jquery.scrollUp.min.js')}}"></script>
    <!-- counterup JS
		============================================ -->
    <script src="{{url('material/js/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{url('material/js/counterup/waypoints.min.js')}}"></script>
    <!-- peity JS
		============================================ -->
    <script src="{{url('material/js/peity/jquery.peity.min.js')}}"></script>
    <script src="{{url('material/js/peity/peity-active.js')}}"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="{{url('material/js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{url('material/js/sparkline/sparkline-active.js')}}"></script>
     <!-- data table JS
		============================================ -->
    <script src="{{url('material/js/data-table/bootstrap-table.js')}}"></script>
    <script src="{{url('material/js/data-table/tableExport.js')}}"></script>
    <script src="{{url('material/js/data-table/data-table-active.js')}}"></script>
    <script src="{{url('material/js/data-table/bootstrap-table-editable.js')}}"></script>
    <script src="{{url('material/js/data-table/bootstrap-editable.js')}}"></script>
    <script src="{{url('material/js/data-table/bootstrap-table-resizable.js')}}"></script>
    <script src="{{url('material/js/data-table/colResizable-1.5.source.js')}}"></script>
    <script src="{{url('material/js/data-table/bootstrap-table-export.js')}}"></script>
    <script src="{{url('material/js/datapicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{url('material/js/datapicker/datepicker-active.js')}}"></script>
    <!-- select2 JS
		============================================ -->
    <script src="{{url('material/js/select2/select2.full.min.js')}}"></script>
    <script src="{{url('material/js/select2/select2-active.js')}}"></script>
    <!-- colorpicker JS
		============================================ -->
    <script src="{{url('material/js/colorpicker/jquery.spectrum.min.js')}}"></script>
    <script src="{{url('material/js/colorpicker/color-picker-active.js')}}"></script>
     <!-- Charts JS
		============================================ -->
    <script src="{{url('js/charts/Chart.js')}}"></script>
    <script src="{{url('js/charts/bar-chart.js')}}"></script>

   <!-- chosen JS
		============================================ -->
    <script src="{{url('material/js/chosen/chosen.jquery.js')}}"></script>
    <script src="{{url('material/js/chosen/chosen-active.js')}}"></script>
   <!-- main JS
		============================================ -->
    <script src="{{url('material/js/main.js')}}"></script>

    <script type="text/javascript" src="{{ url('dist/js/jquery-2.1.0.js')}}"></script>
    <script type="text/javascript" src="{{ url('dist/js/jquery-ui-1.10.1.custom.min.js')}}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts') -->
    <script>
        
        function reloadpage() {
          location.reload()
        }
      
        $(document).ready(function(){
            $("#form-with").css("display","none"); //Menghilangkan form-input ketika pertama kali dijalankan
            $(".pilComponent").click(function(){ //Memberikan even ketika class detail di klik (class detail ialah class radio button)
            if ($("input[name='type']:checked").val() == "consumable" ) { //Jika radio button "consumable" dipilih maka tampilkan form-inputan
                $("#form-with").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
            } else {
                $("#form-with").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
            }
            });
        });

        $(document).ready(function(){
            $("#form-normal").css("display","none"); //Menghilangkan form-input ketika pertama kali dijalankan
            $(".pilComponent").click(function(){ //Memberikan even ketika class detail di klik (class detail ialah class radio button)
            if ($("input[name='type']:checked").val() == "component" ) { //Jika radio button "berbeda" dipilih maka tampilkan form-inputan
                $("#form-normal").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
            } else {
                $("#form-normal").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
            }
            });
        });

        $(document).ready(function(){
            $("#form-normal").css("display","none"); //Menghilangkan form-input ketika pertama kali dijalankan
            $(".pilihan").click(function(){ //Memberikan even ketika class detail di klik (class detail ialah class radio button)
            if ($("input[name='with']:checked").val() == "yes" ) { //Jika radio button "berbeda" dipilih maka tampilkan form-inputan
                $("#form-normal").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
            } else {
                $("#form-normal").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
            }
            });
        });
        $(document).ready(function(){
            $("#form-maintenance").css("display","none"); //Menghilangkan form-input ketika pertama kali dijalankan
            $(".pilSchedule").click(function(){ //Memberikan even ketika class detail di klik (class detail ialah class radio button)
            if ($("input[name='tipe']:checked").val() == "Schedule" ) { //Jika radio button "Schedule" dipilih maka tampilkan form-inputan
                $("#form-maintenance").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
            } else {
                $("#form-maintenance").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
            }
            });
        });

        $('.addtrainset').on('click', function(){
          addtrainset();
        });
        function addtrainset(){
          var tr='<tr>'+'@php $i = 1 @endphp<td>{{$i++}}</td>'+'<td><input type="text" class="form-control" id="carNumber" name="carNumber" placeholder="Car Number..."></td>'+'<td><input type="text" class="form-control" id="carName" name="carName" placeholder="Car Name..."></td>'+'<td><a href="#" class="remove btn btn-danger waves-effect waves-light"><i class="fa fa-remove"></i> </a></td>'+'</tr>';
          $('.trainset').append(tr);
        };
        $('.remove').live('click', function(){
          $(this).parent().parent().remove();
        });

       
        // $(document).ready(function(){
        //   $(document).on('click','#detail',function(){
        //     var username = $(this).data('username');
        //     var password = $(this).data('password');
        //     var keterangan = $(this).data('keterangan');
        //     var name = $(this).data('name');
        //     var status = $(this).data('status');
        //     $('#username').text(username);
        //     $('#password').text(password);
        //     $('#keterangan').text(keterangan);
        //     $('#name').text(name);
        //     $('#status').text(status);
        //   });
        // });

        

    </script>

</body>
</html>
