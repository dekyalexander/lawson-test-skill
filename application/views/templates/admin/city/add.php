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
                    $attributes = array('id' => 'FrmAddCity', 'method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes);
                    ?>

                    <div class="form-group row">
                        <label for="Nama" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value=" <?= set_value('name'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('name') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Longitude" class="col-sm-2 col-form-label">Longitude</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="longitude" name="longitude" rows="3"><?= set_value('longitude'); ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('longitude') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Latitude" class="col-sm-2 col-form-label">Latitude</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="latitude" name="latitude" rows="3"><?= set_value('latitude'); ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('latitude') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-secondary" href="javascript:window.history.go(-1);">Kembali</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>