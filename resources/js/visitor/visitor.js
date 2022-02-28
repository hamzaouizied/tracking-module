$(document).ready(function() {

    $('#visitor-table').DataTable({
        processing: true,
        serverSide: true,
        searching: true,
        ordering: true,
        language: { search: "",
            searchPlaceholder: "Search...."
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
            { data: 'browser', name: 'browser'},
            { data: 'ip', name: 'ip'},
            { data: 'device', name: 'device'},
            { data: 'country', name: 'country'},
            { data: 'created_at', name: 'created_at'},
            { data: 'action', name: 'action', orderable: false, searchable: false, className: "text-center" },
        ]
    });

    $('#visitor-details-table').DataTable({
        processing: true,
        serverSide: true,
        searching: true,
        ordering: true,
        language: { search: "",
            searchPlaceholder: "Search...."
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
            { data: 'path', name: 'path'},
            { data: 'created_at', name: 'created_at'},
        ]
    });

    //delete visitor
    $('table.table.dataTable.no-footer').on('click', '.delete',function () {
        let id = $(this).attr('id');
        console.log(id);

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: 'delete/visitor',
                    type: 'POST',
                    data : {
                        'id' : id
                    },
                    dataType: "JSON",
                    success: function(response) {
                        swal({
                            title: 'Access Analytics',
                            text: 'successfully deleted',
                            type: 'success',
                            timer:'1000',
                            showCancelButton: false,
                            showConfirmButton: false
                        }).then(
                            function () {},
                            // handling the promise rejection
                            function (dismiss) {
                                if (dismiss === 'timer') {
                                    //console.log('I was closed by the timer')
                                }
                            }
                        );
                        var oTable = $('#visitor-table').dataTable();
                        oTable.fnDraw(false);
                        },
                    error: function(data) {}
                });

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
            }
        });
    });
});
