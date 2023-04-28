@extends('adminlte::page')

@section('title', 'Website Smk')

@section('content_header')
    <h1 class="text-center">SMKN 1 DLANGGU</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('assets/icon.png') }}" alt="logo" width="300" height="300">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <img src="{{ asset('assets/bg-login.jpg') }}" class="bg-cover" alt="foto sekolah" width="500"
                        height="300">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <p class="text-justify">Menghasilkan tamatan yang profesional,kompetitif secara nasional dan
                        internasional, beriman dn bertaqwa serta cinta tanah air dan mampu berwirausaha</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <ul>
                        <li>Melaksanakan kurikulum berstandar kompetensi untuk menyiapkan tamatan yang siap pakai di dunia
                            kerja.</li>
                        <li>Meningkatkan professional dan akuntabilitas SMKN 1 Dlanggu sebagai pusat pendidikan yang
                            berstandar nasional.</li>
                        <li>Meningkatkan profesionalisme tenaga pendidik yang mempunyai kompetensi sesuai dengan bidang
                            keahlian.</li>
                        <li>Meningkatkan kualitas tamatan yang menguasai teknologi yang dilansadi iman dan taqwa.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
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
@stop
