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
                        <label for="Merchant Name" class="col-sm-2 col-form-label">Merchant Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="merchant_name" name="merchant_name" value=" <?= set_value('merchant_name'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('merchant_name') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="address" name="address" rows="3"><?= set_value('address'); ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('address') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Phone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="phone" name="phone" value=" <?= set_value('phone'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('phone') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="City" class="col-sm-2 col-form-label">City</label>
                        <div class="col-sm-10">
                            <select id="city_id" name="city_id" class="form-control" value="<?= set_value('city_id'); ?>">
                                <option value="">Pilih City</option>
                                <?php foreach($city as $row):?>
                                <option value="<?php echo $row->city_id;?>"><?php echo $row->name;?></option>
                                <?php endforeach;?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('city_id') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Expired Date" class="col-sm-2 col-form-label">Expired Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="expired_date" name="expired_date" value=" <?= set_value('expired_date'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('expired_date') ?>
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