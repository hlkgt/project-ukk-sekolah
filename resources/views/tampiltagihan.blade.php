@extends('adminlte::page')

@section('title', 'Website Smk')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Administrasi Bulanan</h1>
    </div>
@stop

@section('content')
    @if (\Session::has('success'))
        <div class="alert alert-success" id="alertInfo">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        @foreach ($siswa as $sw)
                            <tr>
                                <td>Nama</td>
                                <td>{{ $sw->name }}</td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>{{ $sw->kelas }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr class="text-center">
                                <td>BULAN</td>
                                <td>TAHUN</td>
                                <td>STATUS</td>
                                <td>TOTAL TAGIHAN</td>
                                <td>AKSI</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tagihan as $tgh)
                                <tr>
                                    <td>{{ $tgh->bulan }}</td>
                                    <td>{{ $tgh->tahun }}</td>
                                    <td>{{ $tgh->status_pembayaran }}</td>
                                    <td>{{ $tgh->total_tagihan }}</td>
                                    <td class="text-center">
                                        @if ($tgh->status_pembayaran === 'Belum Bayar')
                                            <a href="#" data-id="{{ $tgh->id }}" id="btnBayar"
                                                class="btn btn-danger">Bayar</a>
                                        @else
                                            <a href="#" data-id="{{ $tgh->id }}" id="btnCancelBayar"
                                                class="btn btn-success">Cancel</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('bulanan.index') }}" class="btn btn-primary mt-3">Back</a>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('bulanan.update') }}" method="post">
        <div class="modal fade" id="modalPembayaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label class="form-label">Bulan Yang Akan Dibayar</label>
                            <input type="text" name="bulan" id="bulan" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun</label>
                            <input type="text" name="tahun" id="tahun" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status Pembayaran</label>
                            <input type="text" name="status" id="status" class="form-control" value="Sudah Dibayar"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Total Tagihan</label>
                            <input type="text" name="tagihan" id="tagihan" class="form-control" value="Lunas"
                                readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Bayar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="{{ route('bulanan.cancel') }}" method="post">
        <div class="modal fade" id="modalCancelPembayaran" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="cancelId">
                        <div class="mb-3">
                            <label class="form-label">Bulan Yang Akan Dibayar</label>
                            <input type="text" name="bulan" id="cancelBulan" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun</label>
                            <input type="text" name="tahun" id="cancelTahun" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status Pembayaran</label>
                            <input type="text" name="status" id="status" class="form-control"
                                value="Belum Bayar" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Total Tagihan</label>
                            <input type="text" name="tagihan" id="tagihan" class="form-control" value="125.000"
                                readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Cancel</button>
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

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>

    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            setTimeout(function() {
                $('#alertInfo').remove();
            }, 2000);

            $(document).on('click', '#btnBayar', function(e) {
                e.preventDefault();
                let id = $(this).attr('data-id');
                $('#modalPembayaran').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/bulanan/get/" + id,
                    data: {
                        "id": id
                    },
                    success: function(response) {
                        $.each(response, function(index, val) {
                            $('#id').val(val.id);
                            $('#bulan').val(val.bulan);
                            $('#tahun').val(val.tahun);
                        });
                    }
                });
            });

            $(document).on('click', '#btnCancelBayar', function(e) {
                e.preventDefault();
                let id = $(this).attr('data-id');
                $('#modalCancelPembayaran').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/bulanan/get/" + id,
                    data: {
                        "id": id
                    },
                    success: function(response) {
                        $.each(response, function(index, val) {
                            $('#cancelId').val(val.id);
                            $('#cancelBulan').val(val.bulan);
                            $('#cancelTahun').val(val.tahun);
                        });
                    }
                });
            });
        });
    </script>
@stop
