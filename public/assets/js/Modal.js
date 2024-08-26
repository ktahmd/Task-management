function openModa(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = "block";

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}

/* Close */
function closeModa(modalId) {
    document.getElementById(modalId).style.display = "none";
}

