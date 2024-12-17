@extends('layouts.app')

@section('title', 'kendaraan')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>List Kendaraan</h1>
            </div>

            <div class="section-body">
                {{-- <h4 class="tittle-1">
                    <span class="span0">List</span>
                    <span class="span1">Tindak Lanjut</span>
                </h4> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 shadow rounded">
                            <div class="card-body">
                                {{-- @foreach ($pic as $item)
                                    @if ($item->tanggungjawab == auth()->user()->name)
                                        <a href="{{ route('tindak-lanjut.create') }}" class="btn btn-md btn-success mb-3"
                                            style="font-size: 0.85rem !important;">TAMBAH/EDIT Rekomendasi</a>
                                    @endif
                                @endforeach
                                @if (auth()->user()->id_level == 1 || auth()->user()->id_level == 2)
                                    <a href="{{ route('tindak-lanjut.create') }}" class="btn btn-md btn-success mb-3"
                                        style="font-size: 0.85rem !important;">TAMBAH/EDIT Rekomendasi</a>
                                @endif --}}
                                <a href="{{ route('kendaraan.create') }}" class="btn btn-md btn-success mb-3"
                                            style="font-size: 0.85rem !important;">TAMBAH KENDARAAN</a>
                                    <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Kendaraan</th>
                                        <th scope="col">Jenis Angkutan</th>
                                        <th scope="col">Kepemilikan</th>
                                        <th scope="col">Konsumsi BBM</th>
                                        <th scope="col">Jadwal Servis</th>
                                        <th scope="col" colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = ($kendaraan->currentPage() - 1) * $kendaraan->perPage() + 1; @endphp
                                    @forelse ($kendaraan as $item)
                                        <tr>
                                            <td class="text-center">
                                                {{ $no++ }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->nama_kendaraan }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->jenis_angkutan }}
                                            </td>
                                            <td class="text">
                                                {{ $item->kepemilikan }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->konsumsi_bbm }} KM / L
                                            </td>
                                            <td class="text-center">
                                                {{ \Carbon\Carbon::parse($item['jadwal_servis'])->format('d F Y H:i') }}
                                            </td>
                                            <td><a href="{{ route('kendaraan.edit', $item) }}"
                                                class="btn fa-regular fa-pen-to-square bg-warning p-2 text-white"
                                                data-toggle="tooltip" title="Edit Kendaraan"></a> 
                                            </td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('kendaraan.destroy', $item) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <!-- <button type="submit" class="fa-solid fa-trash bg-danger p-2 text white"></button> -->
                                                    <button type="submit"
                                                        class="btn fa-solid fa-trash bg-danger p-2 text-white"
                                                        data-toggle="tooltip" title="Hapus Kendaraan"></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data Kendaraan belum Tersedia.
                                        </div>
                                    @endforelse
                                </tbody>
                                </table>
                                <!-- PAGINATION (Hilangi -- nya)-->
                                {{ $kendaraan->links('pagination::bootstrap-4') }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
