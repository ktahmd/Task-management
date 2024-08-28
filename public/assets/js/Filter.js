function toggleDropdown(id) {
    document.getElementById(id).classList.toggle("show");
}

function filterTable() {
    var table, tr, td, i;
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Get selected priority filter
    var selectedPriorityElement = document.querySelector('.priority-filter:checked');
    var selectedPriority = selectedPriorityElement ? selectedPriorityElement.value : "";

    // Get selected state filter
    var selectedStateElement = document.querySelector('.state-filter:checked');
    var selectedState = selectedStateElement ? selectedStateElement.value : "";

    // Get selected permission filter
    var selectedPermissionElement = document.querySelector('.permission-filter:checked');
    var selectedPermission = selectedPermissionElement ? selectedPermissionElement.value : "";

    for (i = 1; i < tr.length; i++) {
        var priorityMatch = false;
        var stateMatch = false;
        var permissionMatch = false;

        // Check if row matches selected priority
        td = tr[i].getElementsByTagName("td")[2]; // Priority column
        if (td && selectedPriority !== "" && selectedPriority !== "none") {
            priorityMatch = (td.innerHTML.toLowerCase() === selectedPriority.toLowerCase());
        } else {
            priorityMatch = true; // No priority filter selected or 'None' selected
        }

        // Check if row matches selected state
        td = tr[i].getElementsByTagName("td")[5]; // State column
        if (td && selectedState !== "" && selectedState !== "none") {
            stateMatch = (td.innerHTML.toLowerCase() === selectedState.toLowerCase());
        } else {
            stateMatch = true; // No state filter selected or 'None' selected
        }

        // Check if row matches selected permission
        td = tr[i].getElementsByTagName("td")[2]; // Permission column (assuming permission is in the 4th column)
        if (td && selectedPermission !== "" && selectedPermission !== "none") {
            permissionMatch = (td.innerHTML.toLowerCase() === selectedPermission.toLowerCase());
        } else {
            permissionMatch = true; // No permission filter selected or 'None' selected
        }

        // Display row if it matches all filters
        if (priorityMatch && stateMatch && permissionMatch) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
}



// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}