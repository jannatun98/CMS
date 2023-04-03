<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>CMS</title>
        <link href="{{url('/backend/css/backendcritypesview.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{url('backend/css/styles.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

        <style>
            #toast-container{
                margin-top: 45px !important
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
       @include('backend.fixed.header')

        <div id="layoutSidenav">
        @include('backend.fixed.Sidebar')


            
            <div id="layoutSidenav_content">
                <main>

                    @yield('content')
                   
                </main>
               
            </div>
            
        </div>
        @include('backend.fixed.footer')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{url('backend/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{url('backend/assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{url('backend/assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{url('js/datatables-simple-demo.js')}}"></script>
    </body>
</html>
