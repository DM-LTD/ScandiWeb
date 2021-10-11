$(document).ready(function (){
    console.log('jquery works');
    $(`#new_product_redirect`).click(function (){
        window.location.href = "http://localhost/Websites/ScandiWeb/App/Views/newproduct.php";
    });

    $(`#show_product_redirect`).click(function (){
        window.location.href = "http://localhost/Websites/ScandiWeb/App/Views/showproduct.php";
    });

    $('#saveProductRedirect').click(function (){
        window.location.href = "http://localhost/Websites/ScandiWeb/App/Views/newproduct.php";
    })

    $('#cancelProduct').click(function (){
        window.location.href = "http://localhost/Websites/ScandiWeb/App/Views/index.php";
    })
});


