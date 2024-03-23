<?php
require "layouts/header.php";
require "layouts/navbar.php";

// Check if the date filter form is submitted
if ($_SESSION['user']['role'] === 'admin') {
      $orders = $ordersAdmin;
} else {
      $orders = $ordersUser;
}

$filteredOrders = $orders;
if (isset($_POST['filter'])) {
      $filteredOrders = [];
      // Get the input date
      $inputDate = $_POST['date'];
      foreach ($orders as $order) {
            if ($order['date'] == $inputDate) {
                  $filteredOrders[] = $order;
            }
      }
} 
?>

<div class="container-fluid">
      <div class="card-shadow ">
            <div class="card-header py-3 d-flex justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Reports</h6>
                  <form method="post">
                        <div class="select-product">
                              <input type="date" name="date" id="date" />
                              <div class="btn">
                                    <button type="submit" name="filter" class="btn btn-primary btn-sm">Filter</button>
                                    <a href="/reports" class="btn btn-danger btn-sm">Reset</a>
                              </div>
                        </div>
                  </form>
            </div>
            <div class="card-body">
                  <div class="table-responsive">
                        <table id="dataTable" class="table table-bordered mt-2 mb-2">
                              <thead class="bg-primary text-white">
                                    <tr>
                                          <th scope="col">SI No.</th>
                                          <th scope="col">Seller</th>
                                          <th scope="col">Items</th>
                                          <th scope="col">Total</th>
                                          <th scope="col">Status</th>
                                          <th scope="col">Action</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    <?php foreach ($filteredOrders as $key => $order) : ?>
                                          <tr>
                                                <th scope="row"><?= $key + 1 ?></th>
                                                <td><?php echo  $order[7]; ?></td>
                                                <td><?= $order[4] ?></td>
                                                <td><?= $order[2] ?></td>
                                                <td><?= $order['status'] ?></td>
                                                <td class=" text-center">
                                                      <a href="/reportView?id=<?= $order[0] ?>" class="btn btn-primary btn-sm text-white"><i class="fa fa-eye"></i></a>
                                                      <a href="/reportPrint?id=<?= $order[0] ?>" class="btn btn-primary btn-sm text-white"><i class="fa fa-print" aria-hidden="true"></i></a>
                                                      <a href="?id=<?= $order[0] ?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteOrder<?= $order[0] ?>"><i class="fa fa-trash"></i></a>
                                                </td>
                                          </tr>
                                          <!-- Modal delete-->
                                          <div class="modal fade" id="deleteOrder<?= $order[0] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                      <div class="modal-content">
                                                            <div class="modal-header">
                                                                  <h5 class="modal-title text-danger" id="exampleModalLabel">Delete</h5>
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                  </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                  <p>Are you sure you want to delete product order by "<span class="text-primary font-weight-bold"><?= $order[7] ?></span> " ?</p>
                                                                  <div class="modal-footer">
                                                                        <form action="controllers/reports/report.delete.controller.php" class="" method="post">
                                                                              <input type="hidden" name="id" value="<?= $order[0] ?>">
                                                                              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                                        </form>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                    <?php endforeach; ?>
                              </tbody>
                        </table>
                  </div>
            </div>
      </div>
</div>

<?php
require "layouts/footer.php"
?>