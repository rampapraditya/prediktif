<?php echo $this->extend("template/index"); ?>
<?php echo $this->section("content"); ?>
<script>
    
</script>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Personil <small>Ganti data personil</small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row" style="display: block;">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_content">
                        <form class="form-horizontal form-label-left" action="<?php echo base_url('korps/update') ?>" method="POST">
                            <input type="hidden" id="id" name="id" value="<?php echo $list->idpersonil; ?>">
                            <div class="item form-group">
                                <label class="col-form-label col-md-2 col-sm-2 label-align" for="nrp">NRP</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <input type="text" id="nrp" name="nrp" required="required" class="form-control" value="<?php echo $list->nrp; ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2 col-sm-2 label-align" for="nama">Nama</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <input type="text" id="nama" name="nrp" required="required" class="form-control" value="<?php echo $list->nama; ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2 col-sm-2 label-align" for="nama">Korps</label>
                                <div class="col-md-10 col-sm-10 ">
                                    
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2 col-sm-2 label-align" for="nama">Pangkat</label>
                                <div class="col-md-10 col-sm-10 ">
                                    
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2 col-sm-2 label-align" for="nama">Satker</label>
                                <div class="col-md-10 col-sm-10 ">
                                    
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