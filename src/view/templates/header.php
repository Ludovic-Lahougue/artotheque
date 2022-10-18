<!DOCTYPE html>
<html lang="fr">

<head>
    <title><?php echo $title ?? null ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />

</head>

<body>
    <?php if(isset($menu) && is_array($menu)) {?>
        <nav>
            <ul>
            <?php foreach($menu as $item) { ?>
                <li>
                    <a href="<?php echo $item['link'] ?>">
                        <?php echo $item['text'] ?>
                    </a>
                </li>
            <?php } ?>
            </ul>
        </nav>
    <?php } ?>
    <hr>
    <main>
