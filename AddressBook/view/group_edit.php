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
                    <label for="group_name" class="required">Name</label>
                    <input type="text" name="group_name" id="group_name" value="<?php echo $data['group']['name']; ?>">
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