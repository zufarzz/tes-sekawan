@extends('layouts.app')

@section('title', 'kendaraan')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Kendaraan {{ $kendaraan->nama_kendaraan }}</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 shadow rounded">
                            <div class="card-body">
                                <form action="{{{ route('kendaraan.update', $kendaraan) }}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama Kendaraan</label>
                                        <input name="nama_kendaraan" type="text" class="form-control" placeholder="Masukkan Nama Kendaraan..." value="{{ $kendaraan->nama_kendaraan }}">
                                        @error('nama_kendaraan')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold">Jenis Angkutan</label>
                                            <select name="jenis_angkutan" id="jenis_angkutan" class="form-control">
                                                <option value="" disabled>Pilih Jenis Angkutan</option>
                                                    <option value="orang" {{ $kendaraan->jenis_angkutan == "orang" ? 'selected': "" }}>Orang</option>
                                                    <option value="barang" {{ $kendaraan->jenis_angkutan == "barang" ? 'selected': "" }}>Barang</option>
                                            </select>
                                            @error('jenis_angkutan')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
    
                                        <div class="form-group">
                                            <label class="font-weight-bold">Kepemilikan </label>
                                            <select name="kepemilikan" id="kepemilikan" class="form-control">
                                                <option value="" selected disabled>Pilih Kepemilikan</option>
                                                    <option value="perusahaan" {{ $kendaraan->kepemilikan == "perusahaan" ? 'selected': ""}}>Perusahaan</option>
                                                    <option value="sewa" {{ $kendaraan->kepemilikan == "sewa" ? 'selected': ""}} >Sewa</option>
                                            </select>
                                            @error('kepemilikan')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold">Konsumsi BBM </label>
                                            <input name="konsumsi_bbm" type="number" class="form-control"  placeholder="Masukkan Konsumsi BBM..." value="{{ $kendaraan->konsumsi_bbm}}">
                                            @error('konsumsi_bbm')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Jadwal Servis </label>
                                            <input name="jadwal_servis" type="datetime-local" class="form-control"  placeholder="Masukkan Jadwal Servis..." value="{{ $kendaraan->jadwal_servis }}">
                                            @error('jadwal_servis')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
    
                                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                                        <button type="reset" class="btn btn-md btn-warning">RESET</button>
                                </form>

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
