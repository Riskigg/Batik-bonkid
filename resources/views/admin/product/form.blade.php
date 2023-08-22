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
            <a href="{{ route('admin.product.index') }}" class="btn btn-outline-success btn-sm"><i class="feather-icon" data-feather="chevron-left"></i> Kembali</a>
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
                            Form Tambah Product
                        @endif
                    </h6>
                    <form action="{{ @$edit_mode ? route('admin.product.update', ['id' => $detail->id]) : route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (@$edit_mode)
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="exampleInputText1">Nama</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan Nama Produk" value="{{ @$edit_mode ? $detail->name : old('name') }}">
                            @error('name')
                                <label id="name-error" class="error mt-2 text-danger" for="name">{{$message}}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputText1">Deskripsi</label>
                            <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control @error('deskripsi') is-invalid @enderror">{{ @$edit_mode ? $detail->deskripsi : old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <label id="deskripsi-error" class="error mt-2 text-danger" for="deskripsi">{{$message}}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputText1">Harga</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Masukan Harga" value="{{ @$edit_mode ? $detail->price : old('price') }}">
                            @error('price')
                                <label id="price-error" class="error mt-2 text-danger" for="price">{{$message}}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputText1">Category</label>
                            <select name="category_id" id="" class="form-select @error('category_id') is-invalid @enderror">
                                @if (@$edit_mode)
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}" {{ ($detail->category_id == $item->id) ? "selected":"";}}>{{ $item->name }}</option>
                                        
                                    @endforeach
                                @else
                                    @foreach ($category as $item)
                                    <option value="{{ $item->id }}" {{ (old('category_id') == $item->id) ? "selected":"";}}>{{ $item->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('category_id')
                                <label id="category_id-error" class="error mt-2 text-danger" for="category_id">{{$message}}</label>
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

