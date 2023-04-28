@extends('adminlte::page')

@section('title', 'Website Smk')

@section('content_header')
    <h1>Absen Siswa</h1>
@stop

@section('content')
    @php
        date_default_timezone_set('asia/jakarta');
        $date = date('d/m/Y H:i');
        $no = 1;
    @endphp
    @if (\Session::has('success'))
        <div class="alert alert-success" id="alertInfo">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif
    <form action="{{ route('absensiswa.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tanggal">Tanggal Dan Jam</label>
                    <input type="text" name="tanggal" id="tanggal" class="form-control" value="{{ $date }}"
                        readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama">Nama Siswa</label>
                    <input type="text" name="nama" id=nama class="form-control" value="{{ $user->name }}" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" name="kelas" id="kelas" class="form-control" value="{{ $user->kelas }}"
                        readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="noAbsen">No Absen</label>
                    <input type="text" name="noAbsen" id="noAbsen" class="form-control" value="{{ $user->no_absen }}"
                        readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="deskripsi">Bagaimana Hari Ini?</label>
                    <textarea name="deskripsi" id="deskripsi" cols="10" rows="5" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group d-flex justify-content-center align-items-center">
            <input type="submit" class="btn btn-success" value="Submit">
        </div>
    </form>
    <div class="row mt-5">
        <div class="col-md-12">
            <table class="table table-bordered table-striped table-hover p-3">
                <thead class="text-center">
                    <tr>
                        <th>NO</th>
                        <th>TANGGAL ABSEN</th>
                        <th>NAMA SISWA</th>
                        <th>KELAS</th>
                        <th>NO ABSEN</th>
                        <th>DESKRIPSI</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($absensis as $absensi)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $absensi->tanggal }}</td>
                            <td>{{ $absensi->nama_siswa }}</td>
                            <td>{{ $absensi->kelas }}</td>
                            <td>{{ $absensi->no_absen }}</td>
                            <td>{{ $absensi->deskripsi }}</td>
                            <td>
                                <button class="btn btn-primary" id="btnEdit" data-id="{{ $absensi->id }}">EDIT</button>
                                &nbsp;
                                <button class="btn btn-danger" id="btnDelete" data-id="{{ $absensi->id }}">DELETE</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <form action="{{ route('absensiswa.update') }}" method="post">
        <div class="modal fade" id="absenEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Data Absensi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="id" name="id">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Dan Jam</label>
                                    <input type="text" id="tanggalEdit" name="tanggal" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama Siswa</label>
                                    <input type="text" name="nama" id="namaEdit" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <input type="text" name="kelas" id="kelasEdit" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="noAbsen">No Absen</label>
                                    <input type="text" name="noAbsen" id="noAbsenEdit" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="deskripsi">Bagaimana Hari Ini?</label>
                                    <textarea name="deskripsi" id="deskripsiEdit" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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

            $(document).on('click', '#btnEdit', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                $('#absenEdit').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/absensiswa/" + id,
                    data: {
                        "id": id
                    },
                    success: function(response) {
                        $.each(response, function(index, val) {
                            $('#id').val(val.id);
                            $('#tanggalEdit').val(val.tanggal);
                            $('#namaEdit').val(val.nama_siswa);
                            $('#kelasEdit').val(val.kelas);
                            $('#noAbsenEdit').val(val.no_absen);
                            $('#deskripsiEdit').val(val.deskripsi);
                        });
                    }
                });
            });

            $(document).on('click', '#btnDelete', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
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
                            url: "/absensiswa/" + id,
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
