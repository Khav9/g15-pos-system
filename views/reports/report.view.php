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
                                                <td>
                                                      <a href="/reportView?id=<?= $order[0] ?>" class="btn btn-primary">View</a>
                                                      <a href="/reportPrint?id=<?= $order[0] ?>" class="btn btn-primary">Print</a>
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