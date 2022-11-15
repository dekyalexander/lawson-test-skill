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
                    $attributes = array('id' => 'FrmEditUsers', 'method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes);
                    ?>

                    <div class="form-group row">
                        <label for="Date Of Birth" class="col-sm-2 col-form-label">Date Of Birth</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="id" name="id" value=" <?= $data_users->id; ?>">
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value=" <?= $data_users->date_of_birth; ?>">
                            <small class="text-danger">
                                <?php echo form_error('date_of_birth') ?>
                            </small>
                        </div>
                    </div>
                    

                    <div class="form-group row">
                        <label for="Full Name" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="full_name" name="full_name" value=" <?= $data_users->full_name; ?>">
                            <small class="text-danger">
                                <?php echo form_error('full_name') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="address" name="address" rows="3"><?= $data_users->address; ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('address') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Phone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="phone" name="phone" value=" <?= $data_users->phone; ?>">
                            <small class="text-danger">
                                <?php echo form_error('phone') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" value=" <?= $data_users->email; ?>">
                            <small class="text-danger">
                                <?php echo form_error('email') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Active" class="col-sm-2 col-form-label">Active</label>
                        <div class="col-sm-10">
                            <select id="active" name="active" class="form-control" value="<?= $data_users->active; ?>">
                                <option value="">Pilih Status Active</option>
                                <option value="1">Active</option>
                                <option value="2">Tidak Active</option>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('active') ?>
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