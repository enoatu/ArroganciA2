<div id="wrap">
<h1>
    {{ title }}
</h1>
<div class="input-group">
    <input type="text" class="form-control" placeholder="テキスト入力欄">
    <span class="input-group-btn">
        <button type="button" class="btn btn-default">絞り込み</button>
    </span>
</div>
{{ form(toLocalorGlobal ~ '/index/' ~ kind) }}
<h3>
    <button type="submit" class="btn btn-default btn-lg"> {{ reverseTitle }} </button>
</h3>
{{ end_form() }}
<!-- table -->
<table class="table table-hover table-bordered table-condensed">
    <thead>
        <tr>
            <th class="table-head col-xs-1">選択</th>
            <th class="table-head col-xs-7">ツイート</th>
            <th class="table-head col-xs-2">ユーザ名</th>
            <th class="table-head col-xs-2">日付</th>
        </tr>
    </thead>
    <tbody>

