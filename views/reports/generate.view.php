<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        var blob = new Blob([content], { type: 'text/html' });
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
                        <p><span class="text-bold">Date</span>: 22/07/2024</p>
                    </div>
                    <div class="invoice-head-middle-right text-end">
                        <h3>GENERATE REPORT</h3>
                    </div>
                </div>
                <div class="hr"></div>
                <div class="invoice-head-bottom">
                    <div class="invoice-head-bottom-left">
                        <ul>
                            <li class="text-bold">Invoice To:</li>
                            <li>Posystem</li>
                            <li>0884321539</li>
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
            <div class="overflow-view">
                <div class="invoice-body">
                    <table>
                        <thead>
                            <tr>
                                <th scope="col">BARCODE</th>
                                <th scope="col">PRODUCT</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">PROFIT</th>
                                <th scope="col">EXPENSES</th>
                                <th scope="col">USERS</th>
                                <th scope="col">IN STOCK</th>


                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>445</td>
                                <td> Computer</td>
                                <td>1</td>
                                <td>$500</td>
                                <td>$1000</td>
                                <td>510</td>
                                <td class="text-end">10</td>
                            </tr>

                        </tbody>
                    </table>
                    <div class="invoice-body-bottom">
                        <div class="invoice-body-info-item border-bottom">
                            <div class="info-item-td text-end text-bold">
                                <div class="info-item-ts text-end">Sub Total:$5000</div>
                            </div>
                        </div>
                        <div class="invoice-body-info-item border-bottom">
                            <div class="info-item-td text-end text-bold">
                                <div class="info-item-ts text-end">Tax:$500</div>
                            </div>

                        </div>
                        <div class="invoice-body-info-item border-bottom">
                            <div class="info-item-td text-end text-bold">
                                <div class="info-item-ts text-end">Total:$5500</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="invoice-foot text-center">
                    <p><span class="text-bold text-center">NOTE:</span>Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Expedita, magni.</p>
                    <div class="invoice-btns">
                        <button type="button" class="invoice-btn" onclick="GetPrint()">
                            <span>
                                <i class="fas fa-print"></i>
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