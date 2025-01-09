@extends('admin.admin_layouts')

@section('admin_content')

@php
$date = date('d-m-y');
$today = DB::table('orders')->where('date', $date)->sum('total');

$month = date('F');
$month_sale = DB::table('orders')->where('month', $month)->sum('total');

$year = date('Y');
$year_sale = DB::table('orders')->where('year', $year)->sum('total');

$delivered = DB::table('orders')->where('date', $date)->where('status',3)->sum('total');

$return = DB::table('orders')->where('return_order', 2)->sum('total');
$product = DB::table('products')->get();
$brand = DB::table('brands')->get();
$user = DB::table('users')->get();

@endphp

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <span class="breadcrumb-item active">Dashboard</span>
  </nav>

  <div class="sl-pagebody">
    <div class="row row-sm">
      <div class="col-sm-6 col-xl-3">
        <div class="card pd-20 bg-primary">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Today's Orders</h6>
            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">${{ $today }}</h3>
          </div><!-- card-body -->
        </div><!-- card -->
      </div><!-- col-3 -->
      <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
        <div class="card pd-20 bg-info">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Month's Sales</h6>
            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">${{ $month_sale }}</h3>
          </div><!-- card-body -->
        </div><!-- card -->
      </div><!-- col-3 -->
      <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
        <div class="card pd-20 bg-purple">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Year's Sales</h6>
            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">${{ $year_sale }}</h3>
          </div><!-- card-body -->
        </div><!-- card -->
      </div><!-- col-3 -->
      <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
        <div class="card pd-20 bg-sl-primary">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Users</h6>
            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ count($user) }}</h3>
          </div><!-- card-body -->
        </div><!-- card -->
      </div><!-- col-3 -->
    </div><!-- row -->

    <br>
    <!-- Pie Chart Section -->
    <div class="row row-sm">
      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
            <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Dropdown Header:</div>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-area">
              <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand">
                  <div class=""></div>
                </div>
                <div class="chartjs-size-monitor-shrink">
                  <div class=""></div>
                </div>
              </div>
              <canvas id="myAreaChart" style="display: block; width: 1049px; height: 320px;" width="1049" height="320" class="chartjs-render-monitor"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Pie Chart -->
      <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
            <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Dropdown Header:</div>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
              <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand">
                  <div class=""></div>
                </div>
                <div class="chartjs-size-monitor-shrink">
                  <div class=""></div>
                </div>
              </div>
              <canvas id="myPieChart" style="display: block; width: 491px; height: 245px;" width="491" height="245" class="chartjs-render-monitor"></canvas>
            </div>
            <div class="mt-4 text-center small">
              <span class="mr-2">
                <i class="fas fa-circle text-primary"></i> Direct
              </span>
              <span class="mr-2">
                <i class="fas fa-circle text-success"></i> Social
              </span>
              <span class="mr-2">
                <i class="fas fa-circle text-info"></i> Referral
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <br>
    <div class="row row-sm">
  <!-- Notifications Panel -->
  <div class="col-sm-6 col-xl-4">
    <div class="card pd-20 bg-warning">
      <div class="d-flex justify-content-between align-items-center mg-b-10">
        <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Notifications</h6>
        <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
      </div>
      <div class="card-body">
        <ul class="list-unstyled mb-0">
          <li class="media">
            <i class="fas fa-exclamation-circle fa-2x text-primary mr-3"></i>
            <div class="media-body">
              <p class="mb-0">New order placed by John Doe.</p>
              <small class="text-muted">2 mins ago</small>
            </div>
          </li>
          <li class="media mt-3">
            <i class="fas fa-envelope fa-2x text-info mr-3"></i>
            <div class="media-body">
              <p class="mb-0">You received a new message.</p>
              <small class="text-muted">15 mins ago</small>
            </div>
          </li>
          <li class="media mt-3">
            <i class="fas fa-user-plus fa-2x text-success mr-3"></i>
            <div class="media-body">
              <p class="mb-0">A new user has registered.</p>
              <small class="text-muted">30 mins ago</small>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Recent Activity -->
  <div class="col-sm-6 col-xl-4">
    <div class="card pd-20">
      <div class="d-flex justify-content-between align-items-center mg-b-10">
        <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 text-primary">Recent Activity</h6>
        <a href="" class="tx-gray-500 hover-primary"><i class="icon ion-android-more-horizontal"></i></a>
      </div>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Event</th>
              <th>Time</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Order #1234 Completed</td>
              <td>10 mins ago</td>
            </tr>
            <tr>
              <td>User Jane Updated Profile</td>
              <td>20 mins ago</td>
            </tr>
            <tr>
              <td>Product "Laptop" Added</td>
              <td>1 hour ago</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Task Progress -->
  <div class="col-sm-6 col-xl-4">
    <div class="card pd-20 bg-secondary">
      <div class="d-flex justify-content-between align-items-center mg-b-10">
        <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Task Progress</h6>
        <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
      </div>
      <div class="card-body">
        <div class="progress-wrapper">
          <p class="tx-white">Website Redesign <span class="float-right">75%</span></p>
          <div class="progress mg-b-10">
            <div class="progress-bar bg-primary" style="width: 75%;" role="progressbar"></div>
          </div>
        </div>
        <div class="progress-wrapper">
          <p class="tx-white">Product Launch <span class="float-right">50%</span></p>
          <div class="progress mg-b-10">
            <div class="progress-bar bg-info" style="width: 50%;" role="progressbar"></div>
          </div>
        </div>
        <div class="progress-wrapper">
          <p class="tx-white">Marketing Campaign <span class="float-right">30%</span></p>
          <div class="progress mg-b-10">
            <div class="progress-bar bg-success" style="width: 30%;" role="progressbar"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



  </div><!-- sl-pagebody -->

</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection