<?php

require_once('model/GroupModel.php');
require_once('model/GroupConnectorModel.php');

$group_id = isset($_GET["id"]) ? $_GET["id"] : "";

// Remove one Group Connection
if (isset($_GET["action"]) && $_GET["action"] == "remove") {
    $parent_group_id = isset($_GET["parent_id"]) ? $_GET["parent_id"] : "";
    $child_group_id = isset($_GET["child_id"]) ? $_GET["child_id"] : "";

    $groupConnectorModel = new GroupConnectorModel();

    $result = $groupConnectorModel->removeGroupConnection($parent_group_id, $child_group_id);

    if ($result) {
        // Refresh current page
        header('Location: group_connection.php?id=' . $group_id);
    } else {
        $errMsg = "There was an error that occurred during removing group connection!";
    }
}

$groupModel = new GroupModel();
$group = $groupModel->findOne($group_id);

$parent_groups = $groupModel->findParentGroupsByGroupId($group_id);
$parent_groups_count = count($parent_groups);

$child_groups = $groupModel->findChildGroupsByGroupId($group_id);
$child_groups_count = count($child_groups);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Group Connections</title>
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
                <h1>Group Connections - <?php echo $group['name']; ?></h1>
            </div>

            <div class="content">
                <h3>Parent Groups <?php echo "($parent_groups_count)"; ?></h3>

                <table class="entry-list">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th width=150>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7" style="text-align:right;">
                                <a href="group_connection_add.php?child_id=<?php echo $group['group_id']; ?>">Add Parent Group</a>
                            </td>
                        </tr>
                    <?php if(!empty($parent_groups)) {
                        foreach($parent_groups as $key => $parent_group) { ?>
                        <tr>
                            <td><?php echo $key + 1; ?></td>
                            <td><?php echo $parent_group['name']; ?></td>
                            <td style="text-align:right;">
                                <?php if ($parent_group['is_inherited'] == 0) { ?>
                                <a href='group_connection.php?action=remove&id=<?php echo $group_id; ?>&parent_id=<?php echo $parent_group['group_id']; ?>&child_id=<?php echo $group_id; ?>'>Remove Parent Group</a>
                                <?php } else { ?>
                                <span>Inherited Group</span>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="7" style="text-align:right;">
                                <a href="group_connection_add.php?child_id=<?php echo $group['group_id']; ?>">Add Parent Group</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>


                <h3>Child Groups <?php echo "($child_groups_count)"; ?></h3>

                <table class="entry-list">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th width=150>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7" style="text-align:right;">
                                <a href="group_connection_add.php?parent_id=<?php echo $group['group_id']; ?>">Add Child Group</a>
                            </td>
                        </tr>
                    <?php if(!empty($child_groups)) {
                        foreach($child_groups as $key => $child_group) { ?>
                        <tr>
                            <td><?php echo $key + 1; ?></td>
                            <td><?php echo $child_group['name']; ?></td>
                            <td style="text-align:right;">
                                <?php if ($child_group['is_inherited'] == 0) { ?>
                                <a href='group_connection.php?action=remove&id=<?php echo $group_id; ?>&parent_id=<?php echo $group_id; ?>&child_id=<?php echo $child_group['group_id']; ?>'>Remove Child Group</a>
                                <?php } else { ?>
                                <span>Inherited Group</span>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="7" style="text-align:right;">
                                <a href="group_connection_add.php?parent_id=<?php echo $group['group_id']; ?>">Add Child Group</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>