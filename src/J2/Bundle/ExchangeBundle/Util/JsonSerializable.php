<?php

namespace J2\Bundle\ExchangeBundle\Util;
interface JsonSerializable
{
	/**
	 * Return data which should be serialized by json_encode().
	 *
	 * @return  mixed
	 *
	 * @since   12.2
	 */
	public function jsonSerialize();
}