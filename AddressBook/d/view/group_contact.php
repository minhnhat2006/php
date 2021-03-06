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
                <a href="contact-add?id=<?php echo $data['group_id']; ?>">Add Contact to Group</a>
            </td>
        </tr>
    <?php if(!empty($data['entries'])) {
        foreach($data['entries'] as $key => $entry) { ?>
        <tr>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $entry['name']; ?></td>
            <td><?php echo $entry['first_name']; ?></td>
            <td><?php echo $entry['street']; ?></td>
            <td><?php echo $entry['zip_code']; ?></td>
            <td><?php echo $entry['city_name']; ?></td>
            <td style="text-align:right;">
                <?php if ($entry['is_inherited'] == 0) { ?>
                <a href='contact?action=remove&id=<?php echo $data['group_id']; ?>&contact_id=<?php echo $entry['entry_id']; ?>'>Remove Contact</a>
                <?php } else { ?>
                <span>Inherited Contact</span>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="7" style="text-align:right;">
                <a href="contact-add?id=<?php echo $data['group_id']; ?>">Add Contact to Group</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>