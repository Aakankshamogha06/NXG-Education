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
          <table class="table align-items-center justify-content-center mb-0">
            <thead>
              <tr>
                <th>Sr No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Mobile No.</th>
                <th>Role</th>
                <th style="width: 150px;" class="text-right">Option</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $c = 1;
                foreach ($all_users as $row) : ?>
                <tr>
                  <td><?= $c++; ?></td>
                  <td><?= $row['firstname']; ?></td>
                  <td><?= $row['lastname']; ?></td>
                  <td><?= $row['email']; ?></td>
                  <td><?= $row['mobile_no']; ?></td>
                  <td><span class="btn btn-primary btn-sm"><?= $row['is_admin']; ?><span></td>
                  <td class="text-right">
                    <!-- <a href="<?= base_url('admin/users/edit/' . $row['id']); ?>"  style="font-size:40px; color:blue;"><i class="material-icons opacity-10">edit</i></a>  -->
                    <a href="<?= base_url('admin/users/del/' . $row['id']); ?> <?= ($row['is_admin'] == 1) ? 'disabled' : '' ?>" style="font-size:40px; color:red;" onclick="return confirm('Are you sure want to delete ?');"><i class="material-icons opacity-10">delete</i></a>
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
