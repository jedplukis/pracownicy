// Create and update click events

let isUpdating = false;
let createForm = $('#createForm');

$(document).ready(function () {
    // Create button click event
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

    // Fetch worker data
    $.ajax({
        url: '/pracownicy/' + $(this).data('id'),
        method: 'GET',
        success: function(response) {

            // Populate modal fields with clicked record
            populateForm(response.data);

            // Show the create/update modal
            $('#createModal').modal('show');
        },
        error: handleEditError
    });
});

// Submit form - either edit or create
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

function populateForm(worker) {
    $('#imie').val(worker.imie);
    $('#id').val(worker.id);
    $('#nazwisko').val(worker.nazwisko);
    $('#email').val(worker.email);
    $('#dieta').val(worker.dieta);
    $('#firma').val(worker.firma);
    $('#telefon_1').val(worker.telefon_1);
    $('#telefon_2').val(worker.telefon_2);
}

function handleSuccess() {
    // Clear the form fields
    resetForm();

    // Close the modal
    $('#createModal').modal('hide');

    // Show a success modal
    $('#successModal').modal('show');

    // Reload datatable for new records
    $('#workers-table').DataTable().ajax.reload();
}

function handleAjaxError(error) {
    // Handle errors
    if (error.status) {
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
