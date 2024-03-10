<?php
require "layouts/header.php";
require "layouts/navbar.php";
?>
<div class="container-fluid">
      <div class="card-shadow ">
            <div class="card-header py-3 d-flex justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Reports</h6>
                  <div class="calendar-date">
                        <input type="date" name="date" id="date" />
                  </div>
                  <div class="select-product ">
                        <label for="product">Select Status:</label>
                        <select id="pay" name="pay">
                              <option>Status</option>
                              <option>Onlinepayment</option>
                              <option>Credit Card</option>
                        </select>
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
                                          <th>Tracking</th>
                                          <th>CusName</th>
                                          <th>CusPhone</th>
                                          <th>Date</th>
                                          <th>Status</th>
                                          <th>Payment</th>
                                          <th>Action</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    <tr>
                                          <td>1</td>
                                          <td>Laty</td>
                                          <td>Apple</td>
                                          <td>123456789</td>
                                          <td>22 March 2024</td>
                                          <td>12</td>
                                          <td>150$</td>
                                          <td>
                                                <a href="/reportView" class="btn btn-primary">View</a>
                                                <a href="/reportPrint" class="btn btn-primary">Print</a>
                                          </td>
                                    </tr>
                                    <tr>
                                          <td>2</td>
                                          <td>Thona</td>
                                          <td>Orange</td>
                                          <td>3456789</td>
                                          <td>1 April 2024</td>
                                          <td>10</td>
                                          <td>1000$</td>

                                          <td>
                                                <a href="/reportView" class="btn btn-primary">View</a>
                                                <a href="/reportPrint" class="btn btn-primary">Print</a>
                                          </td>
                                    </tr>
                                    <tr>
                                          <td>3</td>
                                          <td>Thida</td>
                                          <td>Fast food</td>
                                          <td>98654232</td>
                                          <td>Dec 30 2024</td>
                                          <td>50</td>
                                          <td>100$</td>

                                          <td>
                                                <a href="/reportView" class="btn btn-primary">View</a>
                                                <a href="/reportPrint" class="btn btn-primary">Print</a>
                                          </td>
                                    </tr>
                                    <tr>
                                          <td>4</td>
                                          <td>Sovanarith</td>
                                          <td>Drinks</td>
                                          <td>67854332</td>
                                          <td>14 April 2024</td>
                                          <td>15</td>
                                          <td>50$</td>

                                          <td>
                                                <a href="/reportView" class="btn btn-primary">View</a>
                                                <a href="/reportPrint" class="btn btn-primary">Print</a>
                                          </td>
                                    </tr>
                                    <tr>
                                          <td>5</td>
                                          <td>Khav</td>
                                          <td>Coffee</td>
                                          <td>43217899</td>
                                          <td>14 Feb 2024</td>
                                          <td>1</td>
                                          <td>5$</td>

                                          <td>
                                                <a href="/reportView" class="btn btn-primary">View</a>
                                                <a href="/reportPrint" class="btn btn-primary">Print</a>
                                          </td>
                                    </tr>
                              </tbody>

                        </table>
                  </div>
            </div>
      </div>
</div>

<?php
require "layouts/footer.php"
      ?>