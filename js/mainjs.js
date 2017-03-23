var loadContentAjax = function (url, urlRewrite) {
    $.ajax({
        url: url,
        //data: { page: $("div.back").attr("data-page")},
        success: function (data) {
            //history.pushState(null, null, urlRewrite);
            $("#list_news_page").remove();
            item = $(data);
            item.hide();
            $("#new-contents-left").append(item);
            item.fadeIn('slow');
        }
    });
    return false;
}