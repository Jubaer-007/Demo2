
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Catering</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('/assets/img/favicon.png')}}" rel="icon">
  <link href="{{url('/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{url('/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{url('/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{url('/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{url('/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{url('/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{url('/assets/css/style.css')}}" rel="stylesheet">

  <!-- toastr -->
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

<!-- fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


<!-- dropdown -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
   

<body>

  <!-- ======= Header ======= -->

  @include('backend.layouts.fixed.header')
  
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
 
  @include('backend.layouts.fixed.sidebar')
 
 
 
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

   

@yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  
  @include('backend.layouts.fixed.footer')
 
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{url('/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{url('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{url('/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{url('/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{url('/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{url('/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{url('/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{url('/assets/js/main.js')}}"></script>



  <!-- toastr  -->
  <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}

        
        @stack('js')
</body>

</html>