@extends('adminlte::page')

@section('title', 'Tambah Coba ')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Coba</h1>
@stop

@section('content')
    <form action="{{ route('cobas.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <div class="form-group">
                            <label for="teks">teks</label>
                            <input type="text" autocomplete="off" class="form-control @error('teks') is-invalid @enderror"
                                id="teks" placeholder="teks" name="teks" value="{{ old('teks') }}">
                            @error('teks')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tanggal">tanggal</label>
                            <input type="date" autocomplete="off"
                                class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                placeholder="tanggal" name="tanggal" value="{{ old('tanggal') }}">
                            @error('tanggal')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="pilihan">pilihan</label>
                            <select name="pilihan" class="form-control" id="pilihan">
                                <option value="XXX">Jenis</option>
                                @foreach ($pilihans as $pilihan)
                                    <option value={{ $pilihan->kode }}>{{ $pilihan->desc }}</option>
                                @endforeach
                            </select>
                            @error('pilihan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group" id="tr">
                        </div>
                        <button class="btn btn-default" type="button" id="add-transaksi">
                            {{-- <span class="mdi mdi-plus-circle"></span> --}}Upload File
                        </button>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('cobas.index') }}" class="btn btn-default">
                            Batal
                        </a>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>
@stop


@push('js')
    <script>
        $('#add-transaksi').on('click', function(e) {
            // var tag = document.createElement("p");
            // var text = ('<input name="kas_keluar[]" class="form-control money" type="text" data-kas="keluar" id="kas-keluar`+i+`" data-id="`+i+`">');
            // tag.appendChild(text);
            // var element = document.getElementById("tr");
            // element.appendChild(tag);


            var x = '<div class="mb-3"> <label for="formFile" class="form-label">Default file input example</label>  <input class="form-control" type="file" name="files[]" id="formFile"></div>'
            $('#tr').append(x);

        });
    </script>
@endpush
