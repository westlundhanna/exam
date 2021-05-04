document.addEventListener('DOMContentLoaded', function() {

    let openButton = document.querySelector('li.single-product__order-button');
    if (!openButton) return;


    openButton.classList.add('toggle-popup-form');

    let orderForm = document.getElementById('popupForm');

    let close = document.getElementById('closeForm');
    close.classList.add('toggle-popup-form');

    let BG = document.createElement("div");

    let errorMsg = document.querySelector('div.wpcf7-response-output');


    document.querySelectorAll('.toggle-popup-form').forEach(item => {
        item.addEventListener('click', event => {
            orderForm.classList.toggle('hide');
            BG.classList.toggle('bgactive');
            document.body.appendChild(BG);
            if (errorMsg) {
                orderForm.append(errorMsg)
            }

        })
    })
})