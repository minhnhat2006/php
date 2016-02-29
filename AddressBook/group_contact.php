<?php

require_once('model/CityModel.php');
require_once('model/EntryModel.php');
require_once('model/GroupModel.php');
require_once('model/GroupEntryModel.php');

$group_id = $_GET["id"];
$groupModel = new GroupModel();
$group = $groupModel->findOne($group_id);

$entryModel = new EntryModel();
$entries = $entryModel->findByGroup($group_id);
$entries_count = count($entries);

$cityModel = new CityModel();

// Remove Contact from Group
if (isset($_GET["action"]) && $_GET["action"] == "remove") {
    $entry_id = isset($_GET["contact_id"]) ? $_GET["contact_id"] : "";

    $groupEntryModel = new GroupEntryModel();

    $group_entry = ['group_id' => $group_id, 'entry_id' => $entry_id];
    $result = $groupEntryModel->delete($group_entry);

    if ($result) {
        // Refresh current page
        header('Location: group_contact.php?id=' . $group_id);
    } else {
        $errMsg = "There was an error that occurred during removing Contact from Group!";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Group Contacts</title>
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
                <h1>Group Contacts - <?php echo $group['name'] . "($entries_count)"; ?></h1>
            </div>

            <div class="content">
                <?php if (isset($errMsg)) { ?>
                <span class="errorMsg">*<?php echo $errMsg; ?></span>
                <?php } ?>

                <table class="entry-list">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>First Name</th>
                            <th>Street</th>
                            <th>Zip Code</th>
                            <th>City</th>
                            <th width=120>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7" style="text-align:right;">
                                <a href="group_contact_add.php?id=<?php echo $group_id; ?>">Add Contact to Group</a>
                            </td>
                        </tr>
                    <?php if(!empty($entries)) {
                        foreach($entries as $key => $entry) { ?>
                        <tr>
                            <td><?php echo $key + 1; ?></td>
                            <td><?php echo $entry['name']; ?></td>
                            <td><?php echo $entry['first_name']; ?></td>
                            <td><?php echo $entry['street']; ?></td>
                            <td><?php echo $entry['zip_code']; ?></td>
                            <td>
                                <?php $city = $cityModel->findOne($entry['city_id']);

                                if ($city) {
                                    echo $city['name']; 
                                } ?>
                            </td>
                            <td style="text-align:right;">
                                <?php if ($entry['is_inherited'] == 0) { ?>
                                <a href='group_contact.php?action=remove&id=<?php echo $group_id; ?>&contact_id=<?php echo $entry['entry_id']; ?>'>Remove Contact</a>
                                <?php } else { ?>
                                <span>Inherited Contact</span>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="7" style="text-align:right;">
                                <a href="group_contact_add.php?id=<?php echo $group_id; ?>">Add Contact to Group</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>