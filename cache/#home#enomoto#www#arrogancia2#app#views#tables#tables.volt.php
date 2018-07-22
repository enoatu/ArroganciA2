<div id="wrap">
<h1>
    <?= $title ?>
</h1>
<?= $this->tag->form(['tables/' . $toIndexorGlobal . '/' . $kind]) ?>
<h3>
    <button type="submit" class="btn btn-default btn-lg"> <?= $reverseTitle ?> </button>
</h3>
<?= $this->tag->endForm() ?>
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

