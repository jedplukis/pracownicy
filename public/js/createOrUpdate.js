
let isUpdating = false;

$(document).ready(function () {
    // Create button click event using jQuery
    $('#openCreateForm').click(function () {
        isUpdating = false;
        $('#createForm')[0].reset();
        $('#createModal').modal('show');
    });
});

// Edit Button Click Event
$(document).on('click', '.edit-btn', function() {
    isUpdating = true;
    $('.error-message').remove();

    // Fetch worker data using Ajax
    $.ajax({
        url: '/pracownicy/' + $(this).data('id'),
        method: 'GET',
        success: function(response) {
            // Populate modal fields with worker data for update
            $('#imie').val(response.record.imie);
            $('#id').val(response.record.id);
            $('#nazwisko').val(response.record.nazwisko);
            $('#email').val(response.record.email);
            $('#dieta').val(response.record.dieta);
            $('#firma').val(response.record.firma);
            $('#telefon_1').val(response.record.telefon_1);
            $('#telefon_2').val(response.record.telefon_2);
            $('#createModalLabel').text('Update Worker');

            // // Show the create/update modal
            $('#createModal').modal('show');
        },
        error: function(error) {
            $('#error').after('<p class="text-danger error-message">' + error.responseJSON.errors + '</p>');

            $.each(error.responseJSON.errors, function(field, messages) {
                let errorMessage = '<p class="text-danger error-message">' + messages.join('<br>') + '</p>';
                $('#' + field).after(errorMessage);
            });
        }
    });
});

$('#createForm').submit(function (e) {
    e.preventDefault();

    $.ajax({
        url: isUpdating ? '/pracownicy/' +   $('#id').val() : '/pracownicy',
        method: isUpdating ? 'PUT' : 'POST',
        data:  $(this).serialize(),
        success: function() {
            // Clear the form fields
            $('#createForm')[0].reset();

            // After successful submission, close the modal
            $('#createModal').modal('hide');

            // Show a success modal
            $('#successModal').modal('show');

            // Add new record to DataTable
            $('#workers-table').DataTable().ajax.reload();
        },
        error: function(error) {
            // Handle errors
            if (error.status === 422) {
                // Clear existing error messages
                $('.error-message').remove();

                // Display validation errors next to the respective fields
                $.each(error.responseJSON.errors, function(field, messages) {
                    let errorMessage = '<p class="text-danger error-message">' + messages.join('<br>') + '</p>';
                    $('#' + field).after(errorMessage);
                });
            }
        }
    });
});
