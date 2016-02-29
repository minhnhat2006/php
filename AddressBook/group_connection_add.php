<?php

require_once('model/GroupModel.php');
require_once('model/GroupConnectorModel.php');

$groupModel = new GroupModel();
$groups = $groupModel->findAll();

$parent_group = isset($_GET['parent_id']) ? $_GET['parent_id'] : '';
$child_group = isset($_GET['child_id']) ? $_GET['child_id'] : '';

// Validate and insert new group
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $parent_group_id = $_POST["parent_group"];
    $child_group_id = $_POST["child_group"];

    // Validate selected groups
    // Parent group and child group cannot be the same
    if ($parent_group_id == $child_group_id) {
        $errMsg = "Group cannot connect to itself!";
    }

    // Child group must not be inherited parent group before
    $groupConnectorModel = new GroupConnectorModel();
    $is_inherited = $groupConnectorModel->isGroupInheritedFromGroup($parent_group_id, $child_group_id);

    if ($is_inherited == false) {
        $is_inherited = $groupConnectorModel->isGroupInheritedFromGroup($child_group_id, $parent_group_id);
    }

    if (is_null($is_inherited)) {
        $errMsg = "There was an error that occurred during adding Group connection!";

    } else if ($is_inherited) {
        $errMsg = "This group connection already added!";
    }

    // Insert new group_connection
    if (!isset($errMsg)) {
        $result = $groupConnectorModel->addGroupConnection($parent_group_id, $child_group_id);

        if ($result) {
            // Redirect to Group Connections page
            header('Location: group_connection.php?id=' . (!empty($parent_group) ? $parent_group : $child_group));
        } else {
            $errMsg = "There was an error that occurred during adding group connection!";
        }
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Manage Group - Add Group Connection</title>
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
                <h1>Add Group Connection</h1>
            </div>

            <div class="content">

                <?php if (isset($errMsg)) { ?>
                <span class="errorMsg">*<?php echo $errMsg; ?></span>
                <?php } ?>

                <form method="post">
                    <table class="entry-list entry-edit">
                        <tbody>
                            <tr>
                                <td style="text-align:right;">
                                    <input type="submit" value="Save">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="parent_group" class="required">Parent Group</label>
                                    <select name="parent_group" id="parent_group">
                                    <?php foreach ($groups as $group) { ?>
                                        <option value="<?php echo $group['group_id']; ?>" <?php echo $group['group_id'] == $parent_group ? "selected" : "" ?>><?php echo $group['name']; ?></option>
                                    <?php } ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="child_group" class="required">Child Group</label>
                                    <select name="child_group" id="child_group">
                                    <?php foreach ($groups as $group) { ?>
                                        <option value="<?php echo $group['group_id']; ?>" <?php echo $group['group_id'] == $child_group ? "selected" : "" ?>><?php echo $group['name']; ?></option>
                                    <?php } ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:right;">
                                    <input type="submit" value="Save">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>