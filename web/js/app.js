
$(document).ready(function () {
    $('.pinned-star').click(function (event) {
        event.preventDefault();
        let link = $(this);
        $.ajax({
            url: '/site/favorite?id=' + link.attr('bookId'),
            type: 'get',
            success: function () {
                let img = link.children().first();
                if(img.attr('src') === '/svg/star-fill.svg') {
                    img.attr('src', '/svg/star.svg')
                }
                else {
                    img.attr('src', '/svg/star-fill.svg')
                }
            },
            error: function (jqXHR, errMsg) {

            }
        });
        return false;
    })
})
