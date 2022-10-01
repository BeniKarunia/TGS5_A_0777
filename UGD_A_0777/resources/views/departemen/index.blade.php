@extends('dashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Departemen</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ url('departemen')}}">Departemen</a>
                    </li>
                    <li class="breadcrumb-item active">Index</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive p-0">
                            <table class="table table-hover textnowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama
                                            Departemen</th>
                                            <th class="text-center">Nama
                                                Manger</th>
<th class="text-center">Jumlah
Pegawai</th>
</tr>
</thead>
<tbody>
    @forelse ($departemen as $item)
    <tr>
        <td class="text-center">{{
            $item->nama_departemen }}</td>
            <td class="text-center">{{
                $item->nama_manager }}</td>
                <td class="text-center">{{
                    $item->jumlah_pegawai }}</td>
                </tr>
                @empty
                <div class="alert alert-danger">
                    Data Departemen belum tersedia
                </div>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
@endsection