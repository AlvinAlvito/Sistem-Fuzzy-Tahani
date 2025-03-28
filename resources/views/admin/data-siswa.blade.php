@extends('layouts.main')

@section('content')
    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif


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
                    <span class="text">Data Siswa</span>
                </div>
                <div class="row justify-content-start mb-3">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
                            <i class="uil uil-plus"></i> Tambah Data
                        </button>
                    </div>
                </div>

                <table id="tabelSiswa" class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Akademik</th>
                            <th scope="col">Minat</th>
                            <th scope="col">Bakat</th>
                            <th scope="col">Gaya Belajar</th>
                            <th scope="col">Profil Siswa</th> 
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswas as $index => $siswa)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $siswa->nama }}</td>
                                <td>{{ $siswa->akademik }}</td>
                                <td>{{ $siswa->minat }}</td>
                                <td>{{ $siswa->bakat }}</td>
                                <td>{{ $siswa->gaya_belajar }}</td>
                                <td>
                                    <a href="{{ url('/admin/profil-siswa/' . $siswa->id) }}" class="text-primary btn-sm">
                                        <i class="uil uil-user"></i>
                                    </a>
                                </td> 
                                <td>
                                    <!-- Tombol Edit -->
                                    <a href="#" class="text-primary edit-btn" data-id="{{ $siswa->id }}"
                                        data-nama="{{ $siswa->nama }}" data-akademik="{{ $siswa->akademik }}"
                                        data-minat="{{ $siswa->minat }}" data-bakat="{{ $siswa->bakat }}"
                                        data-gaya_belajar="{{ $siswa->gaya_belajar }}" data-bs-toggle="modal"
                                        data-bs-target="#editModal">
                                        <i class="uil uil-edit"></i>
                                    </a>
                
                                    <!-- Tombol Hapus -->
                                    <a href="#" class="text-danger delete-btn" data-id="{{ $siswa->id }}">
                                        <i class="uil uil-trash-alt"></i>
                                    </a>
                
                                    <form id="delete-form-{{ $siswa->id }}"
                                        action="{{ route('siswa.destroy', $siswa->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                

            </div>
        </div>
    </section>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('siswa.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="akademik" class="form-label">Akademik</label>
                            <input type="number" name="akademik" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="minat" class="form-label">Minat</label>
                            <input type="number" name="minat" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="bakat" class="form-label">Bakat</label>
                            <input type="number" name="bakat" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="gaya_belajar" class="form-label">Gaya Belajar</label>
                            <input type="number" name="gaya_belajar" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit Data Siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="modal-body">
                        <input type="hidden" id="edit-id" name="id">

                        <div class="mb-3">
                            <label for="edit-nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="edit-nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-akademik" class="form-label">Akademik</label>
                            <input type="text" class="form-control" id="edit-akademik" name="akademik" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-minat" class="form-label">Minat</label>
                            <input type="text" class="form-control" id="edit-minat" name="minat" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-bakat" class="form-label">Bakat</label>
                            <input type="text" class="form-control" id="edit-bakat" name="bakat" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-gaya_belajar" class="form-label">Gaya Belajar</label>
                            <input type="text" class="form-control" id="edit-gaya_belajar" name="gaya_belajar"
                                required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- jQuery (Wajib) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Edit modal handling
            document.querySelectorAll(".edit-btn").forEach(button => {
                button.addEventListener("click", function() {
                    const data = this.dataset;
                    ["id", "nama", "akademik", "minat", "bakat", "gaya_belajar"].forEach(field => {
                        document.getElementById(`edit-${field}`).value = data[field];
                    });
                    document.getElementById("editForm").setAttribute("action", `/siswa/${data.id}`);
                });
            });

            // Delete confirmation
            document.querySelectorAll(".delete-btn").forEach(button => {
                button.addEventListener("click", function(event) {
                    event.preventDefault();
                    const siswaId = this.dataset.id;

                    Swal.fire({
                        title: "Apakah Anda yakin?",
                        text: "Data siswa akan dihapus secara permanen!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Ya, Hapus!",
                        cancelButtonText: "Batal"
                    }).then(result => {
                        if (result.isConfirmed) {
                            document.getElementById(`delete-form-${siswaId}`).submit();
                        }
                    });
                });
            });

            // SweetAlert notification
            if ("{{ session('success') }}") {
                Swal.fire({
                    title: "Berhasil!",
                    text: "{{ session('success') }}",
                    icon: "success",
                    confirmButtonText: "OK"
                });
            }

            // DataTable initialization
            $(document).ready(function() {
                $('.table, #tabelSiswa').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    info: true,
                    lengthMenu: [5, 10, 25, 50, 100],
                    language: {
                        lengthMenu: "Tampilkan _MENU_ data per halaman",
                        zeroRecords: "Tidak ada data yang ditemukan",
                        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                        infoEmpty: "Tidak ada data tersedia",
                        search: "Cari:",
                        paginate: {
                            first: "Awal",
                            last: "Akhir",
                            next: "Selanjutnya",
                            previous: "Sebelumnya"
                        }
                    }
                });
            });
        });
    </script>
@endsection
