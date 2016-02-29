<?php

require_once('model/CityModel.php');
require_once('model/EntryModel.php');

$cityModel = new CityModel();
$cities = $cityModel->findAll();

// Validate and insert new entry
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST["entry_name"];
    $firstName = $_POST["entry_first_name"];
    $street = $_POST["entry_street"];
    $zipCode = $_POST["entry_zip_code"];
    $city = $_POST["entry_city"];

    // Validate required fields
    if (empty($name)) {
        $errMsg = "Name is required";
    } else if (empty($firstName)) {
        $errMsg = "First Name is required";
    } else if (empty($city)) {
        $errMsg = "City is required";
    }

    // Insert new entry
    if (!isset($errMsg)) {
        $entryModel = new EntryModel();

        $entry = [
            'name' => $name,
            'first_name' => $firstName,
            'street' => $street,
            'zip_code' => $zipCode,
            'city_id' => $city,
            ];

        $result = $entryModel->insert($entry);

        if ($result) {
            // Redirect to Address Book page
            header('Location: entry_list.php');
        } else {
            $errMsg = "There was an error that occurred during inserting new entry!";
        }
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Address Book - Add New Contact</title>
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
                <h1>Add New Contact</h1>
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
                                    <label for="entry_name" class="required">Name</label>
                                    <input type="text" name="entry_name" id="entry_name">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="entry_first_name" class="required">First Name</label>
                                    <input type="text" name="entry_first_name" id="entry_first_name">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="entry_street">Street</label>
                                    <input type="text" name="entry_street" id="entry_street">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="entry_zip_code">Zip Code</label>
                                    <input type="text" name="entry_zip_code" id="entry_zip_code">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="entry_city" class="required">City</label>
                                    <select name="entry_city" id="entry_city">
                                    <?php foreach ($cities as $city) { ?>
                                        <option value="<?php echo $city['city_id']; ?>"><?php echo $city['name']; ?></option>
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