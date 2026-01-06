@extends('layouts.kelas')

@section('content_kelas')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold text-primary">Rekapitulasi Rapor Siswa</h4>
        <p class="text-muted mb-0">Data akademik & kehadiran kelas {{ $id_kelas }}</p>
    </div>
    
    <div class="d-flex gap-2">
        <a href="{{ route('nilai.mapel', $id_kelas) }}" class="btn btn-outline-secondary rounded-pill shadow-sm px-4">
            <i class="bi bi-arrow-left me-2"></i> Kembali
        </a>
        
        <a href="{{ route('rapot.pdf', $id_kelas) }}" class="btn btn-danger rounded-pill shadow-sm px-4">
            <i class="bi bi-file-earmark-pdf-fill me-2"></i> Download PDF
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-bordered table-striped mb-0 align-middle text-center" style="font-size: 0.85rem;">
                <thead class="bg-primary text-white">
                    <tr>
                        <th rowspan="2" class="align-middle">No</th>
                        <th rowspan="2" class="align-middle text-start ps-3 sticky-col bg-white text-dark" style="min-width: 200px; left:0; position:sticky; z-index:5;">Nama Siswa</th>
                        <th colspan="{{ count($mapels) }}" class="bg-primary text-white">Nilai Rata-rata / Akhir</th>
                        <th colspan="4" class="bg-dark text-white">Kehadiran</th>
                    </tr>
                    <tr>
                        @foreach($mapels as $mp)
                            @php 
                                $label = str_replace(['Tema ', 'Pendidikan ', 'Matematika', 'Seni Budaya', 'B. Inggris'], ['T', '', 'MTK', 'SB', 'ING'], $mp);
                            @endphp
                            <th>{{ $label }}</th>
                        @endforeach
                        <th class="bg-light text-success">H</th>
                        <th class="bg-light text-primary">S</th>
                        <th class="bg-light text-warning">I</th>
                        <th class="bg-light text-danger">A</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($siswas as $idx => $siswa)
                    <tr>
                        <td>{{ $idx + 1 }}</td>
                        <td class="text-start ps-3 fw-bold sticky-col bg-white" style="position:sticky; left:0;">{{ $siswa->nama }}</td>
                        
                        @foreach($mapels as $mp)
                            @php 
                                $nilai = $data_nilai[$siswa->id][$mp] ?? 0;
                                $class = $nilai < 70 ? 'text-danger fw-bold' : 'text-dark';
                            @endphp
                            <td class="{{ $class }}">{{ $nilai }}</td>
                        @endforeach

                        @php $absen = $data_absensi[$siswa->id] ?? ['Hadir'=>0, 'Sakit'=>0, 'Izin'=>0, 'Alpha'=>0]; @endphp
                        <td class="bg-light fw-bold">{{ $absen['Hadir'] }}</td>
                        <td class="bg-light">{{ $absen['Sakit'] }}</td>
                        <td class="bg-light">{{ $absen['Izin'] }}</td>
                        <td class="bg-light text-danger fw-bold">{{ $absen['Alpha'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .sticky-col { box-shadow: 2px 0px 5px rgba(0,0,0,0.1); border-right: 2px solid #dee2e6; }
</style>

@endsection