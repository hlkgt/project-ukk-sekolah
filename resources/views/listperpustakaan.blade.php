@extends('adminlte::page')

@section('title', 'Website Smk')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Pinjam Buku Perpustakaan</h1>
        <button class="btn btn-primary mt-3 mb-2" id="btnTambah"><i class="fa fa-plus"></i>&nbsp;Pinjam</button>
    </div>
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
                                    <td><a href="#" data-id="{{ $list->id }}" class="btn btn-success"
                                            id="btnView">View More</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('pinjambuku.store') }}" method="post">
        <div class="modal fade" id="tambahPinjam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pinjam Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Tanggal Pinjam</label>
                            <input type="text" class="form-control" name="tanggal" id="tanggal"
                                value="{{ $date }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Kelas</label>
                            <select name="kelas" id="kelas" class="form-select">
                                <option style="display: none">Pilih Kelas</option>
                                <option value="X SIJA 1">X SIJA 1</option>
                                <option value="X SIJA 2">X SIJA 2</option>
                                <option value="XI SIJA 1">XI SIJA 1</option>
                                <option value="XI SIJA 2">XI SIJA 2</option>
                                <option value="XII SIJA 1">XII SIJA 1</option>
                                <option value="XII SIJA 2">XII SIJA 2</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Buku Yang Dipinjam</label>
                            <input type="text" class="form-control" name="bukuDipinjam" id="bukuDipinjam">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Penjaga</label>
                            <select name="namaPenjaga" id="namaPenjaga" class="form-select">
                                <option style="display: none">Pilih Penjaga</option>
                                <option value="Andika Firmansyah">Andika Firmansyah</option>
                                <option value="Ayupri Anggita">Ayupri Anggita</option>
                                <option value="Irvan Maulana">Irvan Maulana</option>
                                <option value="Leo Marselio">Leo Marselio</option>
                                <option value="Novarita Afrela">Novarita Afrela</option>
                                <option value="Printa Imelda">Printa Imelda</option>
                                <option value="Riska Agustina">Riska Agustina</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Status</label>
                            <input type="text" class="form-control" name="status" id="status"
                                value="Belum Dikembalikan" readonly>
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

    <div class="modal fade" id="modalView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View More</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row text-center">
                        <div class="col-md-3">
                            <div class="card">
                                <h5 class="card-header">ID</h5>
                                <div class="card-body">
                                    <p class="card-text" id="idShow"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <h5 class="card-header">TANGGAL PINJAM</h5>
                                <div class="card-body">
                                    <p class="card-text" id="tanggalPinjamShow"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <h5 class="card-header">NAMA</h5>
                                <div class="card-body">
                                    <p class="card-text" id="namaShow"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <h5 class="card-header">KELAS</h5>
                                <div class="card-body">
                                    <p class="card-text" id="kelasShow"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <h5 class="card-header">BUKU DIPINJAM</h5>
                                <div class="card-body">
                                    <p class="card-text" id="bukuDipinjamShow"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <h5 class="card-header">NAMA PENJAGA</h5>
                                <div class="card-body">
                                    <p class="card-text" id="namaPenjagaShow"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <h5 class="card-header">STATUS</h5>
                                <div class="card-body">
                                    <p class="card-text" id="statusShow"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <h5 class="card-header">PENGEMBALIAN</h5>
                                <div class="card-body">
                                    <p class="card-text" id="tanggalPengembalianShow"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Kembali</button>
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

    <script>
        $(function() {
            $('#btnTambah').click(function(e) {
                e.preventDefault();
                $('#tambahPinjam').modal('show');
            });

            setTimeout(() => {
                $('#alertInfo').remove();
            }, 2000);

            $(document).on('click', '#btnView', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                $('#modalView').modal('show');
                $.ajax({
                    type: "get",
                    url: "/pinjambuku/" + id,
                    data: {
                        "id": id
                    },
                    success: function(response) {
                        $.each(response, function(index, val) {
                            $('#idShow').html('');
                            $('#idShow').append(val.id);
                            $('#tanggalPinjamShow').html('');
                            $('#tanggalPinjamShow').append(val.tanggal);
                            $('#namaShow').html('');
                            $('#namaShow').append(val.nama);
                            $('#kelasShow').html('');
                            $('#kelasShow').append(val.kelas);
                            $('#bukuDipinjamShow').html('');
                            $('#bukuDipinjamShow').append(val.buku_dipinjam);
                            $('#namaPenjagaShow').html('');
                            $('#namaPenjagaShow').append(val.nama_penjaga);
                            $('#statusShow').html('');
                            $('#statusShow').append(val.status);
                            $('#tanggalPengembalianShow').html('');
                            $('#tanggalPengembalianShow').append(val.tanggal_dikembalikan);
                        });
                    }
                });
            });
        });
    </script>
@stop
