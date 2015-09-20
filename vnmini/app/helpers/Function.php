<?php
function statusName($input)
{
	if ($input == 0) {
		return NO_PROMOTION;
	}
	return PROMOTION;
}