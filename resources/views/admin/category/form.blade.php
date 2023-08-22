@extends('layouts.admin')
@section('head')
<!-- plugin css for this page -->

<link rel="stylesheet" href="{{ asset('assets/vendors/dropify/dist/dropify.min.css') }}">

<style>
    .feather-icon{
        width: 16px;
        height: 16px;
        margin-right:2px;
    }
</style>
@endsection
@section('scripts')
    <!-- plugin js for this page -->
  <!-- plugin js for this page -->
	<script src="{{ asset('assets/vendors/tinymce/tinymce.min.js') }}"></script>
	<!-- endinject -->
	<!-- custom js for this page -->
	<script src="{{ asset('assets/js/tinymce.js') }}"></script>
    
	<script src="{{ asset('assets/vendors/dropify/dist/dropify.min.js') }}"></script>
	<!-- custom js for this page -->
	<script src="{{ asset('assets/js/dropify.js') }}"></script>
@endsection
 
@section('content')
<div class="page-content">
    <div class="row mb-2">
        <div class="col-md-2 ">
            <a href="{{ route('admin.category.index') }}" class="btn btn-outline-success btn-sm"><i class="feather-icon" data-feather="chevron-left"></i> Kembali</a>
        </div>
        <div class="col-md-10 text-right">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">
                        @if (@$edit_mode)
                            Form Edit - {{ $detail->title }}
                        @else
                            Form Tambah Category
                        @endif
                    </h6>
                    <form action="{{ @$edit_mode ? route('admin.category.update', ['id' => $detail->id]) : route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (@$edit_mode)
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="exampleInputText1">Nama</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan Nama Product" value="{{ @$edit_mode ? $detail->name : old('name') }}">
                            @error('name')
                                <label id="name-error" class="error mt-2 text-danger" for="name">{{$message}}</label>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="image">Gambar</label>
                            <input type="file" id="myDropify" name="image" class="border @error('image') is-invalid @enderror" data-default-file="{{ @$edit_mode ? asset('uploads/' . $detail->image) : '' }}"/>
                            @error('image')
                                <label id="image-error" class="error mt-2 text-danger" for="image">{{$message}}</label>
                            @enderror
                        </div>
                        
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

