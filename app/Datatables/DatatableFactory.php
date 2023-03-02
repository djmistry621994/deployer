<?php


namespace App\Datatables;


use App\Datatables\Interfaces\DatatableInterface;

class DatatableFactory
{

    private $factory, $model;

    const NAMESPACE = "App\\Datatables\\";

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function make(): DatatableInterface
    {
        $class = self::NAMESPACE . $this->model . 'Datatable';
        return new $class();
    }

}
