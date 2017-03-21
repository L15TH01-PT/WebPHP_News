$(function () {
    $(".news-comment p.title a").click(function () {
        link = $(this).attr("href");
        $('html, body').animate({
            scrollTop: $(link).offset().top
        }, 200);
    });
    $(".news-comment input[name='btnComment']").click(function () {
        btnThis = $(this);
        var oldtext = $(this).val();
        btnThis.val("Xin chờ");
        btnThis.prop("disabled", true);
        content = $(".news-comment textarea[name='txtComment']").val();
        $.ajax({
            url: "ajax/comment.php",
            type: "POST",
            data: { ac: "add", news: $(".new-contents-item").attr("data-id"), content: content },
            success: function (data) {
                if (data != 0) {
                    //reloadComment();
                    $(".news-comment textarea[name='txtComment']").val("");
                    listComment = $(".news-comment .list-comment");
                    listComment.html(data + listComment.html());
                    $(".news-comment .comment-item .comment-delete a").click(dellComment);
                }
                else {
                    $(".news-comment .noti").html("Không thể thêm bình luận này, xin thử lại sau!");
                }
            }
        }).done(function () {
            btnThis.prop("disabled", false);
            btnThis.val(oldtext);
        });
    });
    $(".news-comment .comment-item .comment-delete a").click(dellComment);
})
var reloadComment = function () {
    $.ajax({
        url: "ajax/comment.php",
        type: "POST",
        data: { ac: "loadcontent", news: $(".new-contents-item").attr("data-id") },
        success: function (data) {
            $(".news-comment").html(data);
        }
    });
}
var dellComment = function () {
    id = $(this).attr("data-id");
    //divthis = $(this).parents("div.comment-item");
    $('<div></div>').appendTo('body')
        .html('<div><h6>Bạn có chắc muốn xóa bình luận này?</h6></div>')
        .dialog({
            modal: true,
            title: 'Xóa bình luận',
            zIndex: 10000,
            autoOpen: true,
            width: '500px',
            resizable: false,
            buttons: {
                Yes: function () {
                    $.ajax({
                        url: "ajax/comment.php",
                        type: "POST",
                        data: { ac: "delete", id: id },
                        success: function (data) {
                            if (data == 1) {
                                reloadComment();
                                //divthis.remove();
                            }
                            else {
                            }
                        }
                    });
                    $(this).dialog("close");
                },
                No: function () {
                    $(this).dialog("close");
                }
            }
        }
    );
    return false;
}