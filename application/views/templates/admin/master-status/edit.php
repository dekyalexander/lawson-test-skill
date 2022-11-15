<div class="container pt-5">
    <h3><?= $title ?></h3>
    <hr class="col-2 float-left" style="border-top: 8px solid #bbb; border-radius: 5px;">
    <br>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('id' => 'FrmEditMasterStatus', 'method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes);
                    ?>
                    

                    <div class="form-group row">
                        <label for="Nama" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="id" name="id" value=" <?= $data_master_status->id; ?>">
                            <input type="text" class="form-control" id="name" name="name" value=" <?= $data_master_status->name; ?>">
                            <small class="text-danger">
                                <?php echo form_error('name') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="description" name="description" rows="3"><?= $data_master_status->description; ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('description') ?>
                            </small>
                        </div>
                    </div>

                   
                    <div class="form-group row">
                        <div class="col-sm-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>