<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Employee ! | Edit Supplier </title>

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
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{url('/signout')}}">
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
                  <h3>Edit Supplier</h3>
                </div>
                  <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                      <div class="x_content">
                        <br />

                        <form action="{{url('/employee/supplier/edit/post')}}" method="post">
						  {{ csrf_field() }}
                    		<div class="field item form-group">
                      			<label class="col-form-label col-md-3 col-sm-3  label-align">ID </label>
                      			<div class="col-md-6 col-sm-6">
                        			<input class="form-control" type="hidden" name="id_supplier" value="{{ $id_supplier->id_supplier }}"/>
                      			</div>
                    		</div>
							          <div class="field item form-group">
                      			<label class="col-form-label col-md-3 col-sm-3  label-align">Nama </label>
                      			<div class="col-md-6 col-sm-6">
                        			<input class="form-control" type="text" name="nama_supplier" required="required" value="{{ $id_supplier->nama_supplier }}"/>
                      			</div>
                    		</div>
							          <div class="field item form-group">
                      			<label class="col-form-label col-md-3 col-sm-3  label-align">Email </label>
                      			<div class="col-md-6 col-sm-6">
                        			<input class="form-control" type="text" name="email_supplier" required="required" value="{{ $id_supplier->email_supplier }}"/>
                      			</div>
                    		</div>
							          <div class="field item form-group">
                      			<label class="col-form-label col-md-3 col-sm-3  label-align">No Telepon</label>
                      			<div class="col-md-6 col-sm-6">
                        			<input class="form-control" type="text" name="no_supplier" required="required" value="{{ $id_supplier->no_supplier }}"/>
                      			</div>
                    		</div>
                        <div class="field item form-group">
                      			<label class="col-form-label col-md-3 col-sm-3  label-align">Kecamatan </label>
                      			<div class="col-md-6 col-sm-6">
                        			<input class="form-control" type="text" name="kecamatan_supplier" required="required" value="{{ $id_supplier->kecamatan_supplier }}"/>
                      			</div>
                    		</div>
                        <div class="field item form-group">
                      			<label class="col-form-label col-md-3 col-sm-3  label-align">Kabupaten/Kota</label>
                      			<div class="col-md-6 col-sm-6">
                        			<input class="form-control" type="text" name="kota_supplier" required="required" value="{{ $id_supplier->kota_supplier }}"/>
                      			</div>
                    		</div>
                        <div class="field item form-group">
                      			<label class="col-form-label col-md-3 col-sm-3  label-align">Provinsi </label>
                      			<div class="col-md-6 col-sm-6">
                        			<input class="form-control" type="text" name="provinsi_supplier" required="required" value="{{ $id_supplier->provinsi_supplier }}"/>
                      			</div>
                    		</div>
                        <div class="field item form-group">
                      			<label class="col-form-label col-md-3 col-sm-3  label-align">Kode Pos</label>
                      			<div class="col-md-6 col-sm-6">
                        			<input class="form-control" type="text" name="kodepos_supplier" required="required" value="{{ $id_supplier->kodepos_supplier }}"/>
                      			</div>
                    		</div>
							          <div class="field item form-group">
                      			<label class="col-form-label col-md-3 col-sm-3  label-align">Alamat Lengkap</label>
                      			<div class="col-md-6 col-sm-6">
                        			<input class="form-control" type="text" name="alamat_supplier" required="required" value="{{ $id_supplier->alamat_supplier }}"/>
                      			</div>
                    		</div>
							          <div class="">
                      			<div class="form-group">
                        			<div class="col-md-6 offset-md-3">
                          				<button type="submit" class="btn btn-primary">Submit</button>
                        			</div>
                      			</div>
                    		</div>
						          </form>


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
