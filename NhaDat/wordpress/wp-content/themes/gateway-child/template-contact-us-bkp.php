<?php
/**
 * Template Name: ContactUs-Bkp
 *
 */

get_header("project"); 

// Set the Current Author Variable $curauth
$user_id = get_current_user_id();
$is_sent = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST[ 'fullname' ];
    $phone = $_POST[ 'phone' ];
    $email = $_POST[ 'email' ];
    $message = $_POST[ 'message' ];
    $is_sent = send_contact_us_message( $fullname, $phone, $email, $message );
}

$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata($user_id);

?>

<div class="contact-us-panel">

    <form action="" type="POST">
    	<div class="large-12 contact-us-content">
            
            <h2 class="page-title">Liên hệ</h2>
 
            <div class="contact-intro">
                <h5>Vui lòng liên hệ với chúng tôi qua các thông tin bên dưới :</h5>
                Địa chỉ: 191 Trần Não, Phường Bình An, Quận 2, TP.HCM<br>
                Hotline: 0901 777 667<br>
                Liên hệ với chúng tôi thông qua mục "Liên Hệ" ngay tại menu trên trang chủ để chia sẻ tất cả những câu hỏi, thắc mắc hoặc phản hồi của bạn về Rever.<br>
                Hoặc bạn có thể gọi cho chúng tôi tại Hotline: 0901 777 667<br>
            </div>

            <?php if ($is_sent) { ?>
            <div class="large-12 msg-success"><span class="fa fa-check"> Yêu cầu của bạn đã được gửi.</span></div>
            <?php } ?>

    		<div class="large-3 contact-us-label"><label class="required" for="fullname">Họ tên</label></div>
            <div class="large-9 contact-us-control">
                <input type="text" name="fullname" required />
            </div>

            <div class="large-3 contact-us-label"><label class="required" for="phone">Số điện thoại</label></div>
            <div class="large-9 contact-us-control">
                <input type="text" name="phone" required />
            </div>

            <div class="large-3 contact-us-label"><label class="required" for="email">Email</label></div>
            <div class="large-9 contact-us-control">
                <input type="text" name="email" required />
            </div>

            <div class="large-3 contact-us-label"><label class="required" for="message">Lời nhắn</label></div>
            <div class="large-9 contact-us-control">
                <textarea name="message" class="contact-us-message" rows=5></textarea>
            </div>

            <div class="large-3 contact-us-label"></div>
            <div class="large-9 contact-us-control">
                <input type="submit" class="btn-contact-us" value="Gửi yêu cầu" />
            </div>
    	</div>
    </form>

</div>

<?php get_footer(); ?>