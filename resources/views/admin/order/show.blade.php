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
            <a href="{{ route('admin.order.index') }}" class="btn btn-outline-success btn-sm"><i class="feather-icon" data-feather="chevron-left"></i> Kembali</a>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputText1">Nama</label>
                    <h6>{{ $detail->name }}</h6>
                </div>
                <div class="form-group">
                    <label for="exampleInputText1">Alamat</label>
                    <h6>{{ $detail->address }}</h6>
                </div>
                <div class="form-group">
                    <label for="exampleInputText1">Nohp</label>
                    <h6>{{ $detail->phone }}</h6>
                </div>
                <h4 class="mt-4">List Pesanan</h4>
                <hr>
                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>QTY</th>
                        <th class="text-right">Price</th>
                        <th class="text-right">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($detail->detail_order as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->qty }}</td>
                            <td class="text-right">Rp. {{ number_format($item->price) }}</td>
                            <td class="text-right">Rp. {{ number_format($item->subtotal) }}</td>
                        </tr>    
                        @endforeach
                        <tr class="bg-warning">
                            <td colspan="4" class="text-right">Total</td>
                            <td class="text-right">Rp. {{ number_format($detail->total) }}</td>
                        </tr>
                    
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>

</div>
@endsection

