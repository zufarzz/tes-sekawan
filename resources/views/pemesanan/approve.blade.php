@extends('layouts.app')

@section('title', 'kendaraan')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>List Pemesanan</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 shadow rounded">
                            <div class="card-body">
                                <a href="{{ route('pemesanan.create') }}" class="btn btn-md btn-success mb-3"
                                            style="font-size: 0.85rem !important;">TAMBAH PEMESANAN</a>
                                    <table class="table table-bordered table-responsive">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Kendaraan</th>
                                        <th scope="col">Driver</th>
                                        <th scope="col">Yang Menyetujui</th>
                                        <th scope="col">Atasan Yang Menyetujui</th>
                                        <th scope="col">Tanggal Mulai</th>
                                        <th scope="col">Tanggal Akhir</th>
                                        <th scope="col">Asal</th>
                                        <th scope="col">Tujuan</th>
                                        <th scope="col">Approve yang menyetujui</th>
                                        <th scope="col">Approve atasan yang menyetujui</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = ($pemesanan->currentPage() - 1) * $pemesanan->perPage() + 1; @endphp
                                    @forelse ($pemesanan as $item)
                                        <tr>
                                            <td class="text-center">
                                                {{ $no++ }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->id_kendaraans->nama_kendaraan }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->drivers->name }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->atasan2s->name }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->atasan1s->name }}
                                            </td>
                                            <td class="text-center">
                                                {{ \Carbon\Carbon::parse($item['tanggal_mulai'])->format('d F Y') }}
                                            </td>
                                            <td class="text-center">
                                                {{ \Carbon\Carbon::parse($item['tanggal_akhir'])->format('d F Y') }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->asals->nama_region }}
                                            </td><td class="text-center">
                                                {{ $item->tujuans->nama_region }}
                                            </td>
                                            <td>
                                                @php
                                                        $statusClass = '';
                                                        switch ($item->approve_atasan2) {
                                                            case 'approved':
                                                                $statusClass = 'badge-success';
                                                                break;
                                                            case 'pending':
                                                                $statusClass = 'badge-warning';
                                                                break;
                                                            case 'rejected':
                                                                $statusClass = 'badge-danger';
                                                                break;
                                                            default:
                                                                $statusClass = 'badge-secondary';
                                                        }
                                                    @endphp
                                                    <span class="badge {{ $statusClass }}">
                                                        {{ $item->approve_atasan2 }}
                                                    </span>
                                            </td>
                                            <td>
                                                @php
                                                        $statusClass = '';
                                                        switch ($item->approve_atasan1) {
                                                            case 'approved':
                                                                $statusClass = 'badge-success';
                                                                break;
                                                            case 'pending':
                                                                $statusClass = 'badge-warning';
                                                                break;
                                                            case 'rejected':
                                                                $statusClass = 'badge-danger';
                                                                break;
                                                            default:
                                                                $statusClass = 'badge-secondary';
                                                        }
                                                    @endphp
                                                    <span class="badge {{ $statusClass }}">
                                                        {{ $item->approve_atasan1 }}
                                                    </span>
                                            </td>
                                            <td><a href="{{ route('pemesanan.edit', $item) }}"
                                                class="btn fa-regular fa-pen-to-square bg-warning p-2 text-white"
                                                data-toggle="tooltip" title="Edit Pemesanan"></a> 
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data Pemesanan belum Tersedia.
                                        </div>
                                    @endforelse
                                </tbody>
                                </table>
                                <!-- PAGINATION (Hilangi -- nya)-->
                                {{ $pemesanan->links('pagination::bootstrap-4') }}

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
