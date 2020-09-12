<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>

    <link media="all" rel="stylesheet" href="{{url('/assets/manager/css/font-face.css')}}">
    <link rel="stylesheet" href="{{url('/assets/manager/vendor/font-awesome-4.7/css/font-awesome.min.css')}}"
        media="all">
    <link rel="stylesheet" href="{{url('/assets/manager/or/font-awesome-5/css/fontawesome-all.min.css')}}" media="all">
    <link rel="stylesheet" href="{{url('/assets/manager/vendor/mdi-font/css/material-design-iconic-font.min.css')}}"
        media="all">

    <link rel="stylesheet" href="{{url('assets/manager/vendor/bootstrap-4.1/bootstrap.min.css')}}" media="all">

    <link rel="stylesheet" href="{{url('assets/manager/vendor/animsition/animsition.min.css')}}" media="all">
    <link rel="stylesheet"
        href="{{url('assets/manager/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" media="all">
    <link rel="stylesheet" href="{{url('assets/manager/vendor/wow/animate.css')}}" media="all">
    <link rel="stylesheet" href="{{url('assets/manager/vendor/css-hamburgers/hamburgers.min.css')}}" media="all">
    <link rel="stylesheet" href="{{url('assets/manager/vendor/slick/slick.css')}}" media="all">
    <link rel="stylesheet" href="{{url('assets/manager/vendor/select2/select2.min.css')}}" media="all">
    <link rel="stylesheet" href="{{url('assets/manager/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" media="all">
    <link rel="stylesheet" href="{{url('assets/manager/vendor/vector-map/jqvmap.min.css')}}" media="all">

    <link rel="stylesheet" href="{{url('assets/manager/css/theme.css')}}" media="all">
</head>


<body class="animsition">
    <div class="page-wrapper">
        {{-- menu sidebar --}}
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    MANAGER
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="{{url('/assets/foto/images.jpeg')}}" alt="admin">
                    </div>
                    <h4 class="name">
                        {{session('s_nama_user')}}
                    </h4>
                    <a href="{{url('/sign-out')}}">Sign Out</a>
                </div>
            </div>
        </aside>
        {{-- end menu --}}

        {{-- page container --}}
        <div class="page-container2">
            <section class="statistic">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number">{{$member_t -> t_user}}</h2>
                                    <span class="desc">members total</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                <h2 class="number">{{ $quality_t -> qt }}</h2>
                                    <span class="desc">item sold</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number">{{ $quality_w -> qw}}</h2>
                                    <span class="desc">this week</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number">Rp. {{$earning_t -> total}}</h2>
                                    <span class="desc">total earning</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-money"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="au-card m-b-30">
                                <div class="au-card-inner">
                                    <h3 class="title-2">recent reports</h3>
                                    <div class="recent-report__chart">
                                        <canvas id="chart"></canvas>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="au-card chart-percent-card">
                                <div class="au-card-inner">
                                    <h3 class="title-2 tm-b-5">category by %</h3>
                                    <div class="row-no-gutters">
                                        <div class="col-xl-4">
                                            <div class="chart-note-wrap">
                                                <div class="chart-note mr-0 d-block">
                                                    <span class="dot dot--blue"></span>
                                                    <span>makanan</span>
                                                </div>
                                                <div class="chart-note mr-0 d-block">
                                                    <span class="dot dot--red"></span>
                                                    <span>minuman</span>
                                                </div>
                                                <div class="chart-note mr-0 d-block">
                                                    <span class="dot dot--green"></span>
                                                    <span>kaos</span>
                                                </div>
                                                <div class="chart-note mr-0 d-block">
                                                    <span class="dot dot--yellow"></span>
                                                    <span>celana</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-8">
                                            <div class="percent-chart">
                                                <canvas id="percent"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="title-1 m-b-25">Earnings By Items</h2>
                            <div class="table-responsive table--no-card m-b-40">
                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                        <tr>
                                                <th>date</th>
                                                <th>order ID</th>
                                                <th>Produk Name</th>
                                                <th class="text-right">price</th>
                                                <th class="text-right">quantity</th>
                                                <th class="text-right">total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forEach($all as $a)
                                        <tr>
                                        <td>{{$a->date}}</td>
                                        <td>{{$a->notaId}}</td>
                                        <td>{{$a->produkName}}</td>
                                        <td class="text-right">Rp. {{$a->price}}</td>
                                        <td class="text-right">{{$a->quantity}}</td>
                                        <td class="text-right">Rp. {{$a->total}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


    <script src="{{url('/assets/manager/vendor/jquery-3.2.1.min.js')}}"></script>

    <script src="{{url('/assets/manager/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{url('/assets/manager/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>

    <script src="{{url('/assets/manager/vendor/slick/slick.min.js')}}"></script>
    <script src="{{url('/assets/manager/vendor/wow/wow.min.js')}}"></script>
    <script src="{{url('/assets/manager/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{url('/assets/manager/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>

    <script src="{{url('/assets/manager/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{url('/assets/manager/vendor/counter-up/jquery.counterup.min.js')}}"></script>

    <script src="{{url('/assets/manager/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{url('/assets/manager/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{url('/assets/manager/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{url('/assets/manager/vendor/select2/select2.min.js')}}"></script>

    <script src="{{url('/assets/manager/vendor/vector-map/jquery.vmap.js')}}"></script>
    <script src="{{url('/assets/manager/vendor/vector-map/jquery.vmap.min.js')}}"></script>
    <script src="{{url('/assets/manager/vendor/vector-map/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{url('/assets/manager/vendor/vector-map/jquery.vmap.world.js')}}"></script>

    <script src="{{url('/assets/manager/js/main.js')}}"></script>


    <script>

        var url = "{{url('manager/chart')}}";
        var Bulan = new Array();
        var Labels = new Array();
        var Prices = new Array();
        $(document).ready(function () {
            $.get(url, function (response) {
                response.forEach(function (data) {
                    Bulan.push(data.namabulan);
                    Labels.push(data.namabulan);
                    Prices.push(data.total);
                });
                var ctx = document.getElementById("chart");
                ctx.height = 250;
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: Bulan,
                        datasets: [{
                            label: 'total terjual ',
                            backgroundColor: '#ccc',
                            borderColor: 'rgba(0, 123, 255, 0.5)',
                            borderWidth: 0,
                            data: Prices,
                            fontFamily: "Poppins"
                        }]
                    },
                    options: {
                            legend: {
                                position: 'top',
                                labels: {
                                    fontFamily: 'Poppins'
                                }

                            },
                            scales: {
                                xAxes: [{
                                    ticks: {
                                        fontFamily: "Poppins"

                                    }
                                }],
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        fontFamily: "Poppins"
                                    }
                                }]
                            }
                    }
                });
            });
        });

        var url2 = "{{url('manager/percent')}}";
        var Percent = new Array()
        var Categories = new Array()
        $(document).ready(function () {
            $.get(url2, function(response) {
                response.forEach(function (data) {
                    Percent.push(data.kategori);
                    Categories.push(data.total);
                })

                var ctx2 = document.getElementById("percent");
                ctx2.height = 250;
                var myPercent = new Chart(ctx2, {
                    type: 'doughnut',
                    data: {
                        datasets: [
                            {
                                label: 'data kategori',
                                data: Percent,
                                backgroundColor: [
                                        '#00b5e9',
                                        '#fa4251',
                                        '#00ad5f',
                                        '#faee42'
                                ],
                                hoverBackgroundColor: [
                                        '#00b5e9',
                                        '#fa4251',
                                        '#00ad5f',
                                        '#faee42'
                                    ],
                                    borderWidth: [
                                        0, 0, 0, 0
                                    ],
                                    hoverBorderColor: [
                                        'transparent',
                                        'transparent',
                                        'transparent',
                                        'transparent'
                                    ]
                            }
                        ],
                        labels: [ 'makanan', 'minuman', 'kaos', 'celanan' ]
                    },
                    options: {
                        maintainAspectRatio: false,
                        responsive: true,
                        cutoutPercentage: 55,
                        animation: {
                            animateScale: true,
                            animateRotate: true
                        },
                        legend: {
                            display: false
                        },
                        tooltips: {
                            titleFontFamily: "Poppins",
                            xPadding: 15,
                            yPadding: 10,
                            caretPadding: 0,
                            bodyFontSize: 16
                        }
                    }
                })
            })
        });
    </script>
</body>

</html>
