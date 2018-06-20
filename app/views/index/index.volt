<html>
<head>
    <title>nopaste</title>
    <meta name="viewport" content="width=device-width">
        <?php $this->assets->outputCss(); ?>
</head>
<body>
    <h1>
        {{ hoge }}    simple nopaste by markdown
   </h1>

    <?php echo $this->tag->form("index/register");?>

    <?php echo $this->tag->textarea("text");?>
    

    <p>
    <?php echo $this->tag->submitButton("Make");?>
    </p>
    </form>
</body>
</html>
