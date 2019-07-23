function save_art_cost(url, postID) {
    $('.save-art-cost-state').empty();
    let art_cost = $("#art-cost-input").val();
    console.log(url);
    console.log(postID)
    console.log(art_cost);
    $.ajax({
        type: 'post',
        url: url,
        data: {
            postID: postID,
            art_cost: art_cost
        },
    })
        .done(data => {
            console.log(data.success);

            if (data.success)
                $('.save-art-cost-state').append('<span class=save-art-cost-success>Đã lưu</span>');
            else
                $('.save-art-cost-state').append('<span class=save-art-cost-error>Lỗi</span>');
        })
        .error(err => {
            alert('err');
            console.log(err);
        });
}