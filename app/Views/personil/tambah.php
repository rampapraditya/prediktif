<?php echo $this->extend("template/index"); ?>
<?php echo $this->section("content"); ?>
<script>
    
</script>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Personil <small>Tambah data personil</small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row" style="display: block;">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_content">
                        <form class="form-horizontal form-label-left" action="<?php echo base_url('personil/create') ?>" method="POST">
                            <div class="item form-group">
                                <label class="col-form-label col-md-2 col-sm-2 label-align" for="nrp">NRP</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <input type="text" id="nrp" name="nrp" required class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2 col-sm-2 label-align" for="nama">Nama Personil</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <input type="text" id="nama" name="nama" required class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2 col-sm-2 label-align" for="korps">Korps</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <select id="korps" name="korps" class="form-control">
                                        <option value="-">- Pilih Korps -</option>
                                        <?php
                                        foreach ($korps as $row) {
                                            ?>
                                        <option value="<?php echo $row->idkorps; ?>"><?php echo $row->namakorps; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2 col-sm-2 label-align" for="satker">Satker</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <select id="satker" name="satker" class="form-control">
                                        <option value="-">- Pilih Satker -</option>
                                        <?php
                                        foreach ($satker as $row) {
                                            ?>
                                        <option value="<?php echo $row->idsatker; ?>"><?php echo $row->namasatker; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2 col-sm-2 label-align" for="pangkat">Pangkat</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <select id="pangkat" name="pangkat" class="form-control">
                                        <option value="-">- Pilih Pangkat -</option>
                                        <?php
                                        foreach ($pangkat as $row) {
                                            ?>
                                        <option value="<?php echo $row->idpangkat; ?>"><?php echo $row->namapangkat; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-10 col-sm-10 offset-md-2">
                                    <button type="submit" class="btn btn-sm btn-success">Submit</button>
                                    <button type="reset" class="btn btn-sm btn-secondary">Reset</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<?php echo $this->endSection(); ?>