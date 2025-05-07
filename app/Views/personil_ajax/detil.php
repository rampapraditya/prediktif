<?php echo $this->extend("template/index"); ?>
<?php echo $this->section("content"); ?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Pendidikan Formal <small>Maintenance data pend formal</small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row" style="display: block;">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="form-horizontal form-label-left">
                            <div class="item form-group">
                                <label class="col-form-label col-md-2 col-sm-2 label-align" >Nama Personil</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <input type="text" class="form-control" readonly value="<?php echo $head->nama.', NRP : '. $head->nrp; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <button type="button" class="btn btn-sm btn-primary" onclick="tambah();">Tambah</button>
                        <button type="button" class="btn btn-sm btn-secondary">Reload</button>
                    </div>
                    <div class="x_content">
                        <table id="tb" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tempat Pendidikan</th>
                                    <th>Tahun</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_form">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body">
                <form id="form">
                    <input type="hidden" id="kode" name="kode">
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="form-label">NRP</label>
                            <input type="text" id="nrp" name="nrp" class="form-control" placeholder="NRP" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="form-label">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Personil" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="form-label">Korps</label>
                            <select id="korps" name="korps" class="form-control">
                                <option value="">-- Pilih Korps --</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="form-label">Pangkat</label>
                            <select id="pangkat" name="pangkat" class="form-control">
                                <option value="">-- Pilih Pangkat --</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="form-label">Satker</label>
                            <select id="satker" name="satker" class="form-control">
                                <option value="">-- Pilih Satker --</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
                <button id="btnSave" type="button" class="btn btn-sm btn-primary" onclick="save();">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- /page content -->
<script type="text/javascript">
    
    

</script>
<?php echo $this->endSection(); ?>