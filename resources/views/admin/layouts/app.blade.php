<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}




<head>

				<title>SG-Hekima</title>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">

				<!-- Main CSS-->
				<link rel="stylesheet" type="text/css" href="{{ asset('assets2/css/admin.css') }}">
				<link rel="stylesheet" type="text/css" href="{{ asset('assets2/css/cardpayments.css') }}">

				<!-- Font-icon css-->
				<link rel="stylesheet" type="text/css"
								href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/dropzone.js') }}"></script>
</head>

<body class="app sidebar-mini">
				<!-- Navbar-->
				<header class="app-header">
								<a class="app-header__logo" href="/home">SG-Hekima</a>
								<!-- Sidebar toggle button-->
								<a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
								<!-- Navbar Right Menu-->
								<ul class="app-nav ">
												<li class="app-search">
																<input class="app-search__input" type="search" placeholder="Search">
																<button class="app-search__button"><i class="fa fa-search"></i></button>
												</li>
												<!--Notification Menu-->
												<li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"
																				aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
																<ul class="app-notification dropdown-menu dropdown-menu-right">
																				<li class="app-notification__title">You have 4 new notifications.</li>
																				<div class="app-notification__content">
																								<li><a class="app-notification__item" href="javascript:;"><span
																																				class="app-notification__icon"><span class="fa-stack fa-lg"><i
																																												class="fa fa-circle fa-stack-2x text-primary"></i><i
																																												class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
																																<div>
																																				<p class="app-notification__message">Lisa sent you a mail</p>
																																				<p class="app-notification__meta">2 min ago</p>
																																</div>
																												</a></li>
																								<li><a class="app-notification__item" href="javascript:;"><span
																																				class="app-notification__icon"><span class="fa-stack fa-lg"><i
																																												class="fa fa-circle fa-stack-2x text-danger"></i><i
																																												class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
																																<div>
																																				<p class="app-notification__message">Mail server not working</p>
																																				<p class="app-notification__meta">5 min ago</p>
																																</div>
																												</a></li>
																								<li><a class="app-notification__item" href="javascript:;"><span
																																				class="app-notification__icon"><span class="fa-stack fa-lg"><i
																																												class="fa fa-circle fa-stack-2x text-success"></i><i
																																												class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
																																<div>
																																				<p class="app-notification__message">Transaction complete</p>
																																				<p class="app-notification__meta">2 days ago</p>
																																</div>
																												</a></li>
																								<div class="app-notification__content">
																												<li><a class="app-notification__item" href="javascript:;"><span
																																								class="app-notification__icon"><span class="fa-stack fa-lg"><i
																																																class="fa fa-circle fa-stack-2x text-primary"></i><i
																																																class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
																																				<div>
																																								<p class="app-notification__message">Lisa sent you a mail</p>
																																								<p class="app-notification__meta">2 min ago</p>
																																				</div>
																																</a></li>
																												<li><a class="app-notification__item" href="javascript:;"><span
																																								class="app-notification__icon"><span class="fa-stack fa-lg"><i
																																																class="fa fa-circle fa-stack-2x text-danger"></i><i
																																																class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
																																				<div>
																																								<p class="app-notification__message">Mail server not working</p>
																																								<p class="app-notification__meta">5 min ago</p>
																																				</div>
																																</a></li>
																												<li><a class="app-notification__item" href="javascript:;"><span
																																								class="app-notification__icon"><span class="fa-stack fa-lg"><i
																																																class="fa fa-circle fa-stack-2x text-success"></i><i
																																																class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
																																				<div>
																																								<p class="app-notification__message">Transaction complete</p>
																																								<p class="app-notification__meta">2 days ago</p>
																																				</div>
																																</a></li>
																								</div>
																				</div>
																				<li class="app-notification__footer"><a href="#">See all notifications.</a></li>
																</ul>
												</li>
												<!-- User Menu-->
												<li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"
																				aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
																<ul class="dropdown-menu settings-menu dropdown-menu-right">
																				<li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a>
																				</li>
																				<li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a>
																				</li>
																				<li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
																														document.getElementById('logout-form').submit();"><i
																																class="fa fa-sign-out fa-lg"></i>{{ __('Logout') }}</a>
																								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
																												@csrf
																								</form>
																				</li>

																</ul>
												</li>
								</ul>
				</header>
				<!-- Sidebar menu-->
				<div class="app-sidebar__overlay " data-toggle="sidebar"></div>
				<aside class="app-sidebar">

								<div class="app-sidebar__user"><img class="app-sidebar__user-avatar d-flex w-25"
																src="/storage/RetailPictures/{{ $data['retailimage']->retailPicture ?? 'noprofile.png' }}"
																alt="User Image">
												<div>
																<p class="app-sidebar__user-name">
																				{{ (auth()->user()->username ?? 'guest') }}</p>




																@if (auth()->user()->isAdmin)
																				<p class="app-sidebar__user-designation">Admin</p>
																@else
																				@if (Auth::user()->isAdmin)
																								<p class="app-sidebar__user-designation">Employee</p>
																				@else
																								<p class="app-sidebar__user-designation">Guest</p>
																				@endif

																@endif

												</div>
								</div>
								<ul class="app-menu ">
												<li><a class="app-menu__item active " href="/home"><i class="app-menu__icon fa fa-dashboard"></i><span
																								class="app-menu__label">Dashboard</span></a>
												</li>

												<li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Articles</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu">
																				<li><a class="treeview-item " href="/admin/articles/index"><i class="icon fa fa-circle-o"></i>All Articles
																												</a></li>
																				<li><a class="treeview-item " href="/admin/articles/pending/index"><i class="icon fa fa-circle-o"></i>Pending
																												Articles</a></li>

																</ul>
												</li>

												<li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Articles Cartegory</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu">
																				<li><a class="treeview-item " href="/admin/articles/category/index"><i class="icon fa fa-circle-o"></i>Existing Categories
																												</a></li>
																				<li><a class="treeview-item " href="/admin/articles/category/create"><i class="icon fa fa-circle-o"></i>Add a
                                                                                    Category</a></li>

																</ul>
												</li>
                                                <li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
                                                    class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Article Writers</span><i
                                                    class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                                    <li><a class="treeview-item " href="/admin/account/users/index"><i class="icon fa fa-circle-o"></i> Published Writers
                                                                    </a></li>
                                    <li><a class="treeview-item " href="/admin/account/suspend/index"><i class="icon fa fa-circle-o"></i>Suspended</a></li>

                    </ul>
    </li>
												<li><a class="app-menu__item" href="/settigs/index"><i class="app-menu__icon fa fa-file-code-o"></i><span
																								class="app-menu__label">Settings</span></a>
												</li>


								</ul>
				</aside>
				<main class="app-content bg-white">
								@yield('content')
				</main>
				<script type="text/javascript">
				    function submitform() {
				        var btn = document.getElementById("sales_date_btn");
				        if (btn.innerText === "Red") {
				            btn.innerText = "Blue";
				        } else {
				            btn.innerText = "Red";
				        }
				        document.getElementById("sales_date_form").action = "/sales-by-date/1";
				        document.getElementById("sales_date_form").submit();

				    }

				    function submitretailform(id) {

				        document.getElementById("retailform").action = "/sales/sales-by-retail/" + id;
				        document.getElementById("retailform").submit();

				    }
				</script>


				<!-- Essential javascripts for application to work-->
				<script src="{{ asset('assets2/js/jquery-3.3.1.min.js') }}"></script>
				<script src="{{ asset('assets2/js/popper.min.js') }}"></script>
				<script src="{{ asset('assets2/js/bootstrap.min.js') }}"></script>
				<script src="{{ asset('assets2/js/main.js') }}"></script>
				<!-- The javascript plugin to display page loading on top-->
				<script src="{{ asset('assets2/js/plugins/pace.min.js') }}"></script>
				<!-- Page specific javascripts-->
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/chart.js') }}"></script>
				<script type="text/javascript">
				    var data = {
				        labels: @json($data['usersData']['months']),
				        datasets: [{
				                label: "My First dataset",
				                fillColor: "rgba(220,220,220,0.2)",
				                strokeColor: "rgba(220,220,220,1)",
				                pointColor: "rgba(220,220,220,1)",
				                pointStrokeColor: "#fff",
				                pointHighlightFill: "#fff",
				                pointHighlightStroke: "rgba(220,220,220,1)",
				                data: @json($data['usersData']['users'])


				            },
				            {
				                label: "My Second dataset",
				                fillColor: "rgba(151,187,205,0.2)",
				                strokeColor: "rgba(151,187,205,1)",
				                pointColor: "rgba(151,187,205,1)",
				                pointStrokeColor: "#fff",
				                pointHighlightFill: "#fff",
				                pointHighlightStroke: "rgba(151,187,205,1)",
				                data: @json($data['usersData']['months'])
				            }
				        ]
				    };



				    var ctxl = $("#usersLineChart").get(0).getContext("2d");
				    var lineChart = new Chart(ctxl).Line(data);


                    var usersPdata =  @json($data['userspdata']);

				    var data = [{
				            value: 40,
				            color: "#ff0000",
				            highlight: "#5AD3D1",
				            label: "Complete"
				        },
				        {
				            value: 60,
				            color: "#7a97cc",
				            highlight: "#000000",
				            label: "In-Progress"
				        }
				    ]

				    var creditPdata = [{
				            value: 40,
				            color: "#ff0000",
				            highlight: "#5AD3D1",
				            label: "Complete"
				        },
				        {
				            value: 60,
				            color: "#7a97cc",
				            highlight: "#000000",
				            label: "In-Progress"
				        }
				    ]



				    var ctxp = $("#usersPieChart").get(0).getContext("2d");
				    var pieChart = new Chart(ctxp).Pie(usersPdata);


				    // var ctxp = $("#revenuePieChart").get(0).getContext("2d");
				    // var pieChart = new Chart(ctxp).Pie(revenuePdata);
				</script>




				<script type="text/javascript" src="{{ asset('assets2/js/plugins/bootstrap-datepicker.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/dropzone.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/select2.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/bootstrap-datepicker.min.js') }}"></script>


				<script type="text/javascript">
				    $('#sl').on('click', function() {
				        $('#tl').loadingBtn();
				        $('#tb').loadingBtn({
				            text: "Signing In"
				        });
				    });

				    $('#el').on('click', function() {
				        $('#tl').loadingBtnComplete();
				        $('#tb').loadingBtnComplete({
				            html: "Sign In"
				        });
				    });


				    $('#multipleSelectForm').select2();
				</script>

				{{-- date picker --}}
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/jquery.dataTables.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/dataTables.bootstrap.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/bootstrap-datepicker.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/select2.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/bootstrap-datepicker.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/dropzone.js') }}"></script>
				<script type="text/javascript">
				    $('#sl').on('click', function() {
				        $('#tl').loadingBtn();
				        $('#tb').loadingBtn({
				            text: "Signing In"
				        });
				    });

				    $('#el').on('click', function() {
				        $('#tl').loadingBtnComplete();
				        $('#tb').loadingBtnComplete({
				            html: "Sign In"
				        });
				    });

				    $('#startDate').datepicker({
				        format: "yyyy-mm-dd",
				        autoclose: true,
				        todayHighlight: true
				    });
				    $('#endDate').datepicker({
				        format: "yyyy-mm-dd",
				        autoclose: true,
				        todayHighlight: true
				    });

				    $('#demoSelect').select2();
				</script>
				<script type="text/javascript">
				    $('#sampleTable').DataTable();
				</script>


</body>

</html>
