<?php echo $this->extend("template/index"); ?>
<?php echo $this->section("content"); ?>
<script>
    function tambah(){
        window.location.href = "<?php echo base_url('korps/tambah') ?>";
    }

    function edit(id){
        window.location.href = "<?php echo base_url('korps/ganti/') ?>" + id;
    }

    function hapus(id, nama){
        if (confirm("Apakah Anda yakin ingin menghapus " + nama  + " ?")) {
            window.location.href = "<?php echo base_url('korps/hapus/') ?>" + id;
        }
    }

</script>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Korps <small>Maintenance data korps</small></h3>
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
                                    <th>Nama Korps</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($list as $row) {
                                    ?>
                                <tr>
                                    <th><?php echo $no; ?></th>
                                    <th><?php echo $row->namakorps; ?></th>
                                    <th>
                                        <button type="button" class="btn btn-sm btn-success" onclick="edit('<?php echo $row->idkorps; ?>');">Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="hapus('<?php echo $row->idkorps; ?>', '<?php echo $row->namakorps; ?>');">Hapus</button>
                                    </th>
                                </tr>
                                    <?php
                                    $no++;
                                }
                                ?>
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