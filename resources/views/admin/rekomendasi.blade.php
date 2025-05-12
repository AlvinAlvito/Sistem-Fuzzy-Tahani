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
                <div class="row">
                    <div class="col-12">
                        <a href="/admin/cetak/rekomendasi" class="btn btn-primary btn-sm my-2">Unduh File Rekomendasi</a>
                    </div>
                    <div class="col-12" style="overflow-x:scroll ">
                        <table id="tabelRekomendasi" class="table table-hover table-striped border">
                            <thead>
                                <tr>
                                    <th class="text-center border">No</th>
                                    <th class="text-center border">Nama Siswa</th>
                                    <th class="text-center border">Nilai IPA</th>
                                    <th class="text-center border">Nilai IPS</th>
                                    <th class="text-center border">Nilai Agama</th>
                                    <th class="text-center border">Jurusan Rekomendasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswa as $key => $s)
                                    <tr>
                                        <td class="text-center border">{{ $key + 1 }}</td>
                                        <td class="text-center border">{{ $s->nama }}</td>
                                        <td class="text-center border">{{ number_format($s->fuzzyfikasiQuery->ipa ?? 0, 2) }}</td>
                                        <td class="text-center border">{{ number_format($s->fuzzyfikasiQuery->ips ?? 0, 2) }}</td>
                                        <td class="text-center border">{{ number_format($s->fuzzyfikasiQuery->agama ?? 0, 2) }}</td>
                                        <td class="text-center border"><strong>{{ $s->fuzzyfikasiQuery->rekomendasi ?? 'Belum Ada' }}</strong></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabelRekomendasi').DataTable({
                "paging": true, // Aktifkan Pagination
                "searching": true, // Aktifkan Pencarian
                "ordering": true, // Aktifkan Sorting
                "info": true, // Tampilkan Info Jumlah Data
                "lengthMenu": [5, 10, 25, 50, 100], // Pilihan jumlah data per halaman
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ data per halaman",
                    "zeroRecords": "Tidak ada data yang ditemukan",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "infoEmpty": "Tidak ada data tersedia",
                    "search": "Cari:",
                    "paginate": {
                        "first": "Awal",
                        "last": "Akhir",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    }
                },
                "columnDefs": [{
                        "orderable": false,
                        "targets": [5]
                    } // Nonaktifkan sorting pada kolom "Jurusan Rekomendasi"
                ]
            });
        });
    </script>
@endsection
