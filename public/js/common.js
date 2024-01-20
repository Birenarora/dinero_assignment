$('#candidate_btn').on('click', () => {
    $('.display_all_candidates').css('display', 'none');
    if ($('.candidate_form').css('display') == 'none') {
        $('.candidate_form').css('display', 'flex');
    } else {
        $('.candidate_form').css('display', 'none');
    }
});

$(document).ready(() => {
    var getViewBack = document.getElementsByClassName('alert-error');
    if (getViewBack.length > 0) {
        $('.candidate_form').css('display', 'flex');
    }

    setTimeout(() => {
        $('.alert-success').css('display', 'none');
    }, 3000);

});

$('#display_btn').on('click', () => {

    $('.candidate_form').css('display', 'none');
    if ($('.display_all_candidates').css('display') == 'none') {
        $('.display_all_candidates').css('display', 'block');
    } else {
        $('.display_all_candidates').css('display', 'none');
    }

    var table = $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/candidate",
        "bDestroy": true,
        pageLength: 25,
        columnDefs: [
            { className: 'dt-center', targets: "_all" },
        ],
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'date_of_birth', name: 'date_of_birth'},
            {data: 'mobile_number', name: 'mobile_number'},
            {data: 'email_address', name: 'email_address'},
            {data: 'address_line1', name: 'address_line1'},
            {data: 'address_line2', name: 'address_line2'},
            {data: 'city', name: 'city'},
            {data: 'state', name: 'state'},
            {data: 'pincode', name: 'pincode'},
            {data: 'candidate_job_skill.skills', name: 'skills'},
            {data: 'candidate_job_skill.training_or_certifications', name: 'training_or_certifications'},
            {data: 'candidate_job_skill.reffered_through', name: 'reffered_through'}
            // {data: 'action', name: 'action'},
        ]
    });
});