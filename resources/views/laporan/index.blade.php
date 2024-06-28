@extends('layouts.master')

@section('title')
    Laporan Inventory Masuk
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('/AdminLTE-2/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endpush

@section('breadcrumb')
    @parent
    <li class="active">Laporan</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <button onclick="updatePeriode()" class="btn btn-info btn-s btn-flat"><i class="fa fa-plus-circle"></i> Ubah Periode</button>
                <a href="{{ route('laporan.export.pdf', [$tanggalAwal, $tanggalAkhir]) }}" class="btn btn-danger btn-s btn-flat"><i class="fa fa-file-pdf-o"></i> Export PDF</a>
            </div>
            <div class="box-header with-border">
                <b>Dari Tanggal   :    {{ tanggal_indonesia($tanggalAwal, false) }}</b>  
            </div>
            <div class="box-header with-border">
                <b>Sampai Tanggal   :    {{ tanggal_indonesia($tanggalAkhir, false) }}</b>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-stiped table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>Nama Barang</th>
                        <th>Tanggal Masuk</th>
                        <th>Jumlah Masuk</th>
                        <th>Nama Supplier</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@includeIf('laporan.form')
@endsection

@push('scripts')
<script src="{{ asset('/AdminLTE-2/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script>
    let table;

    $(function () {
        table = $('.table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('laporan.data', [$tanggalAwal, $tanggalAkhir]) }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'nama_produk'},
                {data: 'tanggal'},
                {data: 'jumlahMasuk'},
                {data: 'nama'},

            ],
            dom: 'Brt',
            bSort: false,
            bPaginate: false,
        });

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    });

    function updatePeriode() {
        $('#modal-form').modal('show');
    }
</script>
@endpush