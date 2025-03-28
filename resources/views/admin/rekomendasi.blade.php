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
                <span class="text">Rekomendasi</span>                
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Nilai IPA</th>
                        <th>Nilai IPS</th>
                        <th>Nilai Agama</th>
                        <th>Jurusan Rekomendasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $key => $s)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $s->nama }}</td>
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
