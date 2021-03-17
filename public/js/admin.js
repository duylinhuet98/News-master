// ('#table-post-type').DataTable({
//     'paging': true,
//     'lengthChange': false,
//     'searching': false,
//     'ordering': true,
//     'info': true,
//     'autoWidth': true,
//     'pageLength': 7,
//     "columnDefs": [{
//         "sortable": false, "targets": [2,4,5]
//     }],
//     'language': {
//         'paginate': {
//             'previous': 'Trước',
//             'next': 'Sau',
//             "first": "Đầu",
//             "last": "Cuối",
//         },
//         'info': "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
//         'emptyTable' : "Không có dữ liệu",
//         "infoEmpty": "Hiển thị 0 đến 0 trong tổng số 0 mục",
//     }
// });

// set time out message success/error
setTimeout(function(){
    (".alert-success").remove();
}, 7000 ); // 7 secs

setTimeout(function(){
    (".alert-error").remove();
}, 7000 ); // 7 secs

setTimeout(function(){
    (".alert-err").remove();
}, 7000 ); // 7 secs
