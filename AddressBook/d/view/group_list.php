<table class="entry-list">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th width=220>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="7" style="text-align:right;">
                <a href="add">Add Group</a>
            </td>
        </tr>
    <?php if(!empty($data['groups'])) {
        foreach($data['groups'] as $key => $group) { ?>
        <tr>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $group['name']; ?></td>
            <td style="text-align:right;">
                <a href='edit?id=<?php echo $group['group_id']; ?>'>Edit Group</a>
                <a href='connection?id=<?php echo $group['group_id']; ?>'>Manage Connections</a>
                <a href='contact?id=<?php echo $group['group_id']; ?>'>Manage Contacts</a>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="7" style="text-align:right;">
                <a href="add">Add Group</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>