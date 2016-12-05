<h3>Parent Groups <?php echo "({$data['parent_groups_count']})"; ?></h3>

<table class="entry-list">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th width=150>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="7" style="text-align:right;">
                <a href="connection-add?child_id=<?php echo $data['group']['group_id']; ?>">Add Parent Group</a>
            </td>
        </tr>
    <?php if(!empty($data['parent_groups'])) {
        foreach($data['parent_groups'] as $key => $parent_group) { ?>
        <tr>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $parent_group['name']; ?></td>
            <td style="text-align:right;">
                <?php if ($parent_group['is_inherited'] == 0) { ?>
                <a href='connection?action=remove&id=<?php echo $data['group_id']; ?>&parent_id=<?php echo $parent_group['group_id']; ?>&child_id=<?php echo $data['group_id']; ?>'>Remove Parent Group</a>
                <?php } else { ?>
                <span>Inherited Group</span>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="7" style="text-align:right;">
                <a href="connection-add?child_id=<?php echo $data['group']['group_id']; ?>">Add Parent Group</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>


<h3>Child Groups <?php echo "({$data['child_groups_count']})"; ?></h3>

<table class="entry-list">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th width=150>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="7" style="text-align:right;">
                <a href="connection-add?parent_id=<?php echo $data['group']['group_id']; ?>">Add Child Group</a>
            </td>
        </tr>
    <?php if(!empty($data['child_groups'])) {
        foreach($data['child_groups'] as $key => $child_group) { ?>
        <tr>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $child_group['name']; ?></td>
            <td style="text-align:right;">
                <?php if ($child_group['is_inherited'] == 0) { ?>
                <a href='connection?action=remove&id=<?php echo $data['group_id']; ?>&parent_id=<?php echo $data['group_id']; ?>&child_id=<?php echo $child_group['group_id']; ?>'>Remove Child Group</a>
                <?php } else { ?>
                <span>Inherited Group</span>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="7" style="text-align:right;">
                <a href="connection-add?parent_id=<?php echo $data['group']['group_id']; ?>">Add Child Group</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>