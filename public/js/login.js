
$("#form_login").validate({
    onfocusout: false,
    onclick: false,
    rules: {
        account: {
          required: true,

        },
        password: {
          required: true,
        }
    },
    messages: {
        account: {
          required: "Bạn chưa điền email hoặc sđt",
        },
        password: {
          required: "Bạn chưa điền password"
        }
    },

    errorPlacement: function (label, elem) {
    var name = elem.attr('name');
    var spanError = '#' + name;
    $(spanError).append(label.addClass('text-error'));
    },
});

$("#form_change_password_first").validate({
    onfocusout: false,
    onclick: false,
    rules: {
        password_first: {
            required: true,
            minlength: 8,
            maxlength: 60,
        },
        confirm_password_first: {
            required: true,
            minlength: 8,
            maxlength: 60,
            equalTo: "#new_pass_first"
        }
    },
    messages: {
        password_first: {
            required: "Vui lòng nhập mật khẩu mới.",
            minlength: "Mật khẩu nhập trên 8 ký tự.",
            maxlength: "Mật khẩu mới quá dài."
        },
        confirm_password_first: {
            required: "Vui lòng nhập lại mật khẩu",
            minlength: "Mật khẩu xác nhận nhập 8 ký tự.",
            maxlength: "Mật khẩu xác nhận quá dài.",
            equalTo: "Mật khẩu xác nhận không đúng."
        },
    },
    errorPlacement: function (label, elem) {
        var name = elem.attr('name');
        var spanError = '#' + name;
        $(spanError).append(label.addClass('text-error'));
    },
});

$("#form_reset_password").validate({
    onfocusout: false,
    onclick: false,
    rules: {
        password_reset: {
            required: true,
            minlength: 8,
            maxlength: 60,
        },
        confirm_password_reset: {
            required: true,
            minlength: 8,
            maxlength: 60,
            equalTo: "#new_pass_reset"
        }
    },
    messages: {
        password_reset: {
            required: "Vui lòng điền mật khẩu mới.",
            minlength: "Mật khẩu mới ít nhất 8 ký tự.",
            maxlength: "Mật khẩu mới không được vượt quá 60 ký tự."
        },
        confirm_password_reset: {
            required: "Vui lòng nhập lại mật khẩu mới để xác nhận",
            minlength: "Mật khẩu xác nhận ít nhất 8 ký tự.",
            max: "Mật khẩu xác nhận không được vượt quá 60 ký tự.",
            equalTo: "Mật khẩu xác nhận không chính xác."
        },
    },
    errorPlacement: function (label, elem) {
        var name = elem.attr('name');
        var spanError = '#' + name;
        $(spanError).append(label.addClass('text-error'));
    },

});

$("#form_restore_password").validate({
    onfocusout: false,
    onclick: false,
    rules: {
        restore_password: {
            required: true,
            email: true,
        }
    },
    messages: {
        restore_password: {
            required: "Vui lòng điền email",
            email: "Sai định dạng email",
        },
    },
    errorPlacement: function (label, elem) {
        var name = elem.attr('name');
        var spanError = '#' + name;
        $(spanError).append(label.addClass('text-error'));
    },
});

// set time out message success
setTimeout(function(){
    $(".alert-success").remove();
}, 7000 ); // 7 secs

setTimeout(function(){
    $(".alert-error").remove();
}, 7000 ); // 7 secs

setTimeout(function(){
    $(".alert-err").remove();
}, 7000 ); // 7 secs