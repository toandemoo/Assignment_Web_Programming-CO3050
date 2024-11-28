function handlePaymentMethodChange(amount, orderId) {
    const paymentMethod = document.getElementById('paymentMethod').value;
    const qrContainer = document.getElementById('qr-container');
    
    // Ensure QR code container is displayed only for bank transfer
    if (paymentMethod === 'bank-transfer') {
        qrContainer.style.display = 'block';
        showBankQRCode(amount, orderId);
    } else {
        qrContainer.style.display = 'none';
        // Clear QR code content when not displaying
        document.getElementById('paymentContent').innerHTML = '';
    }
}

function generateUniqueOrderId() {
    const timestamp = Date.now();
    const randomString = Math.random().toString(36).substring(2, 8).toUpperCase();
    return `ORDER${timestamp}${randomString}`;
}

async function showBankQRCode(amount, orderId) {
    try {
        amount = 5000;
        const bankId = '970422'; // MB Bank
        const accountNo = '0394481457';
        const description = `THANH TOAN DON HANG ${orderId}`;
        
        const qrUrl = `https://img.vietqr.io/image/${bankId}-${accountNo}-compact.png?amount=${amount}&addInfo=${encodeURIComponent(description)}`;
        console.log(amount);
        console.log(orderId);
        const paymentContent = document.getElementById('paymentContent');
        paymentContent.innerHTML = `
            <div style="text-align: center;">
                <img src="${qrUrl}" alt="QR Code thanh toán" style="max-width: 300px;">
                <div class="payment-info">
                    <p>Số tiền: ${amount.toLocaleString('vi-VN')}đ</p>
                    <p>Nội dung: ${description}</p>
                </div>
            </div>
        `;
        
        showPaymentModal();
        
        paymentCheckInterval = setInterval(() => checkPaymentStatus(description, amount, orderId), 5000); // Check mỗi 5 giây

    } catch (error) {
        console.error('Lỗi tạo mã QR:', error);
        alert('Có lỗi xảy ra khi tạo mã QR thanh toán. Vui lòng thử lại sau.');
    }
}

async function checkPaymentStatus(description, amount, orderId) {
    try {
        const response = await fetch('https://script.google.com/macros/s/AKfycbwdvuXZFhdhueb73Ftowr_73WXm0nXqMlsZpN1raKGRvYOa3PMFnTZ3eVSQkqTv2ZPZ/exec');
        const data = await response.json();
        console.log(amount);
        if (data && !data.error && data.data.length > 1) {
            const transaction = data.data[data.data.length - 1];
            if (transaction['Mô tả'].includes(description) && 
                parseInt(transaction['Giá trị']) >= amount){
                clearInterval(paymentCheckInterval);
                        showPaymentSuccess();  
            }
        }
    } catch (error) {
        console.error('Error checking payment status:', error);
    }
}

function completeOrder(event) {
    event.preventDefault();
    
    const paymentMethod = document.getElementById('paymentMethod').value;
    const totalAmountText = document.getElementById('payment-total-amount').textContent;
    const amount = parseInt(totalAmountText.replace(/[^\d]/g, ''));
    
    if (paymentMethod === 'bank-transfer') {
        const orderId = generateUniqueOrderId();
        showBankQRCode(amount, orderId);
    } else {
        alert('Đặt hàng thành công!');
        window.location.href = 'Home.html';
    }
}

let paymentTimer;
const PAYMENT_TIMEOUT = 600;
function showPaymentModal() {
    document.getElementById('modalOverlay').style.display = 'block';
    document.getElementById('paymentModal').style.display = 'block';
    startPaymentTimer();
}

function closePaymentModal() {
    document.getElementById('modalOverlay').style.display = 'none';
    document.getElementById('paymentModal').style.display = 'none';
    clearInterval(paymentTimer);
    clearInterval(paymentCheckInterval);
}

function startPaymentTimer() {
    let timeLeft = PAYMENT_TIMEOUT;
    const timerDisplay = document.getElementById('paymentTimer');
    
    paymentTimer = setInterval(() => {
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;
        
        timerDisplay.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        
        if (timeLeft <= 0) {
            clearInterval(paymentTimer);
            clearInterval(paymentCheckInterval);
            alert('Thanh toán thất bại!');
            closePaymentModal();
        }
        timeLeft--;
    }, 1000);
}

function showPaymentSuccess() {
    clearInterval(paymentTimer);
    clearInterval(paymentCheckInterval);
    document.getElementById('paymentContent').style.display = 'none';
    document.getElementById('paymentTimer').style.display = 'none';
    document.getElementById('successIcon').style.display = 'block';
    
    setTimeout(() => {
        window.location.href = 'cart.php';
    }, 2000);
}