@extends('adminlte::page')

@section('title', 'Website Smk')

@section('content_header')
    <h1>Pengeluaran Sekolah</h1>
@stop

@section('content')
    @php
        date_default_timezone_set('asia/jakarta');
        $tanggal = date('d/m/Y H:i');
    @endphp
    <div class="container-fluid mt--7">
        @if (\Session::has('success'))
            <div class="alert alert-success" id="alertInfo">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="form-group d-flex justify-content-end align-items-center">
                    <button id="btnTambah" class="btn btn-primary">
                        <i class="fa fa-plus" style="font-size:20px;"></i>&nbsp;Tambah
                    </button>
                </div>
                <table class="table table-bordered table-hover">
                    <thead class="text-center text-bold">
                        <tr>
                            <td>TANGGAL</td>
                            <td>UNIT</td>
                            <td>TOTAL</td>
                            <td>PENANGGUNG JAWAB</td>
                            <td>AKSI</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengeluaransekolah as $ps)
                            <tr>
                                <td>{{ $ps->tanggal }}</td>
                                <td>{{ $ps->unit }}</td>
                                <td>Rp.{{ $ps->total }},00</td>
                                <td>{{ $ps->penanggung_jawab }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary" id="btnEdit"
                                        data-id="{{ $ps->id }}">Edit</a>
                                    <a href="#" class="btn btn-danger" id="btnDelete"
                                        data-id="{{ $ps->id }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pengeluaran</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('pengeluaran.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="text" name="tanggal" class="form-control" id="tambahTanggal"
                                    value="{{ $tanggal }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="unit">Unit</label>
                                <input type="text" class="form-control" name="unit" id="tambahUnit"
                                    aria-describedby="emailHelp" placeholder="Masukkan unit">
                            </div>
                            <div class="form-group">
                                <label for="total">Total</label>
                                <input type="text" class="form-control" name="total" id="tambahTotal"
                                    aria-describedby="emailHelp" placeholder="Masukkan total">
                            </div>
                            <div class="form-group">
                                <label for="penanggung_jawab">Penanggung jawab</label>
                                <input type="text" class="form-control" name="penanggung_jawab"
                                    id="tambahPenanggungJawab" placeholder="Masukkan penanggung jawab">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Pengeluaran</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('pengeluaran.update') }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="id" name="id">
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="text" name="tanggal" class="form-control" id="tanggal"
                                    aria-describedby="emailHelp" placeholder="Masukkan tanggal" readonly>
                            </div>
                            <div class="form-group">
                                <label for="unit">Unit</label>
                                <input type="text" class="form-control" name="unit" id="unit"
                                    aria-describedby="emailHelp" placeholder="Masukkan unit">
                            </div>
                            <div class="form-group">
                                <label for="total">Total</label>
                                <input type="text" class="form-control" name="total" id="total"
                                    aria-describedby="emailHelp" placeholder="Masukkan total">
                            </div>
                            <div class="form-group">
                                <label for="penanggung_jawab">Penanggung jawab</label>
                                <input type="text" class="form-control" name="penanggung_jawab" id="penanggung_jawab"
                                    placeholder="Masukkan penanggung jawab">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="shortcut icon" href="{{asset('assets/icon.png')}}" type="image/x-icon">
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

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

            $(document).on('click', '#btnTambah', function(e) {
                e.preventDefault();
                $('#tambahModal').modal('show');
            });

            $(document).on('click', '#btnEdit', function(e) {
                e.preventDefault();
                let id = $(this).attr('data-id');
                $('#edit').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/pengeluaran/" + id,
                    data: {
                        id: "id"
                    },
                    success: function(response) {
                        $.each(response, function(index, val) {
                            $('#id').val(val.id);
                            $('#tanggal').val(val.tanggal);
                            $('#unit').val(val.unit);
                            $('#total').val(val.total);
                            $('#penanggung_jawab').val(val.penanggung_jawab);
                        });
                    }
                });
            });

            $(document).on('click', '#btnDelete', function(e) {
                e.preventDefault();
                let id = $(this).attr('data-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        $.ajax({
                            type: "DELETE",
                            url: "/pengeluaran/" + id,
                            data: {
                                "id": id
                            },
                            success: function(response) {
                                location.reload();
                            }
                        });
                    }
                })
            });
        });
    </script>
@stop
