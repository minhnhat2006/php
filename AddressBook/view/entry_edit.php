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
                    <input type="text" name="entry_name" id="entry_name" value="<?php echo $data['entry']['name']; ?>">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="entry_first_name" class="required">First Name</label>
                    <input type="text" name="entry_first_name" id="entry_first_name" value="<?php echo $data['entry']['first_name']; ?>">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="entry_street">Street</label>
                    <input type="text" name="entry_street" id="entry_street" value="<?php echo $data['entry']['street']; ?>">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="entry_zip_code">Zip Code</label>
                    <input type="text" name="entry_zip_code" id="entry_zip_code" value="<?php echo $data['entry']['zip_code']; ?>">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="entry_city" class="required">City</label>
                    <select name="entry_city" id="entry_city" value="">
                    <?php foreach ($data['cities'] as $city) { ?>
                        <option value="<?php echo $city['city_id']; ?>"
                            <?php echo $data['entry']['city_id'] == $city['city_id'] ? "selected" : "" ?>><?php echo $city['name']; ?></option>
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