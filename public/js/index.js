$(function () {
    $('#workers-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/pracownicy',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'imie', name: 'imie' },
            { data: 'nazwisko', name: 'nazwisko' },
            { data: 'email', name: 'email' },
            { data: 'firma', name: 'firma' },
            { data: 'dieta', name: 'dieta' },
            { data: 'telefon_1', name: 'telefon_1' },
            { data: 'telefon_2', name: 'telefon_2' },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });
});
