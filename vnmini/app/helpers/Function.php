<?php
function statusName($input, $msg1, $msg2)
{
	if ($input == 0) {
		return $msg1;
	}
	return $msg2;
}