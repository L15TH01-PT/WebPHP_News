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
        content = $.trim($(".news-comment textarea[name='txtComment']").val());

        if(content.length < 6){
            $(".news-comment .noti").html("Bình luận ít nhất phải 6 ký tự.");
            $(".news-comment .noti").show();
            btnThis.prop("disabled", false);
            btnThis.val(oldtext);
            $(".news-comment textarea[name='txtComment']").focus();
            return;
        }
        if(content.length > 200){
            $(".news-comment .noti").html("Bình luận quá dài. Bình luận không nên quá 200 ký tự");
            $(".news-comment .noti").show();
            btnThis.prop("disabled", false);
            btnThis.val(oldtext);
            $(".news-comment textarea[name='txtComment']").focus();
            return;
        }

        $.ajax({
            url: "ajax/comment.php",
            type: "POST",
            data: { ac: "add", news: $(".new-contents-item").attr("data-id"), content: content },
            success: function (data) {
                if (data != 0) {
                    //reloadComment();
                    $(".news-comment .noti").hide();
                    $(".news-comment textarea[name='txtComment']").val("");
                    $(".news-comment span.counttext").html("0/200");
                    listComment = $(".news-comment .list-comment");
                    var item = $(data);
                    item.hide();
                    item.prependTo(listComment);
                    item.fadeIn('slow');
                    item.find(".comment-delete a").click(dellComment);
                }
                else {
                    $(".news-comment .noti").html("Không thể thêm bình luận này, xin thử lại sau!");
                    $(".news-comment .noti").show();
                }
            }
        }).done(function () {
            btnThis.prop("disabled", false);
            btnThis.val(oldtext);
        });
    });
    $(".news-comment .comment-item .comment-delete a").click(dellComment);
    $(".news-comment textarea[name='txtComment']").on("change keyup paste", function(){
        counttext = $.trim($(this).val()).length;
        $(".news-comment span.counttext").html(counttext+"/200");
    });
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
    divthis = $(this).parents("div.comment-item");
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
                                //reloadComment();
                                divthis.fadeOut('slow', function() {
                                    divthis.remove();
                                });
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