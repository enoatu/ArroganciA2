{% include "layouts/header.volt" %}
{% include "layouts/globalMenu.volt" %}
<div id="wrap">
<h1>
    テーブル
</h1>

<table class="table table-hover">
    <thead>
        <tr>
            <th>ツイート</th>
            <th>選択</th>
            <th>日付</th>
        </tr>
    </thead>
    <tbody>
{% for index, value in numbers %}
        <tr>
            <td>{{ value }}</td>
        </tr>
{% endfor %}
    </tbody>
</table>
</div>
{% include "layouts/footer.volt" %}
