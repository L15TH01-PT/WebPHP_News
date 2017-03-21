$(function () {
    $("#floatlogin").tabs();
    $("#frmRegister input[type='email']").on('input', function (e) {
        $(this).css('border-color', function () {
            var t = $(this).val();
            if (t.length == 0 || !validateEmail(t)) {
                return '#f00';
            }
            else {
                return '#000';
            }
        });
    }).change();
    $("#frmRegister input[type='password']").on('input', function (e) {
        $(this).css('border-color', function () {
            var t = $(this).val();
            if (t.length == 0) {
                return '#f00';
            }
            else {
                return '#000';
            }
        });
    }).change();
    $("input[name='repassword']").on('input', function (e) {
        $(this).css('border-color', function () {
            var repassword = $(this).val();
            var password = $(this).parents("form").find("input[name='password']").val();
            if (repassword.length == 0 || password != repassword) {
                return '#f00';
            }
            else {
                return '#000';
            }
        });
    }).change();
    $("#frmLogin input[name='login']").click(function (argument) {
        btn = $(this);
        noti = btn.parents("form").find("span.noti");
        btn.prop("disabled", true);
        if (!validateLogin()) {
            noti.html("Thông tin nhập chưa đúng, xin kiểm tra lại!");
            $(this).prop("disabled", false);
        }
        else {
            var username = $("#frmLogin input[name='username']").val();
            var password = $("#frmLogin input[name='password']").val();
            $.ajax({
                url: "ajax/user.php",
                type: "POST",
                data: { ac: "login", user: username, pass: password },
                success: function (data) {
                    if(data == 0)
                    {
                        noti.html("Thông tin nhập chưa đúng, xin kiểm tra lại!");
                    }
                    else
                    {
                        reloadLogin();
                        return;
                    }
                }
            }).done(function () {
                btn.prop("disabled", false);
            });
        }
    });
    $("#frmRegister input[name='register']").click(function (argument) {
        btn = $(this);
        noti = btn.parents("form").find("span.noti");
        btn.prop("disabled", true);
        if (!validateRegister()) {
            noti.html("Thông tin nhập chưa đúng, xin kiểm tra lại!");
        }
        else {
            var username = $("#frmRegister input[name='username']").val();
            var password = $("#frmRegister input[name='password']").val();
            $.ajax({
                url: "ajax/user.php",
                type: "POST",
                data: { ac: "register", user: username, pass: password },
                success: function (data) {
                    if (data == 1) {
                        reloadLogin();
                        return;
                    } else if (data == -1) {
                        noti.html("Tài khoản đã tồn tại!");
                    }
                    else {
                        noti.html("Không thể đăng ký tài khoản này, xin tử lại sau vài phút!");
                    }
                }
            });
        }
        btn.prop("disabled", false);
    });
    $("#logout input[name='btnLogout']").click(function (argument) {
        $.ajax({
            url: "ajax/user.php",
            type: "POST",
            data: { ac: "logout" },
            success: function (data) {
                reloadLogin();
                return;
            }
        });

    });
});
validateEmail = function ($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test($email);
}
validateLogin = function () {
    var username = $("#frmLogin input[name='username']").val();
    if (username.length == 0 ||
        //!validateEmail(username) ||
        $("#frmLogin input[name='password']").val().length == 0
        )
        return false;
    return true;
}
validateRegister = function () {
    var username = $("#frmRegister input[name='username']").val();
    var password = $("#frmRegister input[name='password']").val();
    var repassword = $("#frmRegister input[name='repassword']").val();
    if (username.length == 0 ||
        !validateEmail(username) ||
        password.length == 0 ||
        repassword.length == 0 ||
        password != repassword
        )
        return false;
    return true;
}
reloadLogin = function () {
    $.ajax({
        url: "ajax/user.php",
        type: "POST",
        data: { ac: "loadcontent" },
        success: function (data) {
            $("li.login").html(data);
        }
    });
    formcomment = $(".news-comment");
    if (formcomment != null) {
        $.ajax({
            url: "ajax/comment.php",
            type: "POST",
            data: { ac: "loadcontent", news: $(".new-contents-item").attr("data-id") },
            success: function (data) {
                formcomment.html(data);
            }
        });
    }
}