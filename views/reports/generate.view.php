
<?php
require_once("../../layouts/header.php");
require_once("../../controllers/reports/generate.controller.php");
?>
<style>
    *::after,
    *::before {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    :root {
        --blue-color: #0c2f54;
        --dark-color: #53561;
        --white-color: #fff;
    }

    ul {
        list-style-type: none;
    }

    ul li {
        margin: 2px 0;
    }

    .text-dark {
        color: var(--dark-color);
    }

    .text-blue {
        color: var(--blue-color);
    }

    .text-end {
        text-align: right;
    }

    .text-center {
        text-align: center
    }

    .text-start {
        text-align: left;
    }

    .text-bold {
        font-weight: 700;
    }

    .hr {
        height: 1px;
        background: rgba(0, 0, 0, 0.1);
    }

    .border-bottom {
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    body {
        font-family: sans-serif;
        color: var(--blue-color);
        font-size: 14x;
    }

    .invoice-wrapper {
        min-height: 100vh;
        background-color: rgba(0, 0, 0, 0.1);
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .invoice {
        max-width: 850px;
        margin-right: auto;
        margin-left: auto;
        background-color: var(--white-color);
        padding: 70px;
        border: 1px solid rgba(0, 0, 0, 0.12);
        border-radius: 5px;
        min-height: 720px;
    }

    .invoice-head-top-right {
        font-weight: 500;
        font-size: 27px;
        color: var(--blue-color);
    }

    .invoice-head-middle,
    .invoice-head-bottom {
        padding: 16px 0;
    }

    .invoice-body {
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 4px;
        overflow: hidden;
    }

    .invoice-body table {
        border-collapse: collapse;
        border-radius: 4px;
        width: 100%;
    }

    /* .invoice-body table th {
        background-color: skyblue;
    } */

    .invoice-body table td,
    .invoice-body table th {
        padding: 12px;

    }

    .invoice-body table tr {
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .invooice-body table thead {
        background-color: rgba(0, 0, 0, 0.02);
    }

    .invoice-body-info-item {
        display: grid;
        grid-template-columns: 80% 20%;
    }

    .invoice-body-info-item .info-item-td {
        padding: 12px;

    }

    .invoice-foot {
        padding: 30px 0;
    }

    .invoice-foot p {
        font-size: 12px;

    }

    .invoice-btns {
        margin-top: 20px;
        display: flex;
        justify-content: center;
    }

    .invoice-btn {
        padding: 3px 9px;
        color: var(----dark-color);
        font-family: inherit;
        border: 1px solid rgba(0, 0, 0, 0.1);
        cursor: pointer;
    }

    .invoice-head-top,
    .invoice-head-middle,
    .invoice-head-bottom {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        padding-bottom: 10px;
    }

    @media screen and (max-width:992px) {
        .invoice {
            padding: 40px;
        }

    }

    @media screen and (max-width:576px) {

        .invoice-head-top,
        .invoice-head-middle,
        .invoice-head-bottom {
            grid-template-columns: repeat(1, 1fr);
        }

        .invoice-head-bottom-right {
            margin-top: 12px;
            margin-bottom: 12px;
        }

        .invoice * {
            text-align: left;
        }

        .invoice {
            padding: 28px;
        }
    }

    .overflow-view {
        overflow-x: scroll;
    }

    .invoice-body {
        min-width: 600px;
    }

    @media print {
        .invoice-wrapper {
            height: auto;
            min-height: 0;
            padding-top: 10px;
            padding-bottom: 10px;
            margin: 0;
            border: none;
            box-shadow: none;
            page-break-before: always;
        }

        .invoice {
            padding: 0;
            border: none;
            border-radius: 0;
        }

        .invoice-body {
            border: none;
            border-radius: 0;
        }

        .invoice-btns {
            display: none;
        }
    }
</style>
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