setTimeout(function() {
    var successMessage = document.getElementById('successMessage');
    if(successMessage) {
        successMessage.style.display = 'none';
    }
}, 3000); // 3 seconds

setTimeout(function() {
    var errorMessage = document.getElementById('errorMessage');
    if(errorMessage) {
        errorMessage.style.display = 'none';
    }
}, 3000); // 3 seconds