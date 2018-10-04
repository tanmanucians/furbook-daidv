<?php

namespace Furbook\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
	 * 今日（タスク実行日）が月の最終の平日かどうかの判定を行な
	 *
	 * @param string|null $date
	 * @return bool
	 */
	public function _is_last_weekday_of_month($date = null)
	{
		$current_date 		= date('Y-m-d');
		$last_date_in_month = '2020-02-29';
		$last_weekday 		= date('l', strtotime($last_date_in_month));
		$last_month_day 	= date('m-d', strtotime($last_date_in_month));
		$last_date_in_month = $this->_subtract_date($last_weekday, $last_date_in_month, $last_month_day);

		dd($last_date_in_month);
	}

	/**
	 * Handle subtract date when the date is Sunday, Saturday or holiday
	 *
	 * @param string $last_weekday
	 * @param string $last_date_in_month
	 * @param string $last_month_day
	 * @return string
	 */
	private function _subtract_date($last_weekday, $last_date_in_month, $last_month_day)
	{
		if($last_weekday === "Saturday" || in_array($last_month_day, ['04-29']))
		{
			$last_date_in_month = date('Y-m-d', strtotime ('-1 day', strtotime($last_date_in_month)));
			$last_weekday 		= date('l', strtotime($last_date_in_month));
			$last_month_day 	= date('m-d', strtotime($last_date_in_month));

			return $this->_subtract_date($last_weekday, $last_date_in_month, $last_month_day);
		}
		elseif($last_weekday === "Sunday")
		{
			$last_date_in_month = date('Y-m-d', strtotime ('-2 day', strtotime($last_date_in_month)));
			$last_weekday 		= date('l', strtotime($last_date_in_month));
			$last_month_day 	= date('m-d', strtotime($last_date_in_month));

			return $this->_subtract_date($last_weekday, $last_date_in_month, $last_month_day);
		}
		else
		{
			return $last_date_in_month;
		}
	}
}
