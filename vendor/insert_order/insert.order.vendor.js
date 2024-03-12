document.addEventListener("DOMContentLoaded", function () {
  const customer = document.getElementById("customer");
  const inputCustomer = document.getElementById("customerName");
  const CustomerID = document.getElementById("customerID");

  let options = document.querySelectorAll("option");
  customer.addEventListener("change", function (event) {
    event.preventDefault();
   options.forEach(option => {
    if (option.selected){
      inputCustomer.value = option.textContent;
      CustomerID.value = option.value;
    }
   });

  });
});
