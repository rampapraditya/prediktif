<?php echo $this->extend("template/index"); ?>
<?php echo $this->section("content"); ?>
<script>
    
</script>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Pangkat <small>Tambah data pangkat</small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row" style="display: block;">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_content">
                        <form class="form-horizontal form-label-left" action="<?php echo base_url('pangkat/create') ?>" method="POST">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_pangkat">Nama Pangkat</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="nama_pangkat" name="nama_pangkat" required="required" class="form-control" autocomplete="off">
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