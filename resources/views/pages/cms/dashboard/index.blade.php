@extends('components.layouts.cms.app')

@section('title', 'Dashboard')

@section('content')


<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Dashboard</span class='ti ti-cash'>
        </h4>

        <div class="row">
            <!-- Revenue Growth -->
            <div class="col-xl-3 col-md-8 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-column">
                                <div class="card-title mb-auto">
                                    <h5 class="mb-1 text-nowrap">Total Email</h5>
                                </div>
                                <div class="chart-statistics">
                                    <h4 class="card-title mb-1">0</h4>
                                </div>
                            </div>
                            <div id="revenueGrowth"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-8 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-column">
                                <div class="card-title mb-auto">
                                    <h5 class="mb-1 text-nowrap">Card Total</h5>
                                </div>
                                <div class="chart-statistics">
                                    <h4 class="card-title mb-1">7</h4>
                                </div>
                            </div>
                            <div id="revenueGrowth"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-8 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-column">
                                <div class="card-title mb-auto">
                                    <h5 class="mb-1 text-nowrap">Blog Total</h5>
                                </div>
                                <div class="chart-statistics">
                                    <h4 class="card-title mb-1">7</h4>
                                </div>
                            </div>
                            <div id="revenueGrowth"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Content wrapper -->

        <div class="row">
            <!-- Browser States -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title m-0 me-2">
                            <h5 class="m-0 me-2">Browser States</h5>
                            <small class="text-muted">Counter April 2022</small>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="employeeList" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="employeeList">
                                <a class="dropdown-item" href="javascript:void(0);">Download</a>
                                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                <a class="dropdown-item" href="javascript:void(0);">Share</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-4 pb-1 align-items-center">
                                <img src="../../assets/img/icons/brands/chrome.png" alt="Chrome" height="28"
                                    class="me-3 rounded" />
                                <div class="d-flex w-100 align-items-center gap-2">
                                    <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
                                        <div>
                                            <h6 class="mb-0">Google Chrome</h6>
                                        </div>

                                        <div class="user-progress d-flex align-items-center gap-2">
                                            <h6 class="mb-0">90.4%</h6>
                                        </div>
                                    </div>
                                    <div class="chart-progress" data-color="secondary" data-series="85"></div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1 align-items-center">
                                <img src="../../assets/img/icons/brands/safari.png" alt="Safari" height="28"
                                    class="me-3 rounded" />
                                <div class="d-flex w-100 align-items-center gap-2">
                                    <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
                                        <div>
                                            <h6 class="mb-0">Apple Safari</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-2">
                                            <h6 class="mb-0">70.6%</h6>
                                        </div>
                                    </div>
                                    <div class="chart-progress" data-color="success" data-series="70"></div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1 align-items-center">
                                <img src="../../assets/img/icons/brands/firefox.png" alt="Firefox" height="28"
                                    class="me-3 rounded" />
                                <div class="d-flex w-100 align-items-center gap-2">
                                    <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
                                        <div>
                                            <h6 class="mb-0">Mozilla Firefox</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-2">
                                            <h6 class="mb-0">35.5%</h6>
                                        </div>
                                    </div>
                                    <div class="chart-progress" data-color="primary" data-series="25"></div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1 align-items-center">
                                <img src="../../assets/img/icons/brands/opera.png" alt="Opera" height="28"
                                    class="me-3 rounded" />
                                <div class="d-flex w-100 align-items-center gap-2">
                                    <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
                                        <div>
                                            <h6 class="mb-0">Opera Mini</h6>
                                        </div>

                                        <div class="user-progress d-flex align-items-center gap-2">
                                            <h6 class="mb-0">80.0%</h6>
                                        </div>
                                    </div>
                                    <div class="chart-progress" data-color="danger" data-series="75"></div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1 align-items-center">
                                <img src="../../assets/img/icons/brands/edge.png" alt="Edge" height="28"
                                    class="me-3 rounded" />
                                <div class="d-flex w-100 align-items-center gap-2">
                                    <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
                                        <div>
                                            <h6 class="mb-0">Internet Explorer</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-2">
                                            <h6 class="mb-0">62.2%</h6>
                                        </div>
                                    </div>
                                    <div class="chart-progress" data-color="info" data-series="60"></div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <img src="../../assets/img/icons/brands/brave.png" alt="Brave" height="28"
                                    class="me-3 rounded" />
                                <div class="d-flex w-100 align-items-center gap-2">
                                    <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
                                        <div>
                                            <h6 class="mb-0">Brave</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-2">
                                            <h6 class="mb-0">46.3%</h6>
                                        </div>
                                    </div>
                                    <div class="chart-progress" data-color="warning" data-series="45"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/ Browser States -->


            <!-- User Visitor-->
            <div class="col-xl-8 col-xxl-6 mb-4 order-3 order-xxl-1">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">User Visitor</h5>
                            <small class="text-muted">Total number of User Visitor 23.8k</small>
                        </div>
                        <div class="dropdown">
                            <button type="button" class="btn btn-label-primary dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                January
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:void(0);">January</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">February</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">March</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">April</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">May</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">June</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">July</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">August</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">September</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">October</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">November</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">December</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="shipmentStatisticsChart"></div>
                    </div>
                </div>
            </div>
            <!--/ User Visitor -->

        </div>
    </div>
    <!-- / Content -->

    <!-- Footer -->
    @include('partials.cms.footer')
    <!-- / Footer -->

    <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
@endsection