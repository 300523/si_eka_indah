<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>{{ $title }}</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('') }}library/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('') }}library/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="{{ asset('') }}library/summernote/dist/summernote-bs4.min.css">
  <link rel="stylesheet" href="{{ asset('') }}library/owl.carousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="{{ asset('') }}library/owl.carousel/dist/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="{{ asset('') }}library/flag-icon-css/css/flag-icon.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('') }}css/style.css">
  <link rel="stylesheet" href="{{ asset('') }}css/components.css">

  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- END GA -->
</head>
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <!-- Header -->
      @include('backend.layouts.header')

      <!-- Sidebar -->
      @include('backend.layouts.sidebar')

      <!-- Content -->
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          @yield('content')
        </section>
      </div>

      <!-- Footer -->
      @include('backend.layouts.footer')
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('library/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('library/popper.js/dist/umd/popper.js') }}"></script>
  <script src="{{ asset('library/tooltip.js/dist/umd/tooltip.js') }}"></script>
  <script src="{{ asset('library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('library/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('library/moment/min/moment.min.js') }}"></script>
  <script src="{{ asset('js/stisla.js') }}"></script>

  <!-- JS Libraies -->
  <script src="{{ asset('library/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
  <script src="{{ asset('library/chart.js/dist/Chart.js') }}"></script>
  <script src="{{ asset('library/owl.carousel/dist/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
  <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('js/page/index.js') }}"></script>

  <!-- Template JS File -->
  <script src="{{ asset('js/scripts.js') }}"></script>
  <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>