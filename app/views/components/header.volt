<!DOCTYPE html>
<html lang="ja">
<head>
    <title>{{ title }}</title>
    <link rel="apple-touch-icon" href="{{ url('img/ico.ico') }}">
    <link rel="icon" href="{{ url('img/ico.ico') }}">
    <link rel="shortcut icon" href="{{ url('img/ico.ico') }}">
    <meta name="viewport" content="width=device-width">
    <?php $this->assets->outputCss(); ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="manifest" href="{{ url('./manifest.json') }}">
</head>
<body>
 <script>
    // service workerが有効なら、service-worker.js を登録します
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register("{{ url('js/service-worker.js') }}");
    }   
</script>

