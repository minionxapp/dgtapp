@extends('adminlte::page')

@section('title', 'Edit Coba')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Coba</h1>
@stop

@section('content')
    <form action="{{ route('cobas.update', $coba) }}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="teks">teks</label>
                            <input type="text" autocomplete="off" class="form-control @error('teks') is-invalid @enderror"
                                id="teks" placeholder="teks" name="teks" value="{{ $coba->teks ?? old('teks') }}">
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
                                    @if ($pilihan->kode == $coba->kode)
                                        <option selected="selected" value={{ $pilihan->kode }}>{{ $pilihan->desc }}</option>
                                    @else
                                        <option value={{ $pilihan->kode }}>{{ $pilihan->desc }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('pilihan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group" id="tr">
                            @foreach ($files as $file)
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                     <a href="/upload/task/{{ $file->file_name }}" class="btn btn-primary">{{ $file->file_real_name }}</a>
                                    <button onclick="cobaHapusFile('{{ Crypt::encrypt($file->id)}}')" type="button" class="btn btn-warning">X</button>
                                </div>



                            @endforeach

                        </div>
                        
                        <button class="btn btn-default" type="button" id="add-transaksi">Add File
                            <span class="mdi mdi-plus-circle"></span>
                        </button>

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
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function hapusFile(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus File ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

        // function showModal() {
        //     $('#formUpload').modal('show');
            
        // }

        function cobaHapusFile(id){
            $.ajax({
                        url: '/cobas/hapusfile/'+id,
                        type: 'get',
                        // data: fd,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            alert(response);
                            // if (response != 0) {
                            //     alert('file uploaded');
                            // } else {
                            //     alert('file not uploaded');
                            // }
                            // $('#formUpload').modal('hide');
                        },
                    });
        }
    </script>
@endpush