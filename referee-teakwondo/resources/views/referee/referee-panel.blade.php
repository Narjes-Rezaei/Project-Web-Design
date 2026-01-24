<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Corona Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="admin/assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


</head>

<body>

  @include('referee.alerts.notiff')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('referee.layouts.sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
      @include('referee.layouts.navbar')
      <!-- partial -->
      <div class="main-panel">
        @yield('content')
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('referee.layouts.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  @include('referee.layouts.scripts')
</body>


</html>