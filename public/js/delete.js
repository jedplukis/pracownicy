// Add a click event handler for the "Delete" button
$(document).on('click', '.delete-btn', function() {
    let workerId = $(this).data('id');

    // Optionally, show a confirmation modal
    if (!confirm('Are you sure you want to delete this record?')) {
        return;
    }

    // Send Ajax request to delete endpoint
    $.ajax({
        url: 'pracownicy/' + workerId , // Replace with your actual delete endpoint
        method: 'DELETE',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function(response) {
            console.log(response);

            // Find and remove the deleted row from DataTable
            var table = $('#workers-table').DataTable();
            var row = table.row('#row-id-' + workerId); // Delete the row

            if (row) {
                row.remove().draw();
            }
        },
        error: function(error) {
            console.error('here', error);
            // Handle error, show error message, etc.
        }
    });
});
