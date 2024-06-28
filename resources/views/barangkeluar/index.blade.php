@extends('layouts.master')

@section('title')
    Riwayat Barang Keluar
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Riwayat Barang Keluar</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <button onclick="addForm('{{ route('barangkeluar.store') }}')" class="btn btn-success btn-s btn-flat"><i class="fa fa-plus-circle"></i>Tambah Barang Keluar</button>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-stiped table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>Nama Produk</th>
                        <th>Tanggal Keluar</th>
                        <th>Jumlah Keluar</th>
                        <th>Penerima Barang</th>
                        <th>Keterangan Barang <th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@includeIf('barangkeluar.form')
@endsection

@push('scripts')
<script>
    let table;

    $(function () {
        table = $('.table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('barangkeluar.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'nama_produk'},
                {data: 'tanggal'},
                {data: 'jumlahKeluar'},
                {data: 'penerima'},
                {data: 'keterangan'},
                
            ]
        });

        $('#modal-form').validator().on('submit', function (e) {
            if (! e.preventDefault()) {
                $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
                    .done((response) => {
                        $('#modal-form').modal('hide');
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        alert('Tidak dapat menyimpan data');
                        return;
                    });
            }
        });
    });

    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Barang Keluar');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=jumlahKeluar]').focus();
        $('#modal-form [name=penerima]').focus();
        $('#modal-form [name=keterangan]').focus();
    }

</script>
@endpush