<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>pharmacy management</title>

  <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/backend/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
  <link href="{{asset('assets/backend/css/sb-admin.css')}}" rel="stylesheet">

</head>

<body id="page-top">
  <div id="app">
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <router-link class="navbar-brand mr-1" to="home">Pharmacy management
      </router-link>
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{Auth::user()->name}}
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

          <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
          <div class="dropdown-divider"></div>
        </div>
      </li>
    </ul>
  </nav>
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <router-link class="nav-link" to="home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>pharmacy management</span>
        </router-link>
      </li>

      <li class="nav-item active">
        <router-link class="nav-link" to="dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </router-link>
      </li>
      <li class="nav-item">
        <router-link class="nav-link" to="pos">
          <i class="fas fa-fw fa-folder"></i>
          <span>POS</span></router-link>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Customer</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <router-link class="dropdown-item" to="allcustomer">All Customer
            </router-link>
            <router-link class="dropdown-item" to="addcustomer">Add Customer
            </router-link>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Employee</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <router-link class="dropdown-item" to="allemployee">All Employee
            </router-link>
            <router-link class="dropdown-item" to="addemployee">Add Employee
            </router-link>
            <a class="dropdown-item" href="login.html"></a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Supplier</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <router-link class="dropdown-item" to="addsupplier">Add Supplier
            </router-link>
            <router-link class="dropdown-item" to="allsupplier">All Supplier
            </router-link>
            <a class="dropdown-item" href="login.html"></a>
          </div>
        </li>



      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Category</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
         
          <router-link class="dropdown-item" to="addcategory">Add Category</router-link>
          <router-link class="dropdown-item" to="allcategory">All Category</router-link>
          <a class="dropdown-item" href="login.html"></a>

        </div>
      </li>


        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Brand</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
         
          <router-link class="dropdown-item" to="addbrand">Add Brand</router-link>
          <router-link class="dropdown-item" to="allbrand">All Brand</router-link>
          <a class="dropdown-item" href="login.html"></a>

        </div>
      </li>


 

        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>product</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
         
          <router-link class="dropdown-item" to="addproduct">Add product</router-link>
          <router-link class="dropdown-item" to="allproduct">All product</router-link>
          <a class="dropdown-item" href="login.html"></a>

        </div>
      </li>



        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Expense</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
           
            <router-link class="dropdown-item" to="addexpense">Add expense</router-link>
            <router-link class="dropdown-item" to="todayexpense">Today expense</router-link>

            <router-link class="dropdown-item" to="allexpense">All expense</router-link>
            <a class="dropdown-item" href="login.html"></a>

          </div>
        </li>

         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Order</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
           
            <router-link class="dropdown-item" to="order">Today order </router-link>
            <router-link class="dropdown-item" to="allorder">all Order </router-link>
            <a class="dropdown-item" href="login.html"></a>

          </div>
        </li>




    


    </ul>

    <div id="content-wrapper">
      <div class="container-fluid">
        <div class="row" v-show="$route.path==='/home' ? true:false " >

          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">
                  <router-link class="nav-link" to="dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span><strong>Dashboard</strong></span>
                  </router-link>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">
                  <router-link class="nav-link" to="pos">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span><strong>pos</strong></span>
                  </router-link>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5">
                  <router-link class="nav-link" to="allcustomer">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span><strong>Customer</strong></span>
                  </router-link>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5">
                  <router-link class="nav-link" to="allemployee">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span><strong>Employee</strong></span>
                  </router-link>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">
                  <router-link class="nav-link" to="allsupplier">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span><strong>Supplier</strong></span>
                  </router-link>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">
                  <router-link class="nav-link" to="allcategory">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span><strong>Category</strong></span>
                  </router-link>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5">
                  <router-link class="nav-link" to="allbrand">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span><strong>Brand</strong></span>
                  </router-link>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5">
                  <router-link class="nav-link" to="allproduct">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span><strong>Product</strong></span>
                  </router-link>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">
                  <router-link class="nav-link" to="allexpense">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span><strong>All Expense</strong> </span>
                  </router-link>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">
                  <router-link class="nav-link" to="todayexpense">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span><strong>Expense</strong></span>
                  </router-link>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5">
                  <router-link class="nav-link" to="order">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span><strong>Today order</strong></span>
                  </router-link>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5">
                  <router-link class="nav-link" to="allorder">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span><strong>Allorder</strong></span>
                  </router-link>
                </div>
              </div>
            </div>
          </div>
        </div>

        <router-view></router-view>
      </div>
    </div>
  </div>
</div>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  
  <script src="{{asset('js/app.js')}}"></script>
  <script src="{{asset('assets/backend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('assets/backend/vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('assets/backend/vendor/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('assets/backend/vendor/datatables/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('assets/backend/js/sb-admin.min.js')}}"></script>
  <script src="{{asset('assets/backend/js/demo/datatables-demo.js')}}"></script>
  <script src="{{asset('assets/backend/js/demo/chart-area-demo.js')}}"></script>

</body>

</html>
