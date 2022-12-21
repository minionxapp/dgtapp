@extends('adminlte::page')

@section('title', 'Tambah Vm_perusahaan ')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Vm_perusahaan</h1>
@stop

@section('content')
    <form action="{{ route('vm_perusahaans.store') }}" method="post" {{-- enctype="multipart/form-data" --}}>
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nama">Nama Perusahaan</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('nama') is-invalid @enderror" id="nama"
                                        placeholder="nama" name="nama" value="{{ old('nama') }}">
                                    @error('nama')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                        placeholder="alamat" name="alamat" value="{{ old('alamat') }}">
                                    @error('alamat')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="telp">Telp</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('telp') is-invalid @enderror" id="telp"
                                        placeholder="telp" name="telp" value="{{ old('telp') }}">
                                    @error('telp')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        placeholder="email" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="ttd_spk">Tanda Tangan SPK</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('ttd_spk') is-invalid @enderror" id="ttd_spk"
                                        placeholder="ttd_spk" name="ttd_spk" value="{{ old('ttd_spk') }}">
                                    @error('ttd_spk')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="jabat_ttd">Jabatan Tanda Tangan</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('jabat_ttd') is-invalid @enderror" id="jabat_ttd"
                                        placeholder="jabat_ttd" name="jabat_ttd" value="{{ old('jabat_ttd') }}">
                                    @error('jabat_ttd')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="negosiator">Negosiator</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('negosiator') is-invalid @enderror" id="negosiator"
                                        placeholder="negosiator" name="negosiator" value="{{ old('negosiator') }}">
                                    @error('negosiator')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="jabat_negosiator">Jabatan Negosiator</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('jabat_negosiator') is-invalid @enderror"
                                        id="jabat_negosiator" placeholder="jabat_negosiator" name="jabat_negosiator"
                                        value="{{ old('jabat_negosiator') }}">
                                    @error('jabat_negosiator')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="telp_negosiator">Telp Negosiator</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('telp_negosiator') is-invalid @enderror"
                                        id="telp_negosiator" placeholder="telp_negosiator" name="telp_negosiator"
                                        value="{{ old('telp_negosiator') }}">
                                    @error('telp_negosiator')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                           
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="sts_padi">Status Padi</label>
                                    <select name="sts_padi" class="form-control" id="sts_padi">
                                        <option value="">Status Padi</option>
                                        @foreach ($sts_padis as $sts_padi)
                                            <option value={{ $sts_padi->kode }}>{{ $sts_padi->desc }}</option>
                                        @endforeach
                                    </select>
                                    @error('sts_padi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="sts_drm">Status DRM</label>
                                    <select name="sts_drm" class="form-control" id="sts_drm">
                                        <option value="">Status DRM</option>
                                        @foreach ($sts_drms as $sts_drm)
                                            <option value={{ $sts_drm->kode }}>{{ $sts_drm->desc }}</option>
                                        @endforeach
                                    </select>
                                    @error('sts_drm')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="sts_smap">Status SMAP</label>
                                    <select name="sts_smap" class="form-control" id="sts_smap">
                                        <option value="">Status SMAP</option>
                                        @foreach ($sts_smaps as $sts_smap)
                                            <option value={{ $sts_smap->kode }}>{{ $sts_smap->desc }}</option>
                                        @endforeach
                                    </select>
                                    @error('sts_smap')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="sts_pajak">Status Pajak</label>
                                    <select name="sts_pajak" class="form-control" id="sts_pajak">
                                        <option value="">Status Pajak</option>
                                        @foreach ($sts_pajaks as $sts_pajak)
                                            <option value={{ $sts_pajak->kode }}>{{ $sts_pajak->desc }}</option>
                                        @endforeach
                                    </select>
                                    @error('sts_pajak')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="link_file">File Link</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('link_file') is-invalid @enderror" id="link_file"
                                        placeholder="link_file" name="link_file" value="{{ old('link_file') }}">
                                    @error('link_file')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="rating">Rating</label>
                                    <input type="text" autocomplete="off"
                                        class="form-control @error('rating') is-invalid @enderror" id="rating"
                                        placeholder="rating" name="rating" value="{{ old('rating') }}">
                                    @error('rating')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('vm_perusahaans.index') }}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>
@stop
