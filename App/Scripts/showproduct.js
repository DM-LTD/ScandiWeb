$(document).ready(function () {
    fetchTbl();
    $('#mass_delete').click(function () {
        if (confirm("Are you sure? ")) {

            let productIDArray = new Array();
            let dvdIDArray = new Array();
            let furnitureIDArray = new Array();
            let bookIDArray = new Array();

            $("input:checkbox[name=box]:checked").each(function () {
                // let element = $(this).val();
                // console.log(`element = ${element}`);
                let elem = JSON.parse($(this).val());
                productIDArray.push(elem.productID);
                if (elem.dvdID !== null)
                    dvdIDArray.push(elem.dvdID);
                if (elem.furnitureID !== null)
                    furnitureIDArray.push(elem.furnitureID);
                if (elem.bookID !== null)
                    bookIDArray.push(elem.bookID);
            });
            if (productIDArray.length > 0) {
                const postData = {
                    productIDArray: productIDArray,
                    dvdIDArray: dvdIDArray,
                    furnitureIDArray: furnitureIDArray,
                    bookIDArray: bookIDArray
                };
                $.post('../Controllers/productDeleteController.php', postData, function (result) {
                    console.log(result);
                    $('#productDeleteMessages').show('slow');
                    setTimeout(function () {
                        $('#productDeleteMessages').hide('slow');
                    }, 3000);
                    fetchTbl();
                });
                //////////////////////////////////////// <============= ////////////
            }
        }
    })

    function fetchTbl() {
        $.get('../Controllers/productShowController.php', function (data) {
            let rows = 1;
            let template = `<table class="table">`;
            JSON.parse(data).forEach(item => {
                if (rows === 1)
                    template += `<tr>`;
                template += `<td >
                                <div class="tbl_data">
                                    <p> <input type="checkbox"  name="box" class="float-start mt-1" value='${JSON.stringify(item)}'> </p>
                                    <p class="mt-4"> SKU: ${item.SKU} </p>
                                    <p> Name: ${item.productName} </p>
                                    <p> Price: ${item.price} $</p>
                                    <p> ${item.info} </p>
                                </div>
                               </td>
                          `;
                if (rows === 4) {
                    template += `</tr>`;
                    rows = 0;
                }
                rows++;
            });
            $('#showProductBody').html(template);
        });
    }
});