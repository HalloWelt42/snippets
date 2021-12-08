<?php


namespace snippets\aoc\Y2021\Day_1;


use SplFileObject;

class SonarSweep
{

  public function __destruct()
  {

    // Eingabe
    $fo = new SplFileObject(__DIR__ . '/input.txt');

    // Anfangsbedingungen
    $counter = 0;
    $old_val = $fo->fgets();

    // Verarbeitung
    while (($data = $fo->fgets())) {
      if( (int)$data > $old_val ){
        $counter++;
      }
      $old_val = (int)$data;
    }

    // Ausgabe
    print_r($counter);
    print_r(PHP_EOL);

  }

}

