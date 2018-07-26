{% include "layouts/header.volt" %}
{% include "layouts/globalMenu.volt" %}

<div id="wrap" class="center">
    <h3>
        {{ title }}
    </h3>

    <h3>共有してくださると励みになります。</h3>
    <?php
     $share_url_syncer = "https://enoatu.com/ArroganciA2";        //シェア対象のURLアドレスを指定する (HTML部分は変更不要)
     ?>

     <div class="social-area-syncer">
         <ul class="social-button-syncer">
             <!-- Twitter -->
             <li class="sc-tw"><a data-url="<?php echo $share_url_syncer ; ?>" href="https://twitter.com/share" class="twitter-share-button" data-lang="ja" data-count="vertical" data-dnt="true">ツイート</a></li>

             <!-- Facebook -->
             <li class="sc-fb"><div class="fb-like" data-href="<?php echo $share_url_syncer ; ?>" data-layout="box_count" data-action="like" data-show-faces="true" data-share="false"></div></li>

             <!-- Google+ -->
             <li><div data-href="<?php echo $share_url_syncer ; ?>" class="g-plusone" data-size="tall"></div></li>

             <!-- はてなブックマーク -->
             <li><a href="http://b.hatena.ne.jp/entry/<?php echo $share_url_syncer ; ?>" class="hatena-bookmark-button" data-hatena-bookmark-layout="vertical-balloon" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border:none;" /></a></li>

             <!-- pocket -->
             <!--                <li><a data-save-url="--><?php //echo $share_url_syncer ; ?><!--" data-pocket-label="pocket" data-pocket-count="vertical" class="pocket-btn" data-lang="en"></a></li>-->

             <!-- LINE [画像は公式ウェブサイトからダウンロードして下さい] -->
             <li class="sc-li"><a href="http://line.me/R/msg/text/?<?php echo rawurlencode($share_url_syncer); ?>"><img src="images/line.png" width="36" height="60" alt="LINEに送る" class="sc-li-img"></a></li>
         </ul>

         <!-- Facebook用 -->
         <div id="fb-root"></div>

     </div>
</div>
<style>/******************************

ソーシャルエリア全体を囲む要素
        * 他のコンテンツと距離を取りたい場合は[margin]を設定して下さい

        ******************************/
.social-area-syncer {
    width: 100% ;
    min-height: 190px ;
    background: #F5F1E9 ;    /* 背景色 */
    padding: 1.5em 0 ;
}
                                        /* デスクトップPCでは高さを拡張する */
                                        @media screen and ( min-width:480px ) {
                                            .social-area-syncer {
                                                min-height: 119px ;
                                            }
                                        }


                                        /******************************

                                        [ul]要素

                                         ******************************/
                                        /* スマホ */
                                        ul.social-button-syncer {
                                            width: 238px ;
                                            margin: 24px auto ;
                                            padding: 0 ;
                                            border: none ;
                                            list-style-type: none ;
                                        }

                                        /* デスクトップ */
                                        @media screen and ( min-width:480px ) {
                                            ul.social-button-syncer {
                                                width: 410px ;
                                            }
                                        }


                                        /******************************

                                        [li]要素

                                         ******************************/
                                        ul.social-button-syncer li {
                                            float: left ;
                                            text-align: center ;
                                            height: 71px ;
                                            margin: 0 8px ;
                                            padding:0 ;
                                        }


                                        /******************************

                                        各種ボタン

                                         ******************************/
                                        /* [Twitter] */
                                        .sc-tw {
                                            width: 71px ;
                                        }

                                        /* [Facebook] */
                                        .sc-fb {
                                            z-index: 99 ;
                                            width: 69px ;
                                        }

                                        /* [LINE] */
                                        .sc-li {
                                            width: 50px ;
                                        }

                                        .sc-li-img {
                                            border: none ;
                                            margin: 0 auto ;
                                            padding:0 ;
                                            width: 36px ;
                                            height: 60px ;
                                        }

                                        /* デスクトップPCではLINEボタンを表示しない */
                                        @media screen and ( min-width:480px ) {
                                            .sc-li {
                                                display: none ;
                                            }
                                        }</style>
<script>/* DOMの読み込み完了後に処理 */
if(window.addEventListener) {
    window.addEventListener( "load" , shareButtonReadSyncer, false );
}else{
    window.attachEvent( "onload", shareButtonReadSyncer );
}

/* シェアボタンを読み込む関数 */
function shareButtonReadSyncer(){

    //遅延ロードする場合は次の行と、終わりの方にある行のコメント(//)を外す
    //setTimeout(function(){

    //Twitter
    window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));

    //Facebook
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    //Google+
    var scriptTag = document.createElement("script");
    scriptTag.type = "text/javascript"
        scriptTag.src = "https://apis.google.com/js/platform.js";
    scriptTag.async = true;
    document.getElementsByTagName("head")[0].appendChild(scriptTag);

    //はてなブックマーク
    var scriptTag = document.createElement("script");
    scriptTag.type = "text/javascript"
        scriptTag.src = "https://b.st-hatena.com/js/bookmark_button.js";
    scriptTag.async = true;
    document.getElementsByTagName("head")[0].appendChild(scriptTag);

    //pocket
    (!function(d,i){if(!d.getElementById(i)){var j=d.createElement("script");j.id=i;j.src="https://widgets.getpocket.com/v1/j/btn.js?v=1";var w=d.getElementById(i);d.body.appendChild(j);}}(document,"pocket-btn-js"));

    //},5000);    //ページを開いて5秒後(5,000ミリ秒後)にシェアボタンを読み込む

}</script>
{% include "layouts/footer.volt" %}
