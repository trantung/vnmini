<?php
use Anhskohbo\UConvert\UConvert;

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

function returnDiscount($items)
{
    $arrayPromotion = [];
    $number = 0;
    foreach ($items as $key => $item) {
        if ($item->product->new_price) {
            $arrayPromotion[$key] = $item->products;
        }
        else{
           $number += $item->qty;
        }
    }
    $countPromotion = count($arrayPromotion);
    $countNormal = count($items) - $countPromotion;
    return [$countNormal, $countPromotion, $number];
}

function returnOrderProductId($productId, $orderId)
{
    $id = OrderProduct::where('product_id', $productId)->where('order_id', $orderId)->first()->id;
    return $id;
}

function uniToVni($unicode)
{
    $vni = UConvert::toVni($unicode, UConvert::UNICODE);
    return $vni;
}
function removeEndString($input)
{
    $inputExplode = explode(' ', $input);
    $result = array_pop($inputExplode);
    return implode(' ', $inputExplode);
}
function getClass($categoryId, $segment)
{   
    $class = array();
    if ($categoryId == 0 && $segment[2] == 0) {
        return 'active';
    }
    if ($categoryId == $segment[2] && $categoryId != 0) {
        return 'active';
    }
    return null ;
}
// show 0 for null
function getZero($number = null)
{
    if($number != '') {
        return $number;
    }
    return 0;
}
