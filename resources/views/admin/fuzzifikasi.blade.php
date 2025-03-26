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
            <div class="activity">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Fuzzifikasi</span>
                </div>

                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Akademik Rendah</th>
                            <th>Akademik Sedang</th>
                            <th>Akademik Tinggi</th>
                            <th>Minat Kurang</th>
                            <th>Minat Cukup</th>
                            <th>Minat Tinggi</th>
                            <th>Bakat Kurang</th>
                            <th>Bakat Sedang</th>
                            <th>Bakat Baik</th>
                            <th>Gaya Kurang Baik</th>
                            <th>Gaya Baik</th>
                            <th>Gaya Sangat Baik</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fuzzifikasi as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->siswa->nama }}</td>
                                <td>{{ round($data->akademik_rendah, 1) }}</td>
                                <td>{{ round($data->akademik_sedang, 1) }}</td>
                                <td>{{ round($data->akademik_tinggi, 1) }}</td>
                                <td>{{ round($data->minat_kurang, 1) }}</td>
                                <td>{{ round($data->minat_cukup, 1) }}</td>
                                <td>{{ round($data->minat_tinggi, 1) }}</td>
                                <td>{{ round($data->bakat_kurang, 1) }}</td>
                                <td>{{ round($data->bakat_sedang, 1) }}</td>
                                <td>{{ round($data->bakat_baik, 1) }}</td>
                                <td>{{ round($data->gaya_kurang_baik, 1) }}</td>
                                <td>{{ round($data->gaya_baik, 1) }}</td>
                                <td>{{ round($data->gaya_sangat_baik, 1) }}</td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
