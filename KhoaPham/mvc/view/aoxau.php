<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    div {
        padding: 20px;
    }

    #header {
        background-color: yellow;
    }
    #footer {
        background-color: yellow;
    }
</style>

<body>
    <div id="header"></div>
    <div id="content">
        <?php
        require_once "./mvc/view/pages/".$data['page'].".php";
        ?>
    </div>
</body>

</html>