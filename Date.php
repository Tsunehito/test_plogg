<?php

class Date
{
  /**
   * To check a day of week.
   * @param date $date
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
   * @param  date $start_date
   * @param  date $end_date
   * @return integer $numWeekdays
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

  /**
   * calculation of minimum value
   * @param  int $baseline  0 ~ 100
   * @param  int $numWeekdays
   * @return float
   */
  static function calculBaseline($baseline, $numWeekdays)
  {
    try {
      if ($baseline >= 0 && $baseline <= 100){
        $min = $baseline / $numWeekdays;
        return (float)$min;
      }
      else
        throw new Exception('Please enter an integer from 0 to 100 !');
    } catch(Exception $e){
      echo $e->getMessage();
    }
  }

  static function f_rand($min, $max)
  {
    $randomFloat = $min + mt_rand() / mt_getrandmax() * ($max - $min);
    $randomFloat = round($randomFloat, 2);
    return $randomFloat;
  }
}

echo Date::checkDayOfWeek('2019-02-02') . "\n";
echo Date::getNumWeekdays('2019-02-02', '2019-02-07') . "\n";
$weekdays = Date::getNumWeekdays('2019-02-02', '2019-02-08');
echo Date::calculBaseline(500, $weekdays) . "\n";
echo Date::f_rand(0,100);
