<?php

/**
* Controller for Entry
*/
class EntryController extends Controller {

    /**
    * Action for /entry/list
    */
    public function ListAction() {
        $cityModel = new CityModel();
        $entryModel = new EntryModel();
        $entries = $entryModel->findAll();

        for ($i = 0; $i < count($entries); $i++) {
            $city = $cityModel->findOne($entries[$i]["city_id"]);
            $entries[$i]["city"] = $city["name"];
        }

        if (isset($_GET["action"]) && $_GET["action"] == "xml") { // Export list to xml
            header('Content-type: text/xml');
            //to download: header('Content-Disposition: attachment; filename="text.xml"');
            $xml = Util::entitiesToXml($entries, "Entry", ["name", "first_name", "street", "zip_code", "city"]);
            print($xml);
            exit;
        }

        $this->render('entry_list', ['entries' => $entries]);
    }

    /**
    * Action for /entry/add
    */
    public function AddAction() {
        $entryModel = new EntryModel();
        $cityModel = new CityModel();
        $cities = $cityModel->findAll();

        // Validate and insert new entry on saving
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
                    $this->redirect('list');
                } else {
                    $errMsg = "There was an error that occurred during inserting new entry!";
                }
            }
        }

        $view_data = ['cities' => $cities];

        if (!empty($errMsg)) {
            $view_data['errMsg'] = $errMsg;
        }

        $this->_title = 'Address Book - Add New Contact';
        $this->render('entry_add', $view_data);
    }

    /**
    * Action for /entry/edit?id=$entry_id
    */
    public function EditAction() {
        $entryModel = new EntryModel();
        $cityModel = new CityModel();
        $cities = $cityModel->findAll();
        $entry_id = $_GET["id"];

        // Validate and update entry on saving
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

            // Update entry
            if (!isset($errMsg)) {
                $entry = [
                    'name' => $name,
                    'first_name' => $firstName,
                    'street' => $street,
                    'zip_code' => $zipCode,
                    'city_id' => $city,
                    ];

                $result = $entryModel->update($entry_id, $entry);

                if ($result) {
                    // Redirect to Address Book page
                    $this->redirect('list');
                } else {
                    $errMsg = "There was an error that occurred during updating entry!";
                }
            }
        }

        $entry = $entryModel->findOne($entry_id);
        $view_data = ['cities' => $cities, 'entry' => $entry];

        if (!empty($errMsg)) {
            $view_data['errMsg'] = $errMsg;
        }

        $this->_title = 'Address Book - Edit Contact';
        $this->render('entry_edit', $view_data);
    }
}
