// Click event handler for the "Delete" button
$(document).on('click', '.delete-btn', function() {
    let workerId = $(this).data('id');

    if (!confirm('Are you sure you want to delete this record?')) {
        return;
    }

    $.ajax({
        url: 'pracownicy/' + workerId,
        method: 'DELETE',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function(response) {
            console.log(response);

            // Find and remove the deleted row from DataTable
            let table = $('#workers-table').DataTable();
            let row = table.row('#row-id-' + workerId); // Delete the row

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
