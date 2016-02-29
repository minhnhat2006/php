<?php

require_once('model/GroupModel.php');

// Validate and insert new group
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET["id"];
    $name = $_POST["group_name"];

    // Validate required fields
    if (empty($name)) {
        $errMsg = "Name is required";
    }

    // Update group
    if (!isset($errMsg)) {
        $groupModel = new GroupModel();

        $group = ['name' => $name];

        $result = $groupModel->update($id, $group);

        if ($result) {
            // Redirect to Manage Group page
            header('Location: group_list.php');
        } else {
            $errMsg = "There was an error that occurred during updating group!";
        }
    }

}

$id = $_GET["id"];
$groupModel = new GroupModel();
$group = $groupModel->findOne($id);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Manage Group - Edit Group</title>
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
                <h1>Edit Group</h1>
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
                                    <label for="group_name" class="required">Name</label>
                                    <input type="text" name="group_name" id="group_name" value="<?php echo $group['name']; ?>">
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