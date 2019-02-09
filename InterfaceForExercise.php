<?php
require_once('Date.php');

class InterfaceForExercise
{
  static function creatTable($start_date, $end_date, $total, $baseline, $color ='active')
  {
    // Prepare un array with values
    $result = Date::arrayGenerator($start_date, $end_date, $total, $baseline);

    $html = '<div class="table-responsive-md"><table class="table table-sm table-bordered table-striped table-hover>';
    $html .= '<thead><tr scope="row"><th class="text-center table-' . $color
          . '" scope="col">Date</th><th class="text-center table-' . $color
          . '" scope="col">Value</th></tr></thead><tbody>';
    foreach ($result as $key => $value) {
      $html .= '<tr><td scope="row" align="center">' . $key . '</td><td align="center">' . $value . '</td></tr>';
    }
    $html .= '<tr><th scope="row" class="text-center">Total</th><td align="center">' . array_sum($result) . '</td></tr>';
    $html .= '<caption>Total : ' . $total .', Baseline : ' . $baseline . '</caption>';
    $html .= '</tbody></table></div>';
    echo $html;
  }
}

 ?>
