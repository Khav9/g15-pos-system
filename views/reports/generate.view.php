
<?php
require_once("../../layouts/header.php");
require_once("../../controllers/reports/generate.controller.php");
?>
<link rel="stylesheet" href="../../vendor/style/generate.css">
<script>
    function GetPrint() {
        window.print();
    }

    function Download() {
        var content = document.documentElement.outerHTML;
        var blob = new Blob([content], {
            type: 'text/html'
        });
        var url = window.URL.createObjectURL(blob);
        var a = document.createElement('a');
        a.href = url;
        a.download = 'invoice.html';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        window.URL.revokeObjectURL(url);
    }
</script>
</head>
<body>
    <div class="invoice-wrapper" id="print-area">
        <div class="invoice">
            <div class="invoice-container">
                <div class="invoice-head">
                    <div class="invoice-head-to-left text-start">
                        <p><span class="text-bold">Date</span>: <?php echo $_SESSION['today'] ?></p>
                    </div>
                    <div class="invoice-head-middle-right text-center">
                        <h3>GENERATE REPORT</h3>
                    </div>
                </div>
                <div class="hr"></div>
                <div class="invoice-head-bottom">
                    <div class="invoice-head-bottom-left">
                        <ul>
                            <li class="text-bold">Invoice To:</li>
                            <li>Posystem</li>
                            <li>100 250 337</li>
                            <li>Phnom Penh</li>
                            <li>Cambodia</li>
                        </ul>
                    </div>
                    <div class="invoice-head-bottom-right">
                        <ul class="text-end">
                            <li class="text-bold">Pay To:</li>
                            <li>Posystem</li>
                            <li>0884321539</li>
                            <li>Phnom Penh</li>
                            <li>posystem@mail</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="py-3">
                <form action="#" method="post">
                    <div class="py-3 d-flex justify-content-between">
                        <div id="customDatesInputContainer  ">
                            <div>
                                <label for="startDate">Start Date:</label>
                                <input type="date" id="startDate" name="startDate" class="form-control">
                            </div>
                            <div>
                                <label for="dueDate">Due Date:</label>
                                <input type="date" id="dueDate" name="dueDate" class="form-control">
                            </div>
                        </div>
                        <div class="btn">
                            <button type="submit" name="report" class="btn btn-primary btn-sm">Get Report</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="overflow-view">
                <div class="invoice-body">
                    <table id="filteredTable">
                        <thead>
                            <tr>
                                <th scope="col">NO .</th>
                                <th scope="col">PRODUCT</th>
                                <th scope="col">QUANTITY</th>
                                <th scope="col">TOTAL</th>
                                <th scope="col">DATE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           
                            $subTotal = 0;
                            $total = 0;
                            $taxRate = 0.08;
                            foreach ($reports as $report) : ?>
                                <tr>
                                    <td><?= $report[0] ?></td>
                                    <td><?= $report['name'] ?></td>
                                    <td><?= $report['quantity'] ?></td>
                                    <td><?php echo '$' . $report['totalPrice'] ?></td>
                                    <td><?= $report['date'] ?></td>
                                    <td><?php ?></td>
                                </tr>
                            <?php
                                $subTotal += $report['totalPrice']; // Fixed subTotal calculation
                            endforeach;
                            $taxAmong = $subTotal * $taxRate; // Moved tax calculation out of loop
                            $total = $subTotal + $taxAmong;
                            ?>

                        </tbody>
                    </table>
                    <canvas id="myChart" width="990" height="495" style="display: block; height: 396px; width: 792px;" class="chartjs-render-monitor"></canvas>
                    <div class="invoice-body-bottom mt-4 text-right">
                        <div class="row justify-content-end">
                            <div class="col-8">
                                <div class="invoice-body-info-item">
                                    <div class="info-item-td text-end text-bold">
                                        <div class="info-item-ts">Sub Total : <span class="text-bold">$<?php echo $subTotal ?></span></div>
                                    </div>
                                </div>
                                <div class="invoice-body-info-item">
                                    <div class="info-item-td text-end text-bold">
                                        <div class="info-item-ts">Tax : <span class="text-bold"><?php echo $taxRate * 100 . "%" ?></span></div>
                                    </div>
                                </div>
                                <div class="invoice-body-info-item">
                                    <div class="info-item-td text-end text-bold">
                                        <div class="info-item-ts">Tax Among : <span class="text-bold">$<?php echo $taxAmong ?></span></div>
                                    </div>
                                </div>
                                <div class="invoice-body-info-item">
                                    <div class="info-item-td text-end text-bold">
                                        <div class="info-item-ts">Total : <span class="text-bold">$<?php echo $total ?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="invoice-foot text-center">

                    <div class="invoice-btns">
                        <button type="button" class="invoice-btn" onclick="GetPrint()">
                            <span>
                                <i class="fa fa-print" aria-hidden="true"></i>
                            </span>
                            <span>Print</span>
                        </button>
                        <button type="button" class="invoice-btn" onclick="Download()">
                            <span>
                                <i class="fas fa-download"></i>
                            </span>
                            <span>Download</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var total = <?php echo $total; ?>;
    var data = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Agust', 'September', 'Octorber', 'November', 'December'],
        datasets: [{
            label: 'Result Report ',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, <?php echo $total; ?>, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
        }]

    };
    var chartType = 'line';
    var myChart = new Chart(ctx, {
        type: chartType,
        data: data,
        options: {
            responsive: true
        }
    });
</script>