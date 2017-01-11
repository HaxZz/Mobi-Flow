<?php

interface ToRequest{
	public function travel($departure, $end);

	public function timeDeparture($datetimeDeparture);

	public function timEnd($datetimEnd);

	public function findPaths();
}
