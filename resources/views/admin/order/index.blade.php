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
                    <li class="breadcrumb-item"><a href="#">Order</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List Order</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-2 text-right">

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
                        <th>Address</th>
                        <th>Phone</th>
                        <th class="text-right">Total</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->phone }}</td>
                            <td class="text-right">Rp. {{ number_format($item->total) }}</td>
                            <td class="text-right">
                                <a class="btn btn-sm btn-success" href="{{ route('admin.order.show',$item->id) }}">Detail</a>
                                
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

