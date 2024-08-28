function searchUsers() {
    let query = document.getElementById('searchInput').value;
    if (query.length > 1) {
        fetch(`app/controllers/LiveSearchUsers.php?query=${query}`)
            .then(response => response.text())
            .then(data => {
                document.getElementById('results').innerHTML = data;
            });
    } else {
        document.getElementById('results').innerHTML = '';
    }
}

function selectUser(email,id) {
    document.getElementById('searchInput').value = email;
    document.getElementById('selectedUser').value = id;
    document.getElementById('results').innerHTML = ''; // Clear the results
}