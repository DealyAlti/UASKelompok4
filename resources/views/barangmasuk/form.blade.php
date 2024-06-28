<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post')

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="form group row">
                        <label for="id_produk" class="col-lg-2 col-lg-offset-1 control-label">Nama Produk</label>
                            <div class="col-md-8">
                                <select name="id_produk" id="id_produk" class="form-control"required>
                                <option  value="">Pilih Nama Produk</option>
                                @foreach ($produk as $key => $item)
                                    <option value="{{ $key }}">{{$item}}</option>
                                @endforeach
                                </select>
                                <span class="help-block with-errors"></span>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal" class="col-lg-2 col-lg-offset-1 control-label">Tanggal Masuk</label>
                        <div class="col-lg-8">
                            <input type="date" name="tanggal" id="tanggal" class="form-control" required autofocus max="{{ date('Y-m-d') }}">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlahMasuk" class="col-lg-2 col-lg-offset-1 control-label">Jumlah Masuk</label>
                        <div class="col-lg-8">
                            <input type="number" name="jumlahMasuk" id="jumlahMasuk" class="form-control" required autofocus min=1>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form group row">
                        <label for="id_supplier" class="col-lg-2 col-lg-offset-1 control-label">Nama Supplier</label>
                            <div class="col-md-8">
                                <select name="id_supplier" id="id_supplier" class="form-control"required>
                                <option  value="">Pilih Nama Supplier</option>
                                @foreach ($supplier as $key => $item)
                                    <option value="{{ $key }}">{{$item}}</option>
                                @endforeach
                                </select>
                                <span class="help-block with-errors"></span>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label for="penerima_barang" class="col-lg-2 col-lg-offset-1 control-label">Penerima</label>
                        <div class="col-lg-8">
                            <input type="text" name="penerima_barang" id="penerima_barang" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
            
                <div class="modal-footer">
                    <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>