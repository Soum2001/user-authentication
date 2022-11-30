@include('layouts.partials.head')

<body>
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="btn btn-primary" href="logout" id="logout_btn" name="logout_btn">Log Out</a>
                </li>
                <li class="nav-item" style="margin-left:2px">
                    <a href="edit" class="btn btn-primary" id="edit">Edit</a>
                </li>
            </ul>



        </nav>
        <!-- /.navbar -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                
                        <div class="col-sm-6">
                            <h1>Welcome {{$select_user->name}}</h1>
                        </div>
                      
                    </div>
                </div>
            </section>
        </div>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>

    <!-- ./wrapper -->

    @include('layouts.partials.footer')
    <script src="assets/cropper/cropper.min.js"></script>
    <script src="assets/js/profile_upload.js"></script>
</body>
</head>