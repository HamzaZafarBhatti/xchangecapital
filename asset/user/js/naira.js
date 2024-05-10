var amountSold = document.getElementById("amount_sold");
var amountExchanged = document.getElementById("amount_exchanged");
var currency = document.getElementById('currency')

amountSold.addEventListener("input", getAmountExchanged);

function getAmountExchanged() {
    if (amountSold.value > 0) {
        $.ajax({
            url: "get_amount_exchanged",
            method: "post",
            dataType: "json",
            data: {
                amountSold: amountSold.value,
                currency: currency.value,
            },
            success: function (response) {
                amountExchanged.value = response;
            },
        });
    }
}
