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
                    <i class="uil uil-user"></i>
                    <span class="text">Profil Siswa</span>
                </div>
                <span>
                    <a href="/admin/data-siswa" class="btn btn-primary">Kembali</a>
                </span>
                <table id="tabelSiswa" class="table table-hover table-striped my-3 border" >
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Akademik</th>
                            <th>Minat</th>
                            <th>Bakat</th>
                            <th>Gaya Belajar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $index => $s)
                            <tr>
                                <td>{{ $s->nama }}</td>
                                <td>{{ $s->akademik }}</td>
                                <td>{{ $s->minat }}</td>
                                <td>{{ $s->bakat }}</td>
                                <td>{{ $s->gaya_belajar }}</td>
                                <td>
                                    <a href="#" class="text-primary edit-btn" data-id="{{ $s->id }}">
                                        <i class="uil uil-edit"></i>
                                    </a>
                                    <a href="#" class="text-danger delete-btn" data-id="{{ $s->id }}">
                                        <i class="uil uil-trash-alt"></i>
                                    </a>
                                    <form id="delete-form-{{ $s->id }}" action="{{ route('siswa.destroy', $s->id) }}"
                                        method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <span class="h5 mb-2 text-center">Fuzzifikasi</span>
                <table id="tabelFuzzifikasi" class="table table-hover table-striped border  my-3">
                    <thead>
                        <tr>
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
                        @foreach ($siswa as $key => $s)
                            <tr>
                                <td class="text-center border">{{ round($s->fuzzyfikasi->akademik_rendah, 1) }}</td>
                                <td class="text-center border">{{ round($s->fuzzyfikasi->akademik_sedang, 1) }}</td>
                                <td class="text-center border">{{ round($s->fuzzyfikasi->akademik_tinggi, 1) }}</td>
                                <td class="text-center border">{{ round($s->fuzzyfikasi->minat_kurang, 1) }}</td>
                                <td class="text-center border">{{ round($s->fuzzyfikasi->minat_cukup, 1) }}</td>
                                <td class="text-center border">{{ round($s->fuzzyfikasi->minat_tinggi, 1) }}</td>
                                <td class="text-center border">{{ round($s->fuzzyfikasi->bakat_kurang, 1) }}</td>
                                <td class="text-center border">{{ round($s->fuzzyfikasi->bakat_sedang, 1) }}</td>
                                <td class="text-center border">{{ round($s->fuzzyfikasi->bakat_baik, 1) }}</td>
                                <td class="text-center border">{{ round($s->fuzzyfikasi->gaya_kurang_baik, 1) }}</td>
                                <td class="text-center border">{{ round($s->fuzzyfikasi->gaya_baik, 1) }}</td>
                                <td class="text-center border">{{ round($s->fuzzyfikasi->gaya_sangat_baik, 1) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <span class="h5 mb-2 text-center">Rekomendasi Jurusan</span>
                <table id="tabelRekomendasi" class="table table-hover table-striped border  my-3">
                    <thead>
                        <tr>
                            <th>Nilai IPA</th>
                            <th>Nilai IPS</th>
                            <th>Nilai Agama</th>
                            <th>Jurusan Rekomendasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $key => $s)
                            <tr>
                                <td>{{ number_format($s->fuzzyfikasiQuery->ipa ?? 0, 2) }}</td>
                                <td>{{ number_format($s->fuzzyfikasiQuery->ips ?? 0, 2) }}</td>
                                <td>{{ number_format($s->fuzzyfikasiQuery->agama ?? 0, 2) }}</td>
                                <td><strong>{{ $s->fuzzyfikasiQuery->rekomendasi ?? 'Belum Ada' }}</strong></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
