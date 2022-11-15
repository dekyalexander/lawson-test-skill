<div class="container pt-5">
    <h3><?= $title ?></h3>
    <hr class="col-2 float-left" style="border-top: 8px solid #bbb; border-radius: 5px;">
    <br>
    <br>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary mb-2" href="<?= base_url('city_controller/add'); ?>">Tambah Data</a>
            <div mb-2>
                <!-- Menampilkan flashh data (pesan saat data berhasil disimpan)-->
                <?php if ($this->session->flashdata('message')) :
                    echo $this->session->flashdata('message');
                endif; ?>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="tableCity">
                            <thead>
                                <tr class="table-success">
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>LONGITUDE</th>
                                    <th>LATITUDE</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 $no = 1;
                                 foreach ($data_city as $row) : ?>
                                    <tr>
                                       <td><?= $no++ ?></td>
                                        <td><?= $row->name ?></td>
                                        <td><?= $row->longitude ?></td>
                                        <td><?= $row->latitude ?></td>
                                         <td>
                                            <a href="<?= site_url('city_controller/edit/' . $row->city_id) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> </a>
                                            <a href="javascript:void(0);" data="<?= $row->city_id?>" class="btn btn-danger btn-sm item-delete"><i class="fa fa-trash"></i> </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal dialog hapus data-->
<div class="modal fade" id="myModalDelete" tabindex="-1" aria-labelledby="myModalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalDeleteLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger" id="btdelete">Lanjutkan</button>
            </div>
        </div>
    </div>
</div>

<script>
    
    $('#tableCity').DataTable();

    
    $('#tableCity').on('click', '.item-delete', function() {
        
        var city_id = $(this).attr('data');
        $('#myModalDelete').modal('show');
        
        $('#btdelete').unbind().click(function() {
            $.ajax({
                type: 'ajax',
                method: 'get',
                async: false,
                url: '<?php echo base_url() ?>city_controller/delete/',
                data: {
                    city_id: city_id
                },
                dataType: 'json',
                success: function(response) {
                    $('#myModalDelete').modal('hide');
                    location.reload();
                }
            });
        });
    });
</script>