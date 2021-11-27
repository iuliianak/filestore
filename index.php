<?php

$arr = ['foreign_names'=>'Иностранные имена','russian_names'=>'Русские имена','russian_surnames'=>'Русские фамилии'];

include ('vendor/autoload.php');

$dir = new DirectoryIterator('inc');

foreach($dir as $item){
    if($item->isDot()){
        continue;
    }

    echo '<h2>' . $arr[substr($item->getBasename(),0,-4)]. '</h2>';

$csv = \Csvreader\CsvGet::getInstance('inc/' . $item->getFilename());

    foreach($csv->generator() as $key => $value){
        if($key>=10){
            break;
        }
        echo $value['id'] . ' - ' . $value['name'] . ' - ' . $value['gender'] . '<br>';
    }
}