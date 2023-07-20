$('#userTable').DataTable({
    "paging": true
});
$('#filmTable').DataTable();

// jQuery click handler
$('.btn-save-status').on('click', function() {
    // Get the selected status value
    const newStatus = $(this).closest('tr').find('.status-select').val();

    // Get the user ID from the data attribute "data-user-id"
    const userId = $(this).closest('tr').data('user-id');

    // Prepare data to be sent to the server
    const data = {
        status: newStatus,
        id: userId
    };

    // Send AJAX PATCH request
    $.ajax({
        url: `/api/users`, // Replace with your actual API URL
        type: 'PATCH',
        contentType: 'application/json',
        data: JSON.stringify(data), // Convert the JavaScript object to a JSON string
        success: function(response) {
            console.log(response);
            location.reload();
            //alert('User status updated successfully.');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error(textStatus, errorThrown);
            alert('Failed to update user status.');
        }
    });
});


$('.btn-delete-user').on('click', function() {
    // Get the user ID from the data attribute "data-user-id"
    const userId = $(this).closest('tr').data('user-id');

    // Prepare data to be sent to the server
    const data = {
        id: userId
    };

    // Send AJAX DELETE request
    $.ajax({
        url: `/api/users`, // Replace with your actual API URL
        type: 'DELETE',
        contentType: 'application/json',
        data: JSON.stringify(data), // Convert the JavaScript object to a JSON string
        success: function(response) {
            console.log(response);
            location.reload();
            //alert('User deleted successfully.');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error(textStatus, errorThrown);
            alert('Failed to delete user.');
        }
    });
});








document.addEventListener('DOMContentLoaded', function() {

    let userTableDiv = document.getElementById('userTableDiv');
    let filmTableDiv = document.getElementById('filmTableDiv');

    let usersButton = document.getElementById('showUsers');
    let filmsButton = document.getElementById('showFilms');

    usersButton.addEventListener('click', function() {
        filmTableDiv.classList.add('hidden');
        userTableDiv.classList.remove('hidden');

        // Hide films button and show users button
        filmsButton.classList.remove('hidden');
        usersButton.classList.add('hidden');
    });

    filmsButton.addEventListener('click', function() {
        userTableDiv.classList.add('hidden');
        filmTableDiv.classList.remove('hidden');

        // Hide users button and show films button
        usersButton.classList.remove('hidden');
        filmsButton.classList.add('hidden');
    });
});