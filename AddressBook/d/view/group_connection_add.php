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
                    <label for="parent_group" class="required">Parent Group</label>
                    <select name="parent_group" id="parent_group">
                    <?php foreach ($data['groups'] as $group) { ?>
                        <option value="<?php echo $group['group_id']; ?>" <?php echo $group['group_id'] == $data['parent_group'] ? "selected" : "" ?>><?php echo $group['name']; ?></option>
                    <?php } ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="child_group" class="required">Child Group</label>
                    <select name="child_group" id="child_group">
                    <?php foreach ($data['groups'] as $group) { ?>
                        <option value="<?php echo $group['group_id']; ?>" <?php echo $group['group_id'] == $data['child_group'] ? "selected" : "" ?>><?php echo $group['name']; ?></option>
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