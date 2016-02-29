<?php

require_once('model/GroupModel.php');

$groupModel = new GroupModel();
$groups = $groupModel->findAll();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Manage Group</title>
        <link rel="stylesheet" type="text/css" href="assert/css/style.css">
    </head>

    <body>
        <div class="container">
            <div class="header-menu">
                <ul class="menu">
                    <li><a href="entry_list.php">Address Book</a></li>
                    <li><a href="group_list.php">Group</a></li>
                </ul>
            </div>

            <div class="title">
                <h1>Manage Group</h1>
            </div>

            <div class="content">
                <table class="entry-list">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th width=220>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7" style="text-align:right;">
                                <a href="group_add.php">Add Group</a>
                            </td>
                        </tr>
                    <?php if(!empty($groups)) {
                        foreach($groups as $key => $group) { ?>
                        <tr>
                            <td><?php echo $key + 1; ?></td>
                            <td><?php echo $group['name']; ?></td>
                            <td style="text-align:right;">
                                <a href='group_edit.php?id=<?php echo $group['group_id']; ?>'>Edit Group</a>
                                <a href='group_connection.php?id=<?php echo $group['group_id']; ?>'>Manage Connections</a>
                                <a href='group_contact.php?id=<?php echo $group['group_id']; ?>'>Manage Contacts</a>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="7" style="text-align:right;">
                                <a href="group_add.php">Add Group</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>