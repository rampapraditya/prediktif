<?php echo $this->extend("template/index"); ?>
<?php echo $this->section("content"); ?>

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
                        <table id="tb" class="table table-striped table-bordered">
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
                                <?php foreach ($korps as $row): ?>
                                    <option value="<?php echo $row->idkorps; ?>"><?php echo $row->namakorps; ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="form-label">Pangkat</label>
                            <select id="pangkat" name="pangkat" class="form-control">
                                <option value="">-- Pilih Pangkat --</option>
                                <?php foreach ($pangkat as $row): ?>
                                    <option value="<?php echo $row->idpangkat; ?>"><?php echo $row->namapangkat; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="form-label">Satker</label>
                            <select id="satker" name="satker" class="form-control">
                                <option value="">-- Pilih Satker --</option>
                                <?php foreach ($satker as $row): ?>
                                    <option value="<?php echo $row->idsatker; ?>"><?php echo $row->namasatker; ?></option>
                                <?php endforeach; ?>
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
    
    var save_method; //for save method string
    var table;

    $(document).ready(function () {
        table = $('#tb').DataTable({
            ajax: "<?php echo base_url('personilajax/ajaxlist'); ?>",
            ordering:false
        });
    });

    function tambah(){
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('.modal-title').text('Tambah Data'); // Set Title to Bootstrap modal title
        $('#modal_form').modal('show'); // show bootstrap modal
    }

    function save(){
        var url;
        if(save_method == 'add') {
            url = "<?php echo base_url('personilajax/ajax_add'); ?>";
        } else {
            url = "<?php echo base_url('personilajax/ajax_edit'); ?>";
        }

        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data) {
                alert(data.status);
                $('#modal_form').modal('hide');
                table.ajax.reload(null,false); //reload datatable ajax 
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data' + errorThrown);
            }
        });
    }

</script>
<?php echo $this->endSection(); ?>