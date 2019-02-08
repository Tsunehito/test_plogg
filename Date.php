<?php

class Date
{
  /**
   * To check a day of week.
   * @param string date
   * @return int 0 => sunday, 1 => monday, ... 6 => Saturday
   */
  static function checkDayOfWeek($date)
  {
    $datetime = new DateTime($date);
    $week = (int)$datetime->format('w');
    return $week;
  }
  /**
   * method to get a number of weekdays
   * @param  string $start_date
   * @param  string $end_date
   * @return int $numWeekdays
   */
  static function getNumWeekdays($start_date, $end_date)
  {
    $numWeekdays = 0;
    $correntDay = $start_date;
    while($correntDay <= $end_date)
    {
      $weekday = Date::checkDayOfWeek($correntDay);
      if ($weekday == 0 || $weekday == 6)
        $correntDay++;
      else
      {
        $numWeekdays++;
        $correntDay++;
      }
    }
    return $numWeekdays;
  }

  // static function getBaseline()
}

echo Date::checkDayOfWeek('2019-02-02') . "\n";
echo Date::getNumWeekdays('2019-02-02', '2019-02-07');
