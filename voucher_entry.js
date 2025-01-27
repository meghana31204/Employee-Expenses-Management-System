document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById("voucherForm");

    form.onsubmit = function (event) {
        event.preventDefault();

        alert("Voucher Submitted Successfully!");
        form.reset();
    };
});
