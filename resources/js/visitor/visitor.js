$(document).ready(function() {

    $('#visitor-table').DataTable({
        processing: true,
        serverSide: true,
        searching: true,
        ordering: true,
        language: { search: "",
            searchPlaceholder: "Search for an Visitor"
        },
        info:false,
        pageLength: 10,
        lengthMenu: [10, 50, 100],
        autoWidth: true,
        paging: true,
        ajax: {
            url: "visitors",
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id'},
            { data: 'user_agent', name: 'user_agent'},
            { data: 'ip', name: 'ip'},
            { data: 'device', name: 'device'},
            { data: 'country', name: 'country'},
            { data: 'action', name: 'action', orderable: false, searchable: false, className: "text-center" },
        ]
    });
});
