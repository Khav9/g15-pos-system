<?php
require "../../layouts/header.php";

?>


<script>
    function GetPrint() {
        window.print();
    }
</script>
<div class="container px-4">
    <div class="card mt-4">
        <div class="card-body">
            <h3 style="text-align:center">Generate</h3>
            <table style="width:100%; margin-bottom:20px;">
                <tbody>
                    <tr>
                        <td class="text-align:center">
                            <h4 style="font-size:13px; line-height:30px; margin:0px; padding:0;">Name: Nana</h4>
                            <h4 style="font-size:13px; line-height:30px; margin:0px; padding:0;">Email: Nana@gmail.com
                            </h4>
                            <h4 style="font-size:13px; line-height:30px; margin:0px; padding:0;">Address: KPT</h4>
                        </td>
                        <td align="end">
                            <h4 style="font-size:13px; line-height:30px; margin:0px;margin-left:70%; padding:0;">CusID:
                                01</h4>
                            <h4 style="font-size:13px; line-height:30px; margin:0px; padding:0;">Date: 01/12/2024</h4>
                            <h4 style="font-size:13px; line-height:30px; margin:0px; padding:0;">Barcode: 123</h4>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="form-table">
                <form action="">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Product in stock</th>
                                <th scope="col">Earnings</th>
                                <th scope="col">Category</th>
                                <th scope="col">Top Product</th>
                                <th scope="col">User</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>515</th>
                                <td>215,000$</td>
                                <td>19</td>
                                <td>10</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <th>515</th>
                                <td>215,000$</td>
                                <td>19</td>
                                <td>10</td>
                                <td>10</td>
                            </tr>

                        </tbody>
                    </table>
                </form>
                <div style="text-align:left" class="">
                    <h5 style="font-size:15px">Cash Amount: 5000$</h5>
                    <p style="font-size:12px">Subtotal : 150$</p>
                    <p style="font-size:12px">Total : 5550$</p>
                </div>
                
                <div class=" btn d-flex justify-content-end">
                    <button type="button" class="btn btn-primary btn-sm" onclick="GetPrint()">Print</button>
                </div>
            </div>
        </div>
    </div>
</div>