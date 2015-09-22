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