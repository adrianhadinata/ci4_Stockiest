<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link rel="icon" href="/images/ico.png">
    <link href="/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        * {
            box-sizing: border-box;
        }
    </style>
</head>

<body>

    <?= $this->renderSection('content'); ?>

    <script src="/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>