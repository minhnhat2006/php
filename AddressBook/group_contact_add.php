<?php

require_once('model/CityModel.php');
require_once('model/EntryModel.php');
require_once('model/GroupModel.php');
require_once('model/GroupEntryModel.php');

$group_id = $_GET["id"];
$groupModel = new GroupModel();
$group = $groupModel->findOne($group_id);

$cityModel = new CityModel();

// Find Contacts matched search term
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $search = isset($_POST["search"]) ? $_POST["search"] : "";

} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $search = isset($_GET["search"]) ? $_GET["search"] : "";

    // Add Contact to Group
    if (isset($_GET["action"]) && $_GET["action"] == "add") {
        $entry_id = isset($_GET["contact_id"]) ? $_GET["contact_id"] : "";

        // Check whether Contact already added to group
        $groupEntryModel = new GroupEntryModel();
        $is_added = $groupEntryModel->isEntryAddedToGroup($group_id, $entry_id);

        if (is_null($is_added)) {
            $errMsg = "There was an error that occurred during adding Contact to Group!";

        } else if ($is_added) {
            $errMsg = "This Contact is already existed in Group!";
        }

        // Store new record in case no error
        if (!isset($errMsg)) {
            $group_entry = [
                'entry_id' => $entry_id,
                'group_id' => $group_id
                ];

            $result = $groupEntryModel->insert($group_entry);

            if ($result) {
                // Redirect to Group Contacts page
                header('Location: group_contact.php?id=' . $group_id);
            } else {
                $errMsg = "There was an error that occurred during adding Contact to Group!";
            }
        }
    }
}


// Load contacts matched with search term
if (!empty($search)) {
    $entryModel = new EntryModel();
    $entries = $entryModel->findByName($search);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Contacts to Group <?php echo $group['name']; ?></title>
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
                <h1>Add Contacts to Group <?php echo $group['name']; ?></h1>
            </div>

            <div class="header-search">
                <form method="post" action="group_contact_add.php?id=<?php echo $group_id . (isset($search) ? '&search=' . $search : ''); ?>">
                    <label for="search">Search Contacts by name:</label>
                    <input type="text" id="search" name="search" value="<?php echo isset($search) ? $search : ''; ?>"></input>
                    <input type="submit" value="Search"></input>
                </form>
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
                                <a href="group_contact.php?id=<?php echo $group_id; ?>">Back to Group Contacts</a>
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
                                <a href='group_contact_add.php?action=add&id=<?php echo $group_id; ?>&contact_id=<?php echo $entry['entry_id']; ?>&search=<?php echo $search; ?>'>Add to Group</a>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="7" style="text-align:right;">
                                <a href="group_contact.php?id=<?php echo $group_id; ?>">Back to Group Contacts</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>