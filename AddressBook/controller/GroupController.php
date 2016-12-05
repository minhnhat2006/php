<?php

/**
* Controller for Group
*/
class GroupController extends Controller {

    /**
    * Action for /group/list
    */
    public function ListAction() {
        $groupModel = new GroupModel();
        $groups = $groupModel->findAll();
        $this->_title = 'Manage Group';
        $this->render('group_list', ['groups' => $groups]);
    }

    /**
    * Action for /group/add
    */
    public function AddAction() {
        // Validate and insert new group on saving
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST["group_name"];

            // Validate required fields
            if (empty($name)) {
                $errMsg = "Name is required";
            }

            if (!isset($errMsg)) {
                $groupModel = new GroupModel();

                $group = ['name' => $name];

                $result = $groupModel->insert($group);

                if ($result) {
                    // Redirect to Manage Group page
                    $this->redirect('list');
                } else {
                    $errMsg = "There was an error that occurred during inserting new group!";
                }
            }
        }

        $view_data = [];
        if (!empty($errMsg)) {
            $view_data['errMsg'] = $errMsg;
        }

        $this->_title = 'Manage Group - Add New Group';
        $this->render('group_add', $view_data);
    }

    /**
    * Action for /group/edit?id=$group_id
    */
    public function EditAction() {
        $groupModel = new GroupModel();
        $group_id = empty($_GET["id"]) ? '' : $_GET["id"];

        // Validate and update group on saving
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST["group_name"];

            // Validate required fields
            if (empty($name)) {
                $errMsg = "Name is required";
            }

            // Update group
            if (!isset($errMsg)) {
                $group = ['name' => $name];

                $result = $groupModel->update($group_id, $group);

                if ($result) {
                    // Redirect to Manage Group page
                    $this->redirect('list');
                } else {
                    $errMsg = "There was an error that occurred during updating group!";
                }
            }

        }

        $group = $groupModel->findOne($group_id);
        $view_data = ['group' => $group];

        if (!empty($errMsg)) {
            $view_data['errMsg'] = $errMsg;
        }

        $this->_title = 'Manage Group - Edit Group';
        $this->render('group_edit', $view_data);
    }

    /**
    * Action for /group/connection?id=$group_id
    */
    public function ConnectionAction() {
        $groupConnectorModel = new GroupConnectorModel();
        $group_id = !empty($_GET["id"]) ? $_GET["id"] : "";

        // Remove action of Group Connection
        if (isset($_GET["action"]) && $_GET["action"] == "remove") {
            $parent_group_id = !empty($_GET["parent_id"]) ? $_GET["parent_id"] : "";
            $child_group_id = !empty($_GET["child_id"]) ? $_GET["child_id"] : "";

            $result = $groupConnectorModel->removeGroupConnection($parent_group_id, $child_group_id);

            if ($result) {
                // Refresh current page
                $this->redirect('connection?id=' . $group_id);
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

        $view_data = ['group_id' => $group_id
            , 'group' => $group
            , 'parent_groups' => $parent_groups
            , 'parent_groups_count' => $parent_groups_count
            , 'child_groups' => $child_groups
            , 'child_groups_count' => $child_groups_count];

        if (!empty($errMsg)) {
            $view_data['errMsg'] = $errMsg;
        }

        $this->_title = 'Group Connections - ' . $group['name'];
        $this->render('group_connection', $view_data);
    }

    /**
    * Action for /group/connection-add?id=$group_id
    */
    public function ConnectionAddAction() {
        $groupConnectorModel = new GroupConnectorModel();

        $parent_group = !empty($_GET['parent_id']) ? $_GET['parent_id'] : '';
        $child_group = !empty($_GET['child_id']) ? $_GET['child_id'] : '';

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
                    $this->redirect('connection?id=' . (!empty($parent_group) ? $parent_group : $child_group));
                } else {
                    $errMsg = "There was an error that occurred during adding group connection!";
                }
            }
        }

        $groupModel = new GroupModel();
        $groups = $groupModel->findAll();

        $view_data = ['groups' => $groups
            , 'parent_group' => $parent_group
            , 'child_group' => $child_group];

        if (!empty($errMsg)) {
            $view_data['errMsg'] = $errMsg;
        }

        $this->_title = 'Manage Group - Add Group Connection';
        $this->render('group_connection_add', $view_data);
    }

    /**
    * Action for /group/contact?id=$group_id
    */
    public function ContactAction() {
        $groupEntryModel = new GroupEntryModel();
        $group_id = empty($_GET["id"]) ? '' : $_GET["id"];

        // Action to removing Contact from Group
        if (isset($_GET["action"]) && $_GET["action"] == "remove") {
            $entry_id = !empty($_GET["contact_id"]) ? $_GET["contact_id"] : "";

            $group_entry = ['group_id' => $group_id, 'entry_id' => $entry_id];
            $result = $groupEntryModel->delete($group_entry);

            if ($result) {
                // Refresh current page
                $this->redirect('contact?id=' . $group_id);
            } else {
                $errMsg = "There was an error that occurred during removing Contact from Group!";
            }
        }

        /* Display page */
        $groupModel = new GroupModel();
        $group = $groupModel->findOne($group_id);

        $entryModel = new EntryModel();
        $entries = $entryModel->findByGroup($group_id);
        $entries_count = count($entries);

        // Get city names
        $cityModel = new CityModel();
        for ($i = 0; $i < count($entries); $i++) {
            $city = $cityModel->findOne($entries[$i]["city_id"]);
            $entries[$i]["city_name"] = $city["name"];
        }

        $view_data = ['group_id' => $group_id
            , 'entries' => $entries];

        if (!empty($errMsg)) {
            $view_data['errMsg'] = $errMsg;
        }

        $this->_title = 'Group Contacts - ' . $group['name'] . "({$entries_count})";
        $this->render('group_contact', $view_data);
    }

    /**
    * Action for /group/contact-add?id=$group_id
    */
    public function ContactAddAction() {
        $group_id = empty($_GET["id"]) ? '' : $_GET["id"];

        $groupModel = new GroupModel();
        $group = $groupModel->findOne($group_id);

        // Find Contacts matched search term
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $search = !empty($_POST["search"]) ? $_POST["search"] : "";

        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $search = !empty($_GET["search"]) ? $_GET["search"] : "";

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
                        $this->redirect('contact?id=' . $group_id);
                    } else {
                        $errMsg = "There was an error that occurred during adding Contact to Group!";
                    }
                }
            }
        }

        // Load contacts matched with search term
        $entryModel = new EntryModel();
        $entries = $entryModel->findByName($search);

        // Get city names
        $cityModel = new CityModel();
        for ($i = 0; $i < count($entries); $i++) {
            $city = $cityModel->findOne($entries[$i]["city_id"]);
            $entries[$i]["city_name"] = $city["name"];
        }

        $view_data = ['group_id' => $group_id
            , 'search' => $search
            , 'search_section' => $this->getSearchSection($group_id, $search)];

        if (!empty($entries)) {
            $view_data['entries'] = $entries;
        }

        if (!empty($errMsg)) {
            $view_data['errMsg'] = $errMsg;
        }

        $this->_title = 'Add Contacts to Group ' . $group['name'];
        $this->render('group_contact_add', $view_data);
    }

    private function getSearchSection($group_id, $search) {
        return "
            <div class='header-search'>
                <form method='post' action='contact-add?id={$group_id}" . (isset($search) ? '&search=' . $search : '') . "'>
                    <label for='search'>Search Contacts by name:</label>
                    <input type='text' id='search' name='search' value='" . (isset($search) ? $search : '') . "'></input>
                    <input type='submit' value='Search'></input>
                </form>
            </div>
            ";
    }
}