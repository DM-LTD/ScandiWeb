<?php require "../Templates/header.php"; ?>
<script src="../Scripts/newproduct.js"></script>
</head>
<body>


<div id="productSaveMessages" class="alert alert-primary text-center" role="alert" style="display: none">
          Product has been saved successfully !!!
</div>

<div class="productRegisterHeader">
    <div class="row">
        <div class="col-md-10">
            <h3>New Product Registration</h3>
        </div>
        <div class="col-md-1">
            <button id="cancelProduct" class="btn btn-secondary w-100"> Cancel</button>
        </div>
        <div class="col-md-1">
            <button id="saveProduct" class="btn btn-success w-100"> Save</button>
        </div>
        <hr class="line mt-3">
    </div>
</div>

<form id="saveProductForm">
    <div class="row">
        <div class="col-md-1 text-end"> SKU:</div>
        <div class="col-md-2">
            <input id="sku_text" type="text" class="form-control">
        </div>
        <div id="sku_messages" class="col-md-3"></div>
    </div>

    <div class="row mt-3">
        <div class="col-md-1 text-end"> Name:</div>
        <div class="col-md-2">
            <input id="productName_text" type="text" class="form-control">
        </div>
        <div id="productName_messages" class="col-md-3"></div>
    </div>

    <div class="row mt-3">
        <div class="col-md-1 text-end"> Price:</div>
        <div class="col-md-2">
            <input id="price_text" type="text" class="form-control">
        </div>
        <div id="price_messages" class="col-md-3"></div>
    </div>

    <div class="row mt-5">
        <div class="col-md-1">
            <label for="switcher"> Select Product: </label>
        </div>

        <div class="col-md-2">
            <select name="switcher" id="switcher" class="w-100">
                <option value="-1"> Select Options: </option>
                <option value="dvd"> DVD </option>
                <option value="furniture"> Furniture </option>
                <option value="book"> Book </option>
            </select>
        </div>

        <div id="switcher_messages" class="col-md-3">

        </div>

    </div>
    <div id="subform" class="mt-4">
    </div>
</form>

<?php require "../Templates/footer.php"; ?>
