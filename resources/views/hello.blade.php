<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!--<ul>                                // первый способ вывода информации
        <?php foreach ($int as $v): ?>
            <li><?= $v;?></li>
        <?php endforeach;?>
    </ul>-->

    <ul>                                   <!-- второй способ -->
        @foreach($int as $v)
            <li>{{$v}}</li>
        @endforeach
    </ul>

</body>
</html>
