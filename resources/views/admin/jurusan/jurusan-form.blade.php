@extends('admin.admin-dashboard')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <x-breadcrumb sub="Jurusan" icon="bx bx-dna" subsub="{{ isset($edit) ? 'Edit' : 'Tambah' }}" />

        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form {{ isset($edit) ? 'Edit' : 'Tambah' }} Jurusan</h4>
                            </div>
                            <div class="card-body">
                                <form id="myForm" action="{{ isset($edit) ? route('jurusan.update', $edit->id) : route('jurusan.store') }}" method="POST">
                                    @csrf
                                    @if (isset($edit))
                                        @method('PATCH')
                                        <input type="hidden" value="{{ $edit->id }}" name="id" />
                                    @endif
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nama Jurusan</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="nama_jurusan" class="form-control" value="{{ old('nama_jurusan', isset($edit) ? $edit->nama_jurusan : '') }}" placeholder="Nama Jurusan"/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Kode Jurusan</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="kode_jurusan" class="form-control" value="{{ old('kode_jurusan', isset($edit) ? $edit->kode_jurusan : '') }}" placeholder="Kode Jurusan"/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Deskripsi Jurusan</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Jurusan">{{ old('deskripsi', isset($edit) ? $edit->deskripsi : '') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary" style="text-align: right;">
                                            <input type="submit" class="btn btn-success px-4" value="{{ isset($edit) ? 'Ubah Jurusan' : 'Tambah Jurusan' }}" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#myForm').validate({
                rules: {
                    nama_jurusan: {
                        required : true,
                    },
                    kode_jurusan: {
                        required : true,
                    },
                    deskripsi: {
                        required : true,
                    },
                },
                messages: {
                    nama_jurusan: {
                        required : 'Masukkan Nama Jurusan',
                    },
                    kode_jurusan: {
                        required : 'Masukkan Kode Jurusan',
                    },
                    deskripsi: {
                        required : 'Masukkan Deskripsi Jurusan',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error,element){
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection
