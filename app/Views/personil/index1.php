<?php echo $this->extend("template/index"); ?>
<?php echo $this->section("content"); ?>
<script>
    function tambah(){
        window.location.href = "<?php echo base_url('personil/tambah') ?>";
    }

    function edit(id){
        window.location.href = "<?php echo base_url('personil/ganti/') ?>" + id;
    }

    function hapus(id, nama){
        if (confirm("Apakah Anda yakin ingin menghapus " + nama  + " ?")) {
            window.location.href = "<?php echo base_url('personil/hapus/') ?>" + id;
        }
    }

</script>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Personil <small>Maintenance data personil</small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row" style="display: block;">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <button type="button" class="btn btn-sm btn-primary" onclick="tambah();">Tambah</button>
                        <button type="button" class="btn btn-sm btn-secondary">Reload</button>
                    </div>
                    <div class="x_content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NRP</th>
                                    <th>Nama</th>
                                    <th>Korps</th>
                                    <th>Pangkat</th>
                                    <th>Satker</th>
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
<!-- /page content -->
<?php echo $this->endSection(); ?>