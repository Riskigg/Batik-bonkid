@extends('layouts.admin')
@section('head')
<!-- plugin css for this page -->

<link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
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
  <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endsection
 
@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-md-10">
            <nav class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List Category</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-2 text-right">
            <a href="{{ route('admin.category.create') }}" class="btn btn-primary btn-sm"><i class="feather-icon" data-feather="plus-circle"></i> Add category</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <table id="dataTableExample" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td><img src="{{ asset('uploads/'.$item->image) }}" alt=""> </td>
                            <td class="text-right">
                                <form action="{{ route('admin.category.destroy',$item->id) }}" method="POST">
    
                                    <a class="btn btn-sm btn-success" href="{{ route('admin.category.edit',$item->id) }}">Edit</a>
                     
                                    @csrf
                                    @method('DELETE')
                        
                                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>    
                        @endforeach
                    
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>

</div>
@endsection

