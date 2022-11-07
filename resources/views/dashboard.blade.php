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

    <div class="col-12 col-lg-12 col-md-12">
        <div class="card">
          
            <div class="card-body px-3 py-4-5">
                <canvas id="chart"></canvas>

            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <script>
        const labels = [
                'Januari',
                'Februari',
                'Maret',
                'April',
                'May',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            ];
    
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Pemasukan',
                    backgroundColor: 'rgb(71, 181, 118)',
                    borderColor: 'rgb(71, 181, 118)',
                    data: [
                        @foreach ($data_pemasukan as $pemasukan)
                            {{ $pemasukan }},
                        @endforeach
                    ],
                    tension: 0.3
                }, {
                    label: 'Pengaluaran',
                    backgroundColor: 'rgb(255, 121, 118)',
                    borderColor: 'rgb(255, 121, 118)',
                    data: [
                        @foreach ($data_pengeluaran as $pengeluaran)
                            {{ $pengeluaran }},
                        @endforeach
                    ],
                    tension: 0.3
                }]
            };
    
            const config = {
                type: 'bar',
                data: data,
                options: {}
            };
    
    
            const myChart = new Chart(
                document.getElementById('chart'),
                config
            );
    </script>

</section>
@endsection