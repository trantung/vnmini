<?php
function statusName($input, $msg1, $msg2)
{
	if ($input == 0) {
		return $msg1;
	}
	return $msg2;
}

function statusNewPrice($input)
{
	if ($input) {
		return $input;
	}
	return NO_PROMOTION;
}

function returnInputSelect($key)
{
    $input = Input::all();
    if (isset($input[$key])) {
        return $input[$key];
    }
    return null;
}

function returnStatusUser($status)
{
    if ($status == USING) {
        return USER_USING;
    }
    return USER_LOCK;
}

function checkPassword($pwd, $re_pwd) {
    $errors = array();

    if (strlen($pwd) < 6) {
        $errors[] = "Password phải >= 6 ký tự";
    }if (strlen($pwd) > 12) {
        $errors[] = "Password phải <= 12 ký tự";
    }

    if (!preg_match("#[0-9]+#", $pwd)) {
        $errors[] = "Password phải có kí tự số!";
    }

    if (!preg_match("#[a-zA-Z]+#", $pwd)) {
        $errors[] = "Password phải có kí tự thường và viết hoa!";
    }     

    if($pwd != $re_pwd) {
    	$errors[] = "Password không giống nhau!";
    }

    if(!empty($errors)){
    	return array("error"=>$errors);
    }
    return array('success'=>'Thay đổi mật khẩu thành công!');
}

function returnPositionBannerImage($position)
{
    if ($position == LEFT_BANNER_IMAGE) {
        return 'Trái';
    }
    if ($position == CENTER_BANNER_IMAGE) {
        return 'Giữa';
    }
    if ($position == RIGHT_BANNER_IMAGE) {
        return 'Phải';
    }
}

function returnPositionBannerSlide($position)
{
    if ($position == 0) {
        return 'VN Stone';
    }
    if ($position == 1) {
        return 'Đối tác';
    }
}

function returnStatusComment($status)
{
    if ($status == ACCEPT) {
        return 'Đã xử lý';
    }
    if ($status == NO_ACCEPT) {
        return 'Chưa xử lý';
    }
}

function returnStatusOrder($status)
{
    if ($status == NO_APPROVE) {
        return 'Chưa xử lý';
    }
    if ($status == APPROVE) {
        return 'Đã xử lý';
    }
    if ($status == NO_SHIP) {
        return 'Chưa chuyển hàng';
    }
    if ($status == SHIP) {
        return 'Đã chuyển hàng';
    }
    if ($status == PAY) {
        return 'Thanh toán';
    }
}