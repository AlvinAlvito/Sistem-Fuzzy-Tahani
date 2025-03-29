@extends('layouts.main')
@section('content')
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            
            <img src="/images/profile.jpg" alt="">
        </div>
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text" >Total Siswa</span>
                        <span class="number" id="total-siswa"></span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Totall Guru</span>
                        <span class="number">43</span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-share"></i>
                        <span class="text">Total Jurusan</span>
                        <span class="number">3</span>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Grafik Rekomendasi Jurusan</span>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <span class="h4 text-center">Diagram Donat</span>
                        <canvas id="donutChart"></canvas>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <span class="h4 text-center">Diagram Polar</span>
                        <canvas id="polarChart"></canvas>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <span class="h4 text-center">Diagram Bar</span>
                        <canvas id="barChart"></canvas>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <span class="h4 text-center">Diagram Line</span>
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch('http://127.0.0.1:8000/rekomendasi-count')
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success" && Array.isArray(data.data)) {
                        let totalSiswa = data.data.reduce((sum, item) => sum + item.total, 0);
                        document.getElementById("total-siswa").textContent = `${totalSiswa}`;
                    }
                })
                .catch(error => console.error("Error fetching data:", error));
        });
        document.addEventListener("DOMContentLoaded", function() {
            fetch("http://127.0.0.1:8000/rekomendasi-count")
                .then(response => response.json())
                .then(data => {
                    const labels = data.data.map(item => item.rekomendasi);
                    const values = data.data.map(item => item.total);

                    const colors = ["#FF6384", "#36A2EB", "#FFCE56"]; // Warna untuk setiap kategori

                    // **DIAGRAM DONAT**
                    new Chart(document.getElementById("donutChart"), {
                        type: "doughnut",
                        data: {
                            labels: labels,
                            datasets: [{
                                data: values,
                                backgroundColor: colors
                            }]
                        }
                    });

                    // **DIAGRAM BAR**
                    new Chart(document.getElementById("barChart"), {
                        type: "bar",
                        data: {
                            labels: labels,
                            datasets: [{
                                label: "Jumlah Siswa",
                                data: values,
                                backgroundColor: colors
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                    // **DIAGRAM POLAR**
                    new Chart(document.getElementById("polarChart"), {
                        type: "polarArea",
                        data: {
                            labels: labels,
                            datasets: [{
                                data: values,
                                backgroundColor: colors
                            }]
                        }
                    });

                    // **DIAGRAM LINE**
                    new Chart(document.getElementById("lineChart"), {
                        type: "line",
                        data: {
                            labels: labels,
                            datasets: [{
                                label: "Jumlah Siswa",
                                data: values,
                                borderColor: "#36A2EB",
                                backgroundColor: "rgba(54, 162, 235, 0.2)",
                                fill: true
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                })
                .catch(error => console.error("Error fetching data:", error));
        });
    </script>
@endsection
