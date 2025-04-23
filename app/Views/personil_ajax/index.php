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
                        <button type="button" class="btn btn-sm btn-primary" onclick="add();">Tambah</button>
                        <button type="button" class="btn btn-sm btn-secondary">Reload</button>
                    </div>
                    <div class="x_content">
                        <table id="tb" class="table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
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
                            <input type="text" id="nrp" name="nrp" class="form-control" placeholder="Jabatan" autocomplete="off">
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



<script type="text/javascript">

    var save_method; //for save method string
    var table;

    $(document).ready(function () {
        table = $('#tb').DataTable({
            ajax: "<?php echo base_url(); ?>personilajax/ajaxlist",
            ordering:false
        });
    });

    function reload() {
        table.ajax.reload(null, false);
    }

    function add() {
        save_method = 'add';
        $('#form')[0].reset();
        $('#modal_form').modal('show');
        $('.modal-title').text('Tambah personil');
    }

    function save() {
        var kode = document.getElementById('kode').value;
        var nama = document.getElementById('nama').value;

        if (nama === '') {
            iziToast.error({
                title: 'Error',
                message: "Nama jabatan tidak boleh kosong",
                position: 'topRight'
            });
        }else{
            $('#btnSave').text('Menyimpan...');
            $('#btnSave').attr('disabled', true);

            var url = "";
            if (save_method === 'add') {
                url = "<?php echo base_url(); ?>jabatan/ajax_add";
            } else {
                url = "<?php echo base_url(); ?>jabatan/ajax_edit";
            }
        
            var form_data = new FormData();
            form_data.append('kode', kode);
            form_data.append('nama', nama);
            
            $.ajax({
                url: url,
                dataType: 'JSON',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'POST',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));    
                },success: function (response, status, xhr) {
                    var csrfToken = xhr.getResponseHeader('X-CSRF-TOKEN');
                    $('meta[name="csrf-token"]').attr('content', csrfToken);

                    iziToast.success({
                        title: 'Info',
                        message: response.status,
                        position: 'topRight'
                    });
                    reload();
                    $('#modal_form').modal('hide');

                    $('#btnSave').text('Simpan');
                    $('#btnSave').attr('disabled', false);

                }, error: function (response, status, xhr) {
                    var csrfToken = xhr.getResponseHeader('X-CSRF-TOKEN');
                    $('meta[name="csrf-token"]').attr('content', csrfToken);

                    iziToast.error({
                        title: 'Error',
                        message: "Error json " + errorThrown,
                        position: 'topRight'
                    });

                    $('#btnSave').text('Simpan');
                    $('#btnSave').attr('disabled', false);
                }
            });
        }
    }
    
    function hapus(id, nama) {
        iziToast.show({
            color: 'dark',
            icon: 'fas fa-question',
            title: 'Konfirmasi',
            message: 'Apakah yakin menghapus jabatan ' + nama + ' ?',
            position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
            progressBarColor: 'rgb(0, 255, 184)',
            buttons: [
                [
                    '<button>Ok</button>',
                    function (instance, toast) {
                        instance.hide({transitionOut: 'fadeOutUp'}, toast);

                        $.ajax({
                            url: "<?php echo base_url(); ?>jabatan/hapus/" + id,
                            type: "GET",
                            dataType: "JSON",
                            success: function (data) {
                                iziToast.success({
                                    title: 'Info',
                                    message: data.status,
                                    position: 'topRight'
                                });
                                reload();

                            }, error: function (jqXHR, textStatus, errorThrown) {
                                iziToast.error({
                                    title: 'Error',
                                    message: "Error json " + errorThrown,
                                    position: 'topRight'
                                });
                            }
                        });
                    }
                ],
                [
                    '<button>Close</button>',
                    function (instance, toast) {
                        instance.hide({transitionOut: 'fadeOutUp'}, toast);
                    }
                ]
            ]
        });
    }

    function ganti(id) {
        save_method = 'update';
        $('#form')[0].reset();
        $('#modal_form').modal('show');
        $('.modal-title').text('Ganti jabatan');
        $.ajax({
            url: "<?php echo base_url(); ?>jabatan/show/" + id,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('[name="kode"]').val(data.idjabatan);
                $('[name="nama"]').val(data.nama_jabatan);
            }, error: function (jqXHR, textStatus, errorThrown) {
                iziToast.error({
                    title: 'Error',
                    message: "Error json " + errorThrown,
                    position: 'topRight'
                });
            }
        });
    }
    
</script>

<?php echo $this->endSection(); ?>