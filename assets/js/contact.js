document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const successStatus = urlParams.get('status');
    if (successStatus === 'success') {
        showSuccessPopup();
    }
});

function showSuccessPopup() {
    const popup = document.getElementById('success-popup');
    popup.style.display = 'block';

    setTimeout(function () {
        popup.style.display = 'none';
    }, 3000);
}
