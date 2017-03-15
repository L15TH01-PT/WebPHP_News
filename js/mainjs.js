var loadContentAjax = function (url, urlRewrite) {
    $.ajax({
        url: url,
        //data: { page: $("div.back").attr("data-page")},
        success: function (data) {
            //history.pushState(null, null, urlRewrite);
            $("#list_news_page").remove();
            $("#new-contents-left").html($("#new-contents-left").html() + data);
        }
    });
    return false;
}