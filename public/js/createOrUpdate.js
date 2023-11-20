
let isUpdating = false;
let createForm = $('#createForm');

$(document).ready(function () {
    // Create button click event using jQuery
    $('#openCreateForm').click(function () {
        isUpdating = false;
        resetForm();
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

            populateForm(response.record);
            // Populate modal fields with worker data for update

            // // Show the create/update modal
            $('#createModal').modal('show');
        },
        error: handleEditError
    });
});

createForm.submit(function (e) {
    e.preventDefault();
    $.ajax({
        url: isUpdating ? '/pracownicy/' +   $('#id').val() : '/pracownicy',
        method: isUpdating ? 'PUT' : 'POST',
        data:  $(this).serialize(),
        success: handleSuccess,
        error: handleAjaxError
    });
});

function resetForm() {
    isUpdating = false;
    $('.error-message').remove();
    createForm[0].reset();
}

function populateForm(record) {
    $('#imie').val(record.imie);
    $('#id').val(record.id);
    $('#nazwisko').val(record.nazwisko);
    $('#email').val(record.email);
    $('#dieta').val(record.dieta);
    $('#firma').val(record.firma);
    $('#telefon_1').val(record.telefon_1);
    $('#telefon_2').val(record.telefon_2);
}

function handleSuccess() {
    // Clear the form fields
    resetForm();

    // After successful submission, close the modal
    $('#createModal').modal('hide');

    // Show a success modal
    $('#successModal').modal('show');

    // Add new record to DataTable
    $('#workers-table').DataTable().ajax.reload();
}

function handleAjaxError(error) {
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

function handleEditError() {
    $('#noRecordError').show();
    setTimeout(function() {
        $('#noRecordError').hide();
    }, 5000);
}
