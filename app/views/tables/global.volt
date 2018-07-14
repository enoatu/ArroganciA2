<script>
$(function(){
    $({{ id }).click(
        function(){
            var postdata= $("#postarea").val();
            $.ajax({
                type: 'post',
                url: 'save.php',
                data: {
                    //渡すデータ
                    'save': postdata
                },
                success: function(data){
                    $("#postarea").html(data);
                    toastr.options.timeOut = 1500; // 3秒
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "3000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    Command: toastr["info"]("", "保存しました");
                    $('#linkButton').click(function() {
                        toastr.success('click');
                    });
                }
            });
        }
    );
    $('.tab li').click(function() {
        //.index()を使いクリックされたタブが何番目かを調べ、
        //indexという変数に代入します。
        var index = $('.tab li').index(this);
        //コンテンツを一度すべて非表示にし、
        $('.content li').css('display','none');
        //クリックされたタブと同じ順番のコンテンツを表示します。
        $('.content li').eq(index).css('display','block');
        //一度タブについているクラスselectを消し、
        $('.tab li').removeClass('select');

        //クリックされたタブのみにクラスselectをつけます。
        $(this).addClass('select')
    });
});
</script>
