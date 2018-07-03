{% include "layouts/header.volt" %}
{% include "layouts/globalMenu.volt" %}
<div id="wrap">
<h1>
    テーブル
</h1>
<form name="f1" action="post">
<table class="table table-hover">
    <thead>
        <tr width="400px">
            <th>選択</th>
            <th>ツイート</th>
            <th>ユーザ名</th>
            <th>日付</th>
        </tr>
    </thead>
    <tbody>
{% set num = 0 %}
{% for data in page.items %}
{% set num = num + 1 %} 
<tr width="400px">
    <td onclick="getElementById('a+{{ num }}') . click();" class='td32'>
        <input type='checkbox' id='a+{{ num }}'name='check[]' value='{{ data.tweet_id }}' onclick="getElementById('a+{{ num }}').click();show();">
    </td>
    <td onclick="getElementById('a+{{ num }}') . click();" class='td32'>
        {{ data.tweet }}
    </td>
    <td onclick="getElementById('a+{{ num }}') . click();" class='td32'>
        {{ data.sender_name }}
    </td>
    <td onclick="getElementById('a+{{ num }}') . click();" class='td32'>
        {{ data.time }}
    </td>
</tr> 
{% endfor %}
    </tbody>
</table>
</form>
{{ link_to('tables/index/app', '最初') }}
{{ link_to('tables/index/app?page=' ~ page.before, '前へ') }}
{{ link_to('#', page.current ~ '/' ~ page.total_pages) }}
{{ link_to('tables/index/app?page=' ~ page.next, '次へ') }}
{{ link_to('tables/index/app?page=' ~ page.last, '最後') }}
</div>
{% include "layouts/footer.volt" %}
