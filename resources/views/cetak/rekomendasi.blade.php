<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid black;
        padding: 5px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
    }
</style>

<table>
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
                <td>{{ $s->fuzzyfikasiQuery->rekomendasi ?? 'Belum Ada' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
