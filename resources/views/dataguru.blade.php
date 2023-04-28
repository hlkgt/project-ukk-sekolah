@extends('adminlte::page')

@section('title', 'Website Smk')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Data Guru</h1>
        <button id="btnTambah" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
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
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <td>NIP</td>
                                <td>NAMA</td>
                                <td>ALAMAT</td>
                                <td>MAPEL</td>
                                <td>KODE GURU</td>
                                <td>AKSI</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataguru as $dg)
                                <tr>
                                    <td>{{ $dg->nip }}</td>
                                    <td>{{ $dg->nama }}</td>
                                    <td>{{ $dg->alamat }}</td>
                                    <td>{{ $dg->mapel }}</td>
                                    <td>{{ $dg->kode_guru }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary" id="btnEdit"
                                            data-id="{{ $dg->id }}">Edit</a>
                                        <a href="#" class="btn btn-danger" id="btnDelete"
                                            data-id="{{ $dg->id }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('dataguru.store') }}" method="post">
        <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Guru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="tambahNip" class="form-label">NIP</label>
                            <input type="text" name="nip" id="tambahNip" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="tambahNama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="tambahNama" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="tambahAlamat" class="form-label">Alamat</label>
                            <input type="text" name="alamat" id="tambahAlamat" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="tambahMapel" class="form-label">Mapel</label>
                            <input type="text" name="mapel" id="tambahMapel" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="tambahKodeGuru" class="form-label">Kode Guru</label>
                            <input type="text" name="kodeGuru" id="tambahKodeGuru" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form action="{{ route('dataguru.update') }}" method="post">
        <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Data Guru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="tambahNip" class="form-label">NIP</label>
                            <input type="text" name="nip" id="editNip" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="tambahNama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="editNama" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="tambahAlamat" class="form-label">Alamat</label>
                            <input type="text" name="alamat" id="editAlamat" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="tambahMapel" class="form-label">Mapel</label>
                            <input type="text" name="mapel" id="editMapel" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="tambahKodeGuru" class="form-label">Kode Guru</label>
                            <input type="text" name="kodeGuru" id="editKodeGuru" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
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

            $(document).on('click', '#btnTambah', function(e) {
                e.preventDefault();
                $('#modalTambah').modal('show');
            });

            $(document).on('click', '#btnEdit', function(e) {
                e.preventDefault();
                let id = $(this).attr('data-id');
                $('#modalEdit').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/dataguru/" + id,
                    data: {
                        "id": id
                    },
                    success: function(response) {
                        $.each(response, function (index, val) {
                            $('#id').val(val.id);
                            $('#editNip').val(val.nip);
                            $('#editNama').val(val.nama);
                            $('#editAlamat').val(val.alamat);
                            $('#editMapel').val(val.mapel);
                            $('#editKodeGuru').val(val.kode_guru);
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
                            type: "delete",
                            url: "/dataguru/" + id,
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
