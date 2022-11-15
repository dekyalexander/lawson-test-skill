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
                    $attributes = array('id' => 'FrmAddOrderStatus', 'method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes);
                    ?>

                    <div class="form-group row">
                        <label for="Status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select id="status_id" name="status_id" class="form-control" value="<?= set_value('status_id'); ?>">
                                <option value="">Pilih Status</option>
                                <?php foreach($status as $row):?>
                                <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                                <?php endforeach;?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('status_id') ?>
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