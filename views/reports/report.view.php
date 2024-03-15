<?php
require "layouts/header.php";
require "layouts/navbar.php";
?>
<div class="container-fluid">
      <div class="card-shadow ">
            <div class="card-header py-3 d-flex justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Reports</h6>
                  <div class="select-product ">
                        <input type="date" name="date" id="date" />

                        <div class="btn">
                              <a href="/reports" class="btn btn-primary">Filter</a>
                              <a href="/reports" class="btn btn-danger">Reset</a>
                        </div>
                  </div>
            </div>
            <div class="card-body">
                  <div class="table-responsive">
                        <table id="dataTable" class="table table-bordered mt-2 mb-2">

                              <thead class="bg-primary text-white">
                                    <tr>
                                          <th>SI No.</th>
                                          <th>Customer</th>
                                          <th>Items</th>
                                          <th>Total</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    <?php
                                    foreach ($orders as $key => $order) :
                                    ?>
                                          <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?php echo  $order[7]; ?></td>
                                                <td><?= $order[4] ?></td>
                                                <td><?= $order[2] ?></td>
                                                <td>Status</td>
                                                <td class=" text-center">
                                                      <a href="/reportView?id=<?= $order[0] ?>" class="btn btn-primary btn-sm text-dark"><i class="fa fa-eye"></i></a>
                                                      <a href="/reportPrint?id=<?= $order[0] ?>" class="btn btn-primary btn-sm text-dark"><i class="fa fa-print" aria-hidden="true"></i></a>
                                                      <a href="?id=<?= $order[0] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </td>
                                          </tr>
                                    <?php
                                    endforeach;
                                    ?>
                              </tbody>

                        </table>
                  </div>
            </div>
      </div>
</div>

<?php
require "layouts/footer.php"
?>