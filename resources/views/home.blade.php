@extends('layouts.SimpleLayout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">التقارير</h1>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="card border-left-success shadow h-100 py-2" href="/DindeView">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">لاداند</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $dinde ?? 0 }} درهم</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="card border-left-primary shadow h-100 py-2" href="/MortadelleView">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">كاشير </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $morta ?? 0 }} درهم</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Pending Requests Card Example -->

        <div class="col-xl-3 col-md-6 mb-4">
            <a class="card border-left-danger shadow h-100 py-2" href="/AlimentationView">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">علف</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ali ?? 0 }} درهم</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">المجموع</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $total ?? 0 }} درهم</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="/CheckView">
            <h1 class="h3 mb-0 text-gray-800">تقارير الشيكات و كمبيالات</h1>
        </a>
    </div>
    <div class="row">
        @foreach ($checks as $ck)
            <div class="col-xl-3 col-md-6 mb-4">
                <a class="card border-left-success shadow h-100 py-2" href="/CheckView">
                    <div class="card-body" style="border: 5px red solid;">
                        <div class="row no-gutters align-items-center">

                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-gray-800 text-success text-uppercase mb-1">
                                    {{ $ck->name ?? 0 }}
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $ck->type == 'kimb' ? 'كمبيالا' : ' شيك' }}
                                    ({{ $ck->amount ?? 0 }} درهم)</div>
                                <div class="h6 mb-0 text-gray-800">

                                    ({{ $ck->date ?? 0 }})</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="/ViewCredit">
            <h1 class="h3 mb-0 text-gray-800"> الكريديات الحالية</h1>
        </a>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <a class="card border-left-info shadow h-100 py-2" href="/ViewCredit">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">المجموع</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $credits ?? 0 }} درهم</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="/lkwaraView">
            <h1 class="h3 mb-0 text-gray-800">لكوارى</h1>
        </a>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="card border-left-info shadow h-100 py-2" href="/lkwaraView">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">العلف (kg) </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $alfinfo->alf ?? 0 }} كيلو
                                        علف
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="card border-left-info shadow h-100 py-2" href="/lkwaraView">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">الفلوس </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $alfinfo->falos ?? 0 }}
                                        فلوس
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

@endsection
