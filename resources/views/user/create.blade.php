@extends('layouts.app')

@section('title', 'Pemesanan')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Buat Pemesanan</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 shadow rounded">
                            <div class="card-body">
                            <form action="{{{ route('pemesanan.store') }}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama Kendaraan</label>
                                        <select name="id_kendaraan" id="id_kendaraan" class="form-control">
                                                <option value="" selected disabled>Pilih Kendaraan</option>
                                                @foreach ($kendaraan as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_kendaraan
                                                     }}</option>
                                                @endforeach
                                            </select>
                                        @error('nama_kendaraan')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold">Driver</label>
                                            <select name="driver" id="driver" class="form-control">
                                                <option value="" selected disabled>Pilih Driver</option>
                                                    @foreach ($driver as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                            </select>
                                            @error('driver')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
    
                                        <div class="form-group">
                                            <label class="font-weight-bold">Yang Menyetujui </label>
                                            <select name="atasan2" id="atasan2" class="form-control">
                                            <option value="" selected disabled>Yang Menyetujui</option>
                                               @foreach ($atasan2 as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                            </select>
                                            @error('Yang Menyetujui')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold">Atasan Yang Menyetejui</label>
                                            <select name="atasan1" id="atasan1" class="form-control">
                                            <option value="" selected disabled>Atasan Yang Menyetujui</option>
                                               @foreach ($atasan1 as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                            </select>
                                            @error('atasan1')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Tanggal Mulai </label>
                                            <input name="tanggal_mulai" type="date" class="form-control"  placeholder="Masukkan Tanggal Mulai...">
                                            @error('tanggal_mulai')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Tanggal Akhir </label>
                                            <input name="tanggal_akhir" type="date" class="form-control"  placeholder="Masukkan Tanggal Akhir...">
                                            @error('tanggal_akhir')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold">Asal</label>
                                            <select name="asal" id="asal" class="form-control">
                                            <option value="" selected disabled>Asal</option>
                                               @foreach ($region as $item)
                                                    <option value="{{$item->id}}">{{$item->nama_region}}</option>
                                                    @endforeach
                                            </select>
                                            @error('asal')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold">Tujuan</label>
                                            <select name="tujuan" id="asal" class="form-control">
                                            <option value="" selected disabled>Tujuan</option>
                                               @foreach ($region as $item)
                                                    <option value="{{$item->id}}">{{$item->nama_region}}</option>
                                                    @endforeach
                                            </select>
                                            @error('tujuan')
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