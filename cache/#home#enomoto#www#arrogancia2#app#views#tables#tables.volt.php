<div id="wrap">
<h3>
    <?= $title ?>
</h3>
<?= $this->tag->form([$toLocalorGlobal . '/index/' . $kind]) ?>
<div class="input-group" id="searchForm">
    <input type="text" class="form-control" value="<?= $postedWords ?>" placeholder="例) android おもしろい" name="words">
    <span class="input-group-btn">
        <button type="submit" class="btn btn-default">絞り込み</button>
    </span>
    <span class="input-group-btn">{
        { form(toLocalorGlobal ~ '/index/' ~ kind) }}
    <button type="submit" class="btn btn-default">全表示</button>
        <?= $this->tag->endForm() ?>
    </span>

</div>
<?= $this->tag->endForm() ?>
<?= $this->tag->form([$toReLocalorGlobal . '/index/' . $kind]) ?>
<h3>
    <button type="submit" class="btn btn-default" id="reverseTitle">
        <?= $reverseTitle ?> 
    </button>
</h3>
<?= $this->tag->endForm() ?>
<!-- table -->
<table class="table table-hover table-bordered table-striped table-condensed">
    <thead>
        <tr>
            <th class="table-head col-xs-1">選択</th>
            <th class="table-head col-xs-7">ツイート</th>
            <th class="table-head col-xs-2">ユーザ名</th>
            <th class="table-head col-xs-2">日付</th>
        </tr>
    </thead>
    <tbody>

