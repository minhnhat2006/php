<?php

require_once('model/CityModel.php');
require_once('model/EntryModel.php');

$entryModel = new EntryModel();
$entries = $entryModel->findAll();

$cityModel = new CityModel();

if (isset($_GET["action"]) && $_GET["action"] == "xml") { // Export list to xml

    for ($i=0; $i < count($entries); $i++) {
        $city = $cityModel->findOne($entries[$i]["city_id"]);
        $entries[$i]["city"] = $city["name"];
    }

    require_once('helper/Util.php');

    header('Content-type: text/xml');
    //to download: header('Content-Disposition: attachment; filename="text.xml"');
    $xml = Util::entitiesToXml($entries, "Entry", ["name", "first_name", "street", "zip_code", "city"]);
    print($xml);
    exit;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Address Book</title>
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
                <h1>Address Book</h1>
            </div>

            <div class="content">
                <table class="entry-list">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>First Name</th>
                            <th>Street</th>
                            <th>Zip Code</th>
                            <th>City</th>
                            <th width=90>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7" style="text-align:right;">
                                <a href="entry_list.php?action=xml" target="blank">Export to XML</a>
                                <a href="entry_add.php">Add Contact</a>
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
                                <a href='entry_edit.php?id=<?php echo $entry['entry_id']; ?>'>Edit Contact</a>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="7" style="text-align:right;">
                                <a href="entry_list.php?action=xml" target="blank">Export to XML</a>
                                <a href="entry_add.php">Add Contact</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>