<?php
interface Request{
	public fonction travel($departure, $end){}

	public fonction timeDeparture($timeDeparture){}

	public fonction timEnd($timEnd){}
}

interface Response{
	public fonction Itineraries(){} 
}
?>