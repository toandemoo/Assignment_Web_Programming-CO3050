function toggleShippingDetails(show) {
    document.getElementById("shippingDetails").style.display = show ? "block" : "none";
    
    document.getElementById("recipientName").required = show;
    document.getElementById("recipientPhone").required = show;
}

document.addEventListener("DOMContentLoaded", function () {
    showInfo();
});

function showInfo() {
    document.getElementById("payment-product").style.display = "block";
    document.getElementById("payment-cus-info").style.display = "block";
    document.getElementById("payment-ship-info").style.display = "block";
    document.getElementById("payment-total").style.display = "block";
    document.getElementById("payment-section").style.display = "none";
    document.getElementById("info-tab").classList.add("active-tab");
    document.getElementById("payment-tab").classList.remove("active-tab");
}

function showPayment() {
    if (isFormValid()) {
        document.getElementById("payment-product").style.display = "none";
        document.getElementById("payment-cus-info").style.display = "none";
        document.getElementById("payment-ship-info").style.display = "none";
        document.getElementById("payment-total").style.display = "none";
        document.getElementById("payment-section").style.display = "block";
        document.getElementById("info-tab").classList.remove("active-tab");
        document.getElementById("payment-tab").classList.add("active-tab");
    } else {
        alert("Vui lòng điền đầy đủ thông tin!");
    }
}

function proceedToPayment() {
    if (isFormValid()) {
        showPayment();
    }
}

function isFormValid() {
    const cusform = document.getElementById("customerForm");
    const shipform = document.getElementById("shippingForm");
    return cusform.checkValidity() && shipform.checkValidity();
}
