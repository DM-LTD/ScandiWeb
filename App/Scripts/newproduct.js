$(document).ready(function () {
    $('#switcher').on('change', function () {
        let element = $(this).val();
        //console.log(`element = ${element}`);
        let template = ``;
        switch (element) {
            case 'dvd':
                template = `
                      <div class="row">
                            <div class="col-md-1 text-end"> Size (MB): </div>
                            <div class="col-md-2">
                                <input id="sizeMB_text" type="text" class="form-control">
                            </div>
                            <div id="sizeMB_messages" class="col-md-3"></div>
                      </div>
                `;
                break;
            case 'furniture':
                template = `
                    <div class="row">
                            <div class="col-md-1 text-end"> Height (CM): </div>
                            <div class="col-md-2">
                                <input id="height_text" type="text" class="form-control">
                            </div>
                            <div id="height_messages" class="col-md-3"></div>
                      </div>
                      
                    <div class="row mt-3">
                            <div class="col-md-1 text-end"> Width (CM): </div>
                            <div class="col-md-2">
                                <input id="width_text" type="text" class="form-control">
                            </div>
                            <div id="width_messages" class="col-md-3"></div>
                    </div>
                      
                    <div class="row mt-3">
                            <div class="col-md-1 text-end"> Length (CM): </div>
                            <div class="col-md-2">
                                <input id="length_text" type="text" class="form-control">
                            </div>
                            <div id="length_messages" class="col-md-3"></div>
                      </div>
                `;
                break;

            case 'book' :
                template = `
                     <div class="row">
                        <div class="col-md-1 text-end"> Weight(KG): </div>
                        <div class="col-md-2">
                            <input id="weightKG_text" type="text" class="form-control">
                        </div>
                        <div id="weightKG_messages" class="col-md-3"></div>
                    </div>
                
                `;
                break;

            default:
                template = '';
                break;
        }

        $("#subform").html(template);
    });


    function cstTrim(txt) {
        if (txt === undefined || txt.length === 0)
            return null;
        return txt.trim();
    }

    function validate(txt) {
        return txt !== null && txt.length > 0 && txt.length < 25;
    }

    function isNumber(txt) {
        return !isNaN(txt) && !isNaN(txt - 0);
    }

    /*
    * this function return true if all input is valid otherwise return false
    * */
    function validateForm(sku, productName, price, switcher, sizeMB, height, width, length, weightKG) {

        let isSku = validate(sku);
        let isProductName = validate(productName);
        let isPrice = validate(price) && isNumber(price);
        let isSwitcher = switcher !== '-1';
        let isSizeMB = (switcher === 'dvd' && validate(sizeMB) && isNumber(sizeMB)) || switcher !== 'dvd';
        let isHeight = (switcher === 'furniture' && validate(height) && isNumber(height)) || switcher !== 'furniture';
        let isWidth = (switcher === 'furniture' && validate(width) && isNumber(width)) || switcher !== 'furniture';
        let isLength = (switcher === 'furniture' && validate(length) && isNumber(length)) || switcher !== 'furniture';
        let isWeightKG = (switcher === 'book' && validate(weightKG) && isNumber(weightKG)) || switcher !== 'book';

        // messages
        if (!isSku)
            $('#sku_messages').html(`<div class="error"> * Enter Valid SKU </div>`);
        else
            $('#sku_messages').html(``);

        if (!isProductName)
            $('#productName_messages').html(`<div class="error"> * Enter Valid Product Name </div>`);
        else
            $('#productName_messages').html(``);

        if (!isPrice)
            $('#price_messages').html(`<div class="error"> * Enter Valid Price </div>`);
        else
            $('#price_messages').html(``);

        if (!isSwitcher)
            $('#switcher_messages').html(`<div class="error"> * Select Product </div>`);
        else
            $('#switcher_messages').html(``);

        if (!isSizeMB)
            $('#sizeMB_messages').html(`<div class="error"> * Select Proper Size </div>`);
        else
            $('#sizeMB_messages').html(``);

        if (!isHeight)
            $('#height_messages').html(`<div class="error"> * Select Proper Height </div>`);
        else
            $('#height_messages').html(``);

        if (!isWidth)
            $('#width_messages').html(`<div class="error"> * Select Proper Width </div>`);
        else
            $('#width_messages').html(``);

        if (!isLength)
            $('#length_messages').html(`<div class="error"> * Select Proper Length </div>`);
        else
            $('#length_messages').html(``);

        if (!isWeightKG)
            $('#weightKG_messages').html(`<div class="error"> * Select Proper Weight </div>`);
        else
            $('#weightKG_messages').html(``);

        // end messages
        //????
        return isSku && isProductName && isPrice && isSwitcher && isSizeMB && isHeight && isWidth && isLength && isWeightKG;
    }

// on product save click
    $('#saveProduct').click(function () {

        let sku = cstTrim($('#sku_text').val());
        let productName = cstTrim($('#productName_text').val());
        let price = cstTrim($('#price_text').val());
        let switcher = $('#switcher').val();
        let sizeMB = cstTrim($('#sizeMB_text').val());
        let height = cstTrim($('#height_text').val());
        let width = cstTrim($('#width_text').val());
        let length = cstTrim($('#length_text').val());
        let weightKG = cstTrim($('#weightKG_text').val());

        //front to back
        if (validateForm(sku, productName, price, switcher, sizeMB, height, width, length, weightKG)) {
            const postData = {
                sku: sku,
                productName: productName,
                price: Number.parseFloat(price).toFixed(2),
                switcher: switcher,
                sizeMB: Number.parseFloat(sizeMB).toFixed(2),
                height: Number.parseFloat(height).toFixed(2),
                width: Number.parseFloat(width).toFixed(2),
                length: Number.parseFloat(length).toFixed(2),
                weightKG: Number.parseFloat(weightKG).toFixed(2),
            };

            $.post('../Controllers/productSaveController.php', postData, function (result) {
                console.log(result);
                let info = JSON.parse(result);
                if (info.status === 'OK') {
                    $('#saveProductForm').trigger('reset');
                    $("#subform").html(``);
                    $('#switcher').val('-1');

                    $('#productSaveMessages').show('slow');
                    setTimeout(function () {
                        $('#productSaveMessages').hide('slow');
                    }, 3000);
                } else {
                    console.log(info.message);
                }
            });
        }

    });
});