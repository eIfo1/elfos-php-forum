<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name ?> - Elfo's Forum</title>
    <link rel="stylesheet" href="/css/style.css">
    <!-- import a good font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">


</head>

<body>
    <div class="container">
        <!-- header -->
        <div class="wrapper">
            <div class="content">
                <div class="brand">
                    <h1 class="center">
                        <?php echo $name ?> - Elfo's Forum
                    </h1>

                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="content">
                <div class="links">
                    <a href="/forum">forum</a>
                    <a href="/forum">register</a>
                    <a href="/forum">login</a>
                </div>
            </div>
        </div>
        <!-- page content -->
        <div class="wrapper">
            <div class="content">
                <?php
                // include view
                include($view);
                ?>
            </div>
        </div>
        <div class="wrapper">
            <div class="content">
                Elfo's Forum - PHP Project
                &bull;
                <a href="https://github.com/eIfo1/elfos-php-forum">github repo</a>
                &bull;
                <a href="https://github.com/eIfo1/elfos-php-forum/issues">issues</a>
                &bull;
                <a href="https://github.com/eIfo1/elfos-php-forum/blob/master/LICENSE">license</a>
                &bull;
                <a href="https://github.com/eIfo1/">github profile</a>
            </div>
        </div>
    </div>

</body>

</html>