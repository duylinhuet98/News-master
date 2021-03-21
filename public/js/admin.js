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
$("#create-post").validate({
    onfocusout: false,
    onclick: false,
    rules: {
        post_title: {
            required : true,
            minlength : 5,
        },
        post_title_unsigned: {
            required : true,
            minlength : 5,
        },
        post_content:{
            required : true,
            minlength : 5,

        }

    },
    messages: {
        post_title: {
            required: "Vui lòng nhập tiêu đề",
            minlength : "Nội dung nhập quá ngắn",
        },
        post_title_unsigned: {
            required : "Vui lòng nhập tiêu đề không dấu",
            minlength : "Nội dung nhập quá ngắn",
        },
        post_content: {
            required : "Vui lòng nhập nội dung tin tức",
            minlength : "Nội dung nhập quá ngắn",

        }
    },

    errorPlacement: function (label, elem) {
        var name = elem.attr('name');
        var spanError = '#' + name;
        $(spanError).append(label.addClass('text-error'));
    },
});

$("#create-post-type").validate({
    onfocusout: false,
    onclick: false,
    rules: {
        post_type_name: {
            required : true,
            minlength : 3
        },
        post_type_name_unsigned: {
            required : true,
            minlength : 3
        },

    },
    messages: {
        post_type_name: {
            required: "Vui lòng nhập tên loại tin",
            minlength : "Nội dung nhập quá ngắn"
        },
        post_type_name_unsigned: {
            required : "Vui lòng nhập tên không dấu",
            minlength : "Nội dung nhập quá ngắn"
        }
    },

    errorPlacement: function (label, elem) {
        var name = elem.attr('name');
        var spanError = '#' + name;
        $(spanError).append(label.addClass('text-error'));
    }
});
$("#create-category").validate({
    onfocusout: false,
    onclick: false,
    rules: {
        category_name: {
            required: true,
            minlength: 3
        },
        category_name_unsigned: {
            required: true,
            minlength: 3
        },

    },
    messages: {
        category_name: {
            required: "Vui lòng nhập tên danh mục",
            minlength: "Nội dung nhập quá ngắn"
        },
        category_name_unsigned: {
            required: "Vui lòng nhập tên không dấu",
            minlength: "Nội dung nhập quá ngắn"
        }
    },

    errorPlacement: function (label, elem) {
        var name = elem.attr('name');
        var spanError = '#' + name;
        $(spanError).append(label.addClass('text-error'));
    },
});

// set time out message success/error
setTimeout(function(){
    $(".alert-success").remove();
}, 7000 ); // 7 secs

setTimeout(function(){
    $(".alert-error").remove();
}, 7000 ); // 7 secs

setTimeout(function(){
    $(".alert-danger").remove();
}, 7000 ); // 7 secs
