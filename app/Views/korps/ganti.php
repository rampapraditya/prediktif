<?php echo $this->extend("template/index"); ?>
<?php echo $this->section("content"); ?>
<script>
    
</script>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Korps <small>Ganti data korps</small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row" style="display: block;">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_content">
                        <form class="form-horizontal form-label-left" action="<?php echo base_url('korps/update') ?>" method="POST">
                            <input type="hidden" id="id" name="id" value="<?php echo $list->idkorps; ?>">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_korps">Nama Korps</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="nama_korps" name="nama_korps" required="required" class="form-control" value="<?php echo $list->namakorps; ?>">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-md btn-success">Submit</button>
                                    <button type="reset" class="btn btn-md btn-secondary">Reset</button>
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