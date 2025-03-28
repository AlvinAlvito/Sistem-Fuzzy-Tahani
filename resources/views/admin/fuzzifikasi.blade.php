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

                <table id="tabelFuzzifikasi" class="table table-hover table-striped border">
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
                                <td class="border">{{ $data->siswa->nama }}</td>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabelFuzzifikasi').DataTable({
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
                "columnDefs": [
                    { "orderable": false, "targets": [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13] } // Nonaktifkan sorting di beberapa kolom
                ]
            });
        });
    </script>
    
@endsection
