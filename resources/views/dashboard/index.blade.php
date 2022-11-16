@extends('layouts.master')

@section('content')
<div class="page-heading">
    <h3>Dashboard</h3>
</div>

<section class="row">
    <div class="col-12 col-lg-9">
        <div class="row">
            <div class="col-6 col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon purple mb-2">
                                    <i class="iconly-boldShow"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Total Kas</h6>
                                <h6 class="font-extrabold mb-0">@currency($kas)</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon green mb-2">
                                    <i class="iconly-boldArrow---Up"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Kas Masuk</h6>
                                <h6 class="font-extrabold mb-0">@currency($datasMasuk)</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon red mb-2">
                                    <i class="iconly-boldArrow---Down"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Kas Keluar</h6>
                                <h6 class="font-extrabold mb-0">@currency($datasKeluar)</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="col-12 col-lg-3">
        <div class="card">
            <div class="card-body py-4 px-4">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl">

                        @if (Auth::user()->foto != '')

                        <img src="{{asset('storage/galeri/'.Auth::user()->foto)}}" alt="" srcset="">
                        @else
                        <img src="assets/images/faces/1.jpg" alt="Face 1">

                        @endif
                    </div>
                    <div class="ms-3 name">
                        <h5 class="font-bold">{{ Auth::user()->name }}</h5>
                    </div>
                </div>
            </div>
        </div>

    </div>



    {{-- Chart --}}
    <div class="col-12 col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex justify-content-between">

                    <div class="text-start">

                        <h6>Chart</h6>
                    </div>
                    <form action="{{ route('home.fillter') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-7 col-md-7">

                                <input id="datepicker" name="date" class="form-control w-100" />
                            </div>

                            <div class="col-4 col-md-4">

                                <button type="submit" class="btn btn-outline-primary w-100">filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="card-body">

                <div class="row">


                    <div class="col-12 col-md-12">
                        <div class="text-center">
                            <canvas id="chart"></canvas>
                        </div>
                    </div>


                </div>

            </div>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script>
        const bulan = [
           
            @for ($i = 1; $i <= $label_m; $i++)
                {{ $i }},
            @endfor
         
        ];

        const dataKas = {
            labels: bulan,
            datasets: [{
                label: 'Pemasukan',
                backgroundColor: '#47b576',
                borderRadius: 4,
                barThickness: 8,

                data: [
                    @foreach ($data_pemasukan as $masuk)
                                    {{ $masuk }},
                                @endforeach
                ]
            }, {
                label: 'Pengeluaran',
                backgroundColor: '#ff7976',
                borderRadius: 4,
                barThickness: 8,
                data: [
                    @foreach ($data_pengeluaran as $keluar)
                                    {{ $keluar }},
                                @endforeach
                ],
            }]
        };

        const bar_products = {
            type: 'bar',
            data: dataKas,
            options: {
                responsive: true,
                indexAxis: 'x',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                        },
                    },
                },
            }
        };
    </script>
    <script>
        const bulanan_products = new Chart(
            document.getElementById('chart'),
            bar_products
        );
    </script>


</section>
@endsection