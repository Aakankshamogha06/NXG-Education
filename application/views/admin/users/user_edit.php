<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h5>Add User</h5>
                        <?php if(isset($msg) || validation_errors() !== ''): ?>
                          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <?= validation_errors();?>
                  <?= isset($msg)? $msg: ''; ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						</div>
              <?php endif; ?>
                    </div>
                    
                    <?php echo form_open(base_url('admin/users/edit/'.$user['id']) )?> 
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="firstname" >First Name</label>
                                <input type="text" name="firstname" value="<?= $user['firstname']; ?>" class="form-control" id="firstname" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="lastname" >Last Name</label>
                                <input type="text" name="lastname" value="<?= $user['lastname']; ?>" class="form-control" id="lastname" placeholder="">
                                </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="email" >Email</label>
                            <input type="email" name="email" value="<?= $user['email']; ?>" class="form-control" id="email" placeholder="">
                            </div>
                            <div class="form-group col-md-6" >
                            <label for="mobile_no" >Mobile No</label>

                            <input type="number" name="mobile_no" value="<?= $user['mobile_no']; ?>" class="form-control" id="mobile_no" placeholder="">
                            </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                                <label for="role" >Select Role</label>
                                <select name="user_role" class="form-control">
                    <option value="">Select Role</option>
                    <?php
                    
                    $role_fetch_data = $this->user_model->role_fetch();
                    foreach ($role_fetch_data as $data) {?>
                     <option value="<?php echo $data['id']; ?>"<?php if ($data['id'] === $user['is_admin']) echo 'selected="selected"'?>><?php echo $data['role_name']; ?></option>
                      <?php } ?>

                    
                  </select>
                                </div>
                               
                            </div>
                            <input type="submit" class="btn  btn-primary" name="submit" value="Update User">
                           
                            <?php echo form_close( ); ?>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
