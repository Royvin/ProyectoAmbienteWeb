document.addEventListener("DOMContentLoaded", function() {
    var logoutModal = document.getElementById("logoutModal");
    if(logoutModal) {
        logoutModal.addEventListener("shown.bs.modal", function() {
            console.log("Modal de logout listo");
        });
    }
});