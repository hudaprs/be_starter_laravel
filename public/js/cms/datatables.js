/**
 * @desc  Init Datatable
 * @param {DOMString} element
 * @param {string} url
 * @param {array of object} columns
 */
const dataTables = (element, url, columns) => {
    return $(element).DataTable({
        processing: true,
        responsive: true,
        serverSide: true,
        ajax: url,
        columns,
    });
};
