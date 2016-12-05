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
                <a href="<?php echo BASE_URL; ?>entry/list?action=xml" target="blank">Export to XML</a>
                <a href="<?php echo BASE_URL; ?>entry/add">Add Contact</a>
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
            <td><?php echo $entry['city']; ?></td>
            <td style="text-align:right;">
                <a href='<?php echo BASE_URL; ?>entry/edit?id=<?php echo $entry['entry_id']; ?>'>Edit Contact</a>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="7" style="text-align:right;">
                <a href="<?php echo BASE_URL; ?>entry/list?action=xml" target="blank">Export to XML</a>
                <a href="<?php echo BASE_URL; ?>entry/add">Add Contact</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>