document.addEventListener("DOMContentLoaded", function () {
  const payment = document.getElementById("payment");
  console.log(payment);
  const inputpay = document.getElementById("pay");
  const payID = document.getElementById("payID");
  let options = document.querySelectorAll("option");
  payment.addEventListener("change", function (event) {
    event.preventDefault();
    options.forEach((option) => {
      if (option.selected) {
        inputpay.value = option.textContent;
        payID.value = option.value;
        console.log(payID.value);
      }
    });
  });
});
