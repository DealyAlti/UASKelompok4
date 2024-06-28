@extends('layouts.master')

@section('title')
    Riwayat Barang Masuk
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Riwayat Barang Masuk</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <button onclick="addForm('{{ route('barangmasuk.store') }}')" class="btn btn-success btn-s btn-flat"><i class="fa fa-plus-circle"></i>Tambah Barang Masuk</button>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-stiped table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>Nama Produk</th>
                        <th>Tanggal Masuk</th>
                        <th>Jumlah Masuk</th>
                        <th>Supplier</th>
                        <th>Penerima</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@includeIf('barangmasuk.form')
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
                url: '{{ route('barangmasuk.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'nama_produk'},
                {data: 'tanggal'},
                {data: 'jumlahMasuk'},
                {data: 'nama'},
                {data: 'penerima_barang'},
                
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
        $('#modal-form .modal-title').text('Tambah Barang Masuk');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=jumlahMasuk]').focus();
        $('#modal-form [name=penerima_barang]').focus();
    }

</script>
@endpush