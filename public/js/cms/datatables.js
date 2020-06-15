/**
 * @desc    Init Datatable
 * @note    This function using Jquery
 * @param   {DOMString} element
 * @param   {string} url
 * @param   {array of object} columns
 */
const dataTables = (element, url, columns) => {
    return $(element).DataTable({
        processing: true,
        responsive: true,
        serverSide: true,
        ajax: url,
        columns,
        columnDefs: [
            {
                targets: [0, -1],
                sortable: false,
            },
            {
                targets: "_all",
                createdCell: function (td) {
                    $(td).css("white-space", "nowrap");
                },
            },
        ],
        order: [[1, "asc"]],
    });
};
