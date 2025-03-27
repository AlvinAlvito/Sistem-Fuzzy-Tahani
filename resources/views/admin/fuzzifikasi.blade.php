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

                <table class="table table-hover table-striped border">
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center border">No</th>
                            <th rowspan="2" class="text-center border">Nama</th>
                            <th colspan="3" class="text-center border">Akademik</th>
                            <th colspan="3" class="text-center border">Minat</th>
                            <th colspan="3" class="text-center border">Bakat</th>
                            <th colspan="3" class="text-center border">Gaya Belajar</th>
                        </tr>
                        <tr class="border">
                            <th class="text-center border">Rendah</th>
                            <th class="text-center border">Sedang</th>
                            <th class="text-center border">Tinggi</th>
                            <th class="text-center border">Kurang</th>
                            <th class="text-center border">Cukup</th>
                            <th class="text-center border">Tinggi</th>
                            <th class="text-center border">Kurang</th>
                            <th class="text-center border">Sedang</th>
                            <th class="text-center border">Baik</th>
                            <th class="text-center border">Kurang Baik</th>
                            <th class="text-center border">Baik</th>
                            <th class="text-center border">Sangat Baik</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fuzzifikasi as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td class=" border">{{ $data->siswa->nama }}</td>
                                <td class="text-center border">{{ round($data->akademik_rendah, 1) }}</td>
                                <td class="text-center border">{{ round($data->akademik_sedang, 1) }}</td>
                                <td class="text-center border">{{ round($data->akademik_tinggi, 1) }}</td>
                                <td class="text-center border">{{ round($data->minat_kurang, 1) }}</td>
                                <td class="text-center border">{{ round($data->minat_cukup, 1) }}</td>
                                <td class="text-center border">{{ round($data->minat_tinggi, 1) }}</td>
                                <td class="text-center border">{{ round($data->bakat_kurang, 1) }}</td>
                                <td class="text-center border">{{ round($data->bakat_sedang, 1) }}</td>
                                <td class="text-center border">{{ round($data->bakat_baik, 1) }}</td>
                                <td class="text-center border">{{ round($data->gaya_kurang_baik, 1) }}</td>
                                <td class="text-center border">{{ round($data->gaya_baik, 1) }}</td>
                                <td class="text-center border">{{ round($data->gaya_sangat_baik, 1) }}</td>
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
