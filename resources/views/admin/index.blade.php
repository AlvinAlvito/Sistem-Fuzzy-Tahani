@extends('layouts.main')
@section('content')
    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <i class="uil uil-tachometer-fast-alt"></i>
                <span class="text">Dashboard</span>
            </div>

            <div class="boxes">
                <div class="box box1">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="text">Totall Siswa</span>
                    <span class="number">340</span>
                </div>
                <div class="box box2">
                    <i class="uil uil-comments"></i>
                    <span class="text">Totall Guru</span>
                    <span class="number">43</span>
                </div>
                <div class="box box3">
                    <i class="uil uil-share"></i>
                    <span class="text">Total Jurusan</span>
                    <span class="number">16</span>
                </div>
            </div>
        </div>

        <div class="activity">
            <div class="title">
                <i class="uil uil-clock-three"></i>
                <span class="text">Grafik Diagram</span>
            </div>

            <div class="activity-data ">
                <div style="width: 30%">
                    <span class="h4 text-center">Grafik Siswa</span>
                    <canvas id="donutChart"></canvas>
                </div>
                <div style="width: 50%; ">
                    <span class="h4 text-center">Grafik Guru</span>
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('donutChart').getContext('2d');
        const data = {
            labels: ['Total Siswa', 'Total Guru', 'Total Pelajaran'],
            datasets: [{
                data: [311, 31, 13],
                backgroundColor: ['#4CAF50', '#FF9800', '#2196F3'],
                hoverBackgroundColor: ['#45A049', '#FB8C00', '#1E88E5']
            }]
        };

        const options = {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    enabled: true,
                },
            }
        };

        new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: options
        });

        const ctx2 = document.getElementById('barChart').getContext('2d');
        const data2 = {
            labels: ['Total Siswa', 'Total Guru', 'Total Pelajaran'],
            datasets: [{
                label: 'Jumlah',
                data: [311, 31, 13],
                backgroundColor: ['#4CAF50', '#FF9800', '#2196F3'],
                borderColor: ['#388E3C', '#F57C00', '#1976D2'],
                borderWidth: 1
            }]
        };

        const options2 = {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        new Chart(ctx2, {
            type: 'bar',
            data: data,
            options: options
        });
    </script>
@endsection
