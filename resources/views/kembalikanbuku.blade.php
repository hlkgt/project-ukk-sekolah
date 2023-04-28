@extends('adminlte::page')

@section('title', 'Website Smk')

@section('content_header')
    <h1>Pinjam Buku Perpustakaan</h1>
@stop

@section('content')
    @php
        date_default_timezone_set('asia/jakarta');
        $date = date('d/m/Y H:i');
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (\Session::has('success'))
                        <div class="alert alert-success" id="alertInfo">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="text-center">
                            <tr>
                                <th>NO</th>
                                <th>TANGGAL PINJAM</th>
                                <th>NAMA</th>
                                <th>BUKU DIPINJAM/BUAH</th>
                                <th>NAMA PENJAGA</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lists as $list)
                                <tr>
                                    <td>{{ $list->id }}</td>
                                    <td>{{ $list->tanggal }}</td>
                                    <td>{{ $list->nama }}</td>
                                    <td>{{ $list->buku_dipinjam }}</td>
                                    <td>{{ $list->nama_penjaga }}</td>
                                    <td>{{ $list->status }}</td>
                                    <td>
                                        @if ($list->status === 'Dikembalikan')
                                            <button type="button" data-id="{{ $list->id }}" class="btn btn-success"
                                                id="btnEdit" disabled>Sudah Dikembalikan</button>
                                    </td>
                                @else
                                    <button type="button" data-id="{{ $list->id }}" class="btn btn-danger"
                                        id="btnEdit">Kembalikan</button>
                            @endif
                            </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('kembaliUpdate') }}" method="post">
        <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Kembalikan Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" name="status" id="status" value="Dikembalikan" class="form-control"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="status">Tanggal Pengembalian</label>
                            <input type="text" name="tanggalPengembalian" id="tanggalPengembalian" class="form-control"
                                value="{{ $date }}" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@section('css')
    <link rel="shortcut icon" href="{{ asset('assets/icon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="/css/admin_custom.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(function() {
            setTimeout(() => {
                $('#alertInfo').remove();
            }, 2000);

            $(document).on('click', '#btnEdit', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                $('#modalEdit').modal('show');
                $.ajax({
                    type: "get",
                    url: "/kembalikanbuku/" + id,
                    data: {
                        "id": id
                    },
                    success: function(response) {
                        $.each(response, function(index, val) {
                            $('#id').val(val.id);
                        });
                    }
                });
            });
        });
    </script>
@stop
