<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $data['title'] ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assert/css/style.css">
    </head>

    <body>
        <div class="container">
            <div class="header-menu">
                <ul class="menu">
                    <li><a href="<?php echo BASE_URL; ?>entry/list">Address Book</a></li>
                    <li><a href="<?php echo BASE_URL; ?>group/list">Group</a></li>
                </ul>
            </div>
            <div class="title">
                <h1><?php echo $data['title']; ?></h1>
            </div>
            <?php echo empty($data['search_section']) ? '' : $data['search_section']; ?>
            <div class="content">
                <?php if (isset($data['errMsg'])) { ?>
                <span class="errorMsg">*<?php echo $data['errMsg']; ?></span>
                <?php } ?>