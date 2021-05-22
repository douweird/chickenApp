@extends('layouts.SimpleLayout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">لاداند</h1>
    </div>

    <div class="row">

        <!-- Earnings (day) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="card border-left-success shadow h-100 py-2" href="/DindeView">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">اليوم</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $dinde_day ?? 0 }} درهم</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Earnings (Month) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="card border-left-success shadow h-100 py-2" href="/DindeView">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">الشهر</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $TotalMonthDinde ?? 0 }} درهم</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Earnings (Year) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="card border-left-success shadow h-100 py-2" href="/DindeView">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">السنة</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $TotalYearDinde ?? 0 }} درهم</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">كاشير</h1>
    </div>

    <div class="row">

        <!-- Earnings (day) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="card border-left-success shadow h-100 py-2" href="/DindeView">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">اليوم</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $morta_day ?? 0 }} درهم</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Earnings (Month) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="card border-left-success shadow h-100 py-2" href="/DindeView">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">الشهر</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $TotalMonthMorta ?? 0 }} درهم</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Earnings (Year) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="card border-left-success shadow h-100 py-2" href="/DindeView">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">السنة</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $TotalYearMorta ?? 0 }} درهم</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">علف</h1>
    </div>

    <div class="row">

        <!-- Earnings (day) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="card border-left-success shadow h-100 py-2" href="/DindeView">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">اليوم</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $ali_day ?? 0 }} درهم</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Earnings (Month) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="card border-left-success shadow h-100 py-2" href="/DindeView">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">الشهر</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $TotalMonthAli ?? 0 }} درهم</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Earnings (Year) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="card border-left-success shadow h-100 py-2" href="/DindeView">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">السنة</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $TotalYearAli ?? 0 }} درهم</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">المبيعات</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <a id="" class="btn btn-warning float-left" id="" href="javascript:history.go(-1)">رجوع<i
                    class="fa fa-arrow-left"></i> </a><br /><br />
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th> الفئة </th>
                            <th>النوع</th>
                            <th>كمية</th>
                            <th>المجموع</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->category }}</td>
                                <td>{{ $order->product }}</td>
                                <td>{{ $order->amount }}kg</td>
                                <td>{{ $order->total }} درهم</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
