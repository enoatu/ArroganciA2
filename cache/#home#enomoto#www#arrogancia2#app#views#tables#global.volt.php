<script>
function post(id, tweet_id) {
    $.ajax({
        type: 'post',
        url: '<?= $this->url->get('Api/register') ?>',
        data: {
            'session_id': $.cookie('PHPSESSID'),
            'tweet_id': tweet_id,
            'kind': '<?= $kind ?>'
        },
        success: function(data) {
            $(function(){
                $(id).children('img').attr('src','<?= $this->url->get('img/home.png') ?>');
            });
        },
        error: function () {
            alert("読み込み失敗");
        }
    });
}
</script>
