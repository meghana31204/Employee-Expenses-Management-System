// Display approval notification
function approveVoucher() {
    const notification = document.createElement('div');
    Object.assign(notification.style, {
        position: 'fixed', top: '20px', left: '50%', transform: 'translateX(-50%)',
        backgroundColor: '#4CAF50', color: 'white', padding: '10px 20px', borderRadius: '5px',
        fontSize: '16px', zIndex: 1000
    });
    notification.textContent = 'Voucher approved successfully!';
    document.body.appendChild(notification);
    setTimeout(() => notification.remove(), 3000);
}

// Toggle reject reason input
function toggleRejectTextbox(button) {
    button.nextElementSibling.style.display = 
        button.nextElementSibling.style.display === 'block' ? 'none' : 'block';
}

// Submit reject reason
function submitRejectReason(button) {
    const input = button.previousElementSibling;
    if (input.value.trim()) {
        alert('Reject reason submitted: ' + input.value);
        input.style.display = button.style.display = 'none';
    } else alert('Please enter a reason.');
}
