<?php

namespace Csvreader;

class CsvGet
{
    protected $filename;

    protected $file;

    protected $rows;


    public function __construct($filename)
    {
        $this->filename = $filename;
        $this->file = fopen($filename,'r');
        $this->rows = fgetcsv($this->file,0,';');
    }

    public function generator()
    {
        while($values = fgetcsv($this->file,0,';')){

            $new_ar = array_combine($this->rows, $values);

            yield $new_ar;
        }


    }
    public static function getInstance($filename)
    {
        return new static($filename);
    }

}