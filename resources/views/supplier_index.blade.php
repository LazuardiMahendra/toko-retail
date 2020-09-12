<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Employee ! | Supplier </title>

    <!-- Bootstrap -->
    <link href="{{url('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('assets/admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{url('assets/admin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{url('assets/admin/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{url('assets/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{url('assets/admin/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{url('assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{url('assets/admin/build/css/custom.min.css')}}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-group"></i> <span>EMPLOYEE</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  <li><a href="{{url('/employee')}}"><i class="fa fa-home"></i> Dashboard </a>
                  </li>
                  <li><a href="{{url('/employee/produk')}}"><i class="fa fa-cubes"></i> Produk </a>
                  </li>
                  <li><a href="{{url('/employee/kategori')}}"><i class="fa fa-tags"></i> Kategori </a>
                  </li>
                  <li><a href="{{url('/employee/supplier')}}"><i class="fa fa-truck"></i> Supplier </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Logout"href="{{url('/signout')}}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">



        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
              <div class="page-title">
                <div class="title_left">
                  <h3>SUPPLIER</h3>
                </div>
              </div>
  
              <div class="clearfix"></div>
  
              <div class="row">
                <div class="col-md-12 col-sm-12 ">
                  <div class="x_panel">
                    <div class="x_title">

                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                              <div class="card-box table-responsive">
                      <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th><center>ID</th>
                            <th><center>Nama </th>
                            <th><center>Email </th>
                            <th><center>No Telepon</th>
                            <th><center>Kecamatan </th>
                            <th><center>Kabupaten/Kota</th>
                            <th><center>Provinsi </th>
                            <th><center>Kode Pos</th>
                            <th><center>Alamat Lengkap </th>
                            <th><center>Edit</th>
                            <th><center>Hapus</th>

                          </tr>
                        </thead>

  
                        <tbody>

                        @foreach($id_supplier as $s)
                                <tr>
                                    <td><center>{{ $s->id_supplier }}</td>
                                    <td><center>{{ $s->nama_supplier }}</td>
                                    <td><center>{{ $s->email_supplier }}</td>
                                    <td><center>{{ $s->no_supplier }}</td>
                                    <td><center>{{ $s->kecamatan_supplier }}</td>
                                    <td><center>{{ $s->kota_supplier }}</td>
                                    <td><center>{{ $s->provinsi_supplier }}</td>
                                    <td><center>{{ $s->kodepos_supplier }}</td>
                                    <td><center>{{ $s->alamat_supplier }}</span></td>
                                    <td><center><a href="{{url('/employee/supplier/edit/'.$s->id_supplier)}}" class="btn btn-warning"><i class="fa fa-edit"></a></td></center>
                                    <td><center><a href="{{url('/employee/supplier/delete/'.$s->id_supplier)}}" class="btn btn-danger"><i class="fa fa-trash"></a></td></center>
                                </tr>
						          @endforeach 
                        </tbody>
                        </table>
                        <a href="/employee/supplier/add/post" class="btn btn-info">+ Tambah Supplier</a>

                    </div>
                    </div>
                </div>
              </div>
                  </div>
                </div>
  

  

                  </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{url('assets/admin/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{url('assets/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{url('assets/admin/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{url('assets/admin/vendors/nprogress/nprogress.js')}}"></script>
    <!-- Chart.js -->
    <script src="{{url('assets/admin/vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <!-- gauge.js -->
    <script src="{{url('assets/admin/vendors/gauge.js/dist/gauge.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{url('assets/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{url('assets/admin/vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{url('assets/admin/vendors/skycons/skycons.js')}}"></script>
    <!-- Flot -->
    <script src="{{url('assets/admin/vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{url('assets/admin/vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{url('assets/admin/vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{url('assets/admin/vendors/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{url('assets/admin/vendors/Flot/jquery.flot.resize.js')}}"></script>
    <!-- Flot plugins -->
    <script src="{{url('assets/admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{url('assets/admin/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{url('assets/admin/vendors/flot.curvedlines/curvedLines.js')}}"></script>
    <!-- DateJS -->
    <script src="{{url('assets/admin/vendors/DateJS/build/date.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{url('assets/admin/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
    <script src="{{url('assets/admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{url('assets/admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{url('assets/admin/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{url('assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{url('assets/admin/build/js/custom.min.js')}}"></script>
	
  </body>
</html>
