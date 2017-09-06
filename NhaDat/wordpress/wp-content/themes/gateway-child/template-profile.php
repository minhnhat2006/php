<?php
/**
 * Template Name: Profile
 *
 */

get_header("project"); 

// Set the Current Author Variable $curauth
$user_id = get_current_user_id();
$is_updated = false;

if($_GET[ 'update' ] == 1) {
    $user_url = $_GET[ 'website' ];
    $user_desc = $_GET[ 'udesc' ];
    $user_currency = $_GET[ 'currency' ];
    $is_updated = update_profile( $user_id, $user_url, $user_desc, $user_currency );
}

$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata($user_id);

?>


<div class="profile-panel">

    <form action="">
    	<div class="large-12 profile-content">

            <h2 class="page-title">Thông tin cá nhân</h2>
 
            <?php if ($is_updated) { ?>
            <div class="large-12 msg-success"><span class="fa fa-check"> Thông tin cá nhân đã được lưu.</span></div>
            <?php } ?>

    		<div class="large-3 profile-label"><label for="nickname">Nickname</label></div>
            <div class="large-9 profile-control">
                <input type="text" name="nickname" disabled value="<?php echo $curauth->nickname; ?>" />
            </div>

            <div class="large-3 profile-label"><label for="email">Email</label></div>
            <div class="large-9 profile-control">
                <input type="text" name="email" disabled value="<?php echo $curauth->user_email; ?>" />
            </div>

            <div class="large-3 profile-label"><label for="website">Website</label></div>
            <div class="large-9 profile-control">
                <input type="text" name="website" value="<?php echo $curauth->user_url; ?>" />
            </div>

            <div class="large-3 profile-label"><label for="udesc">Mô tả</label></div>
            <div class="large-9 profile-control">
                <input type="text" name="udesc" value="<?php echo $curauth->user_description; ?>" />
            </div>

            <div class="large-3 profile-label"><label for="currency">Đơn vị tiền tệ</label></div>
            <div class="large-9 profile-control">
                <select name="currency" id="currency" value="<?php echo get_cimyFieldValue($user_id, 'CURRENCY') ?>">
                  <option value="VND">VNĐ</option>
                  <option value="USD">USD</option>
                </select>
            </div>

            <div class="center">
                <input type="hidden" name="update" value="1">
                <input type="submit" class="btn-profile" value="Lưu thay đổi" />
            </div>
    	</div>
    </form>

</div>

<?php get_footer(); ?>