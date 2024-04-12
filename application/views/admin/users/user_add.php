<div class="row">
  <div class="col-md-8">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
          <div class="d-flex justify-content-between align-items-center px-3">
            <h6 class="text-white text-capitalize">USERS</h6>
            <a href="<?= base_url('admin/users/add'); ?>">
              <button type="button" class="btn btn-success">Add User</button>
            </a>
          </div>
        </div>
      </div>
      <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">

                        <?php echo form_open(base_url('admin/users/add'));  ?>
                        <div class="form-row">
                            <div class="mb-3">
                                <label for="firstname">First Name</label>
                                <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name">
                            </div>
                            <div class="mb-3">
                                <label for="lastname">Last Name</label>
                                <input type="text" name="lastname" class="form-control" id="lastname" placeholder="">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="mobile_no">Mobile No</label>

                            <input type="number" name="mobile_no" class="form-control" id="mobile_no" placeholder="">
                        </div>
                        <div class="form-row">
                            <div class="mb-3">
                                <label for="password">Password</label>

                                <input type="password" name="password" class="form-control" id="password" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="role">Select Role</label>
                                <select name="user_role" class="form-control">
                                    <option value="">Select Role</option>
                                    <?php

                                    $role_fetch_data = $this->user_model->role_fetch();
                                    foreach ($role_fetch_data as $data) { ?>
                                        <option value="<?php echo $data['id']; ?>"><?php echo $data['role_name']; ?></option>
                                    <?php } ?>


                                </select>
                            </div>

                        </div>
                        <br>

                        <input type="submit" class="btn  btn-primary" name="submit" value="Add User">

                        <?php echo form_close(); ?>
                    
            </div>
            <!-- [ sample-page ] end -->
        </div>

    </form>

