{% include "layouts/header.volt" %}
{% include "layouts/globalMenu.volt" %}
<div id="wrap">
<h1>
    {{ kind }}{{ title }}
</h1>

<!-- table -->
<table class="table table-hover">
    <thead>
        <tr width="400px">
            <th class="table-head">選択</th>
            <th class="table-head">ツイート</th>
            <th class="table-head">ユーザ名</th>
            <th class="table-head">日付</th>
        </tr>
    </thead>
    <tbody>
{% set num = 0 %}
{% for data in page.items %}
{% set num = num + 1 %}
<tr>
    <td class='list'>
        <button id='a{{ num }}' name='check[]' value='{{ data.tweet_id }}' onclick="post(a{{ num }},{{ data.tweet_id }});disabled = true;"><img src='{{ url('img/star.png') }}'></button>
    </td>
    <td class='list'>
        <div ondblclick="window.open('{{'https://twitter.com/' ~ data.account_name ~ '/status/'  ~ data.tweet_id }}')">{{ data.tweet }}</div>
    </td>
    <td class='list'>
        {{ data.sender_name }}
    </td>
    <td onclick="getElementById('a{{ num }}') . click();" class='list'>
        {{ data.time }}
    </td>
</tr> 
{% endfor %}
    </tbody>
</table>
<!-- popup -->
<div id="popup">
    <button >ボタン</button>
</div>

<!-- pager -->
<nav id="pager">
    <ul class="pagination">
         <li>
            <a href="{{ url('tables/local/app')}}" aria-label="最初のページへ">
                <span aria-hidden="true">最初へ</span>
            </a>
        </li>
        <li>
            <a href="{{ url('tables/local/app?page=' ~ page.before )}}" aria-label="前のページへ">
                <span aria-hidden="true">前へ</span>
            </a>
        </li>
        <li class="disabled"><a href="#">{{ page.current ~ ' / ' ~ page.total_pages }}</a></li>
        <li>
            <a href="{{ url('tables/local/app?page=' ~ page.next) }}" aria-label="次のページへ">
                <span aria-hidden="true">次へ</span>
            </a>
        </li>
        <li>
            <a href="{{ url('tables/local/app?page=' ~ page.last) }}" aria-label="最後のページへ">
                <span aria-hidden="true">最後へ</span>
            </a>
        </li>
    </ul>
</nav>

</div>
{% include "layouts/footer.volt" %}
