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
                    $attributes = array('id' => 'FrmEditProduct', 'method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes);
                    ?>
                    

                    <div class="form-group row">
                        <label for="Name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="product_id" name="product_id" value=" <?= $data_product->product_id; ?>">
                            <input type="text" class="form-control" id="name" name="name" value=" <?= $data_product->name; ?>">
                            <small class="text-danger">
                                <?php echo form_error('name') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Merchant" class="col-sm-2 col-form-label">Merchant</label>
                        <div class="col-sm-10">
                            <select id="merchant_id" name="merchant_id" class="form-control" value="<?= $data_product->merchant_id; ?>">
                                <option value="">Pilih Merchant</option>
                                <?php foreach($merchant as $row):?>
                                <option value="<?php echo $row->merchant_id;?>"><?php echo $row->merchant_name;?></option>
                                <?php endforeach;?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('merchant_id') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Price" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="price" name="price" value=" <?= $data_product->price; ?>">
                            <small class="text-danger">
                                <?php echo form_error('price') ?>
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