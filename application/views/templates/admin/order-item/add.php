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
                    $attributes = array('id' => 'FrmAddOrderItem', 'method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes);
                    ?>

                    <div class="form-group row">
                        <label for="Date" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="date" name="date" value=" <?= set_value('date'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('date') ?>
                            </small>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="Order Status" class="col-sm-2 col-form-label">Order Status</label>
                        <div class="col-sm-10">
                            <select id="order_id" name="order_id" class="form-control" value="<?= set_value('order_id'); ?>">
                                <option value="">Pilih Order Status</option>
                                <?php foreach($order as $row):?>
                                <option value="<?php echo $row->order_id;?>"><?php echo $row->order_id;?></option>
                                <?php endforeach;?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('order_id') ?>
                            </small>
                        </div>
                    </div>


                    

                    <div class="form-group row">
                        <label for="Quantity" class="col-sm-2 col-form-label">Quantity</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="quantity" name="quantity" value=" <?= set_value('quantity'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('quantity') ?>
                            </small>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="User" class="col-sm-2 col-form-label">User</label>
                        <div class="col-sm-10">
                            <select id="user_id" name="user_id" class="form-control" value="<?= set_value('user_id'); ?>">
                                <option value="">Pilih User</option>
                                <?php foreach($user as $row):?>
                                <option value="<?php echo $row->id;?>"><?php echo $row->full_name;?></option>
                                <?php endforeach;?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('user_id') ?>
                            </small>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="Product" class="col-sm-2 col-form-label">Product</label>
                        <div class="col-sm-10">
                            <select id="product_id" name="product_id" class="form-control" value="<?= set_value('product_id'); ?>">
                                <option value="">Pilih Product</option>
                                <?php foreach($product as $row):?>
                                <option value="<?php echo $row->product_id;?>"><?php echo $row->name;?></option>
                                <?php endforeach;?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('product_id') ?>
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