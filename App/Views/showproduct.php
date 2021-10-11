<?php require "../Templates/header.php";?>

<script src="../Scripts/showproduct.js"></script>

</head>
<body>

<div id="productDeleteMessages" class="alert alert-primary text-center" role="alert" style="display: none">
    Product has been deleted successfully !!!
</div>

<div class="showProductHeader">
    <div class="row">
        <div class="col-md-9 tittle">
            Product List
        </div>
        <div class="col-md-1">
            <button id="saveProductRedirect" class="btn btn-secondary w-100">Save</button>
        </div>
        <div class="col-md-2">
            <button id="mass_delete" class="btn btn-danger w-100">Massive Delete</button>
        </div>
    </div>
    <hr class="line">
</div>

<div id="showProductBody">

</div>

<?php require "../Templates/footer.php";?>


