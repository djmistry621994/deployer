<?php

namespace App\Datatables\Interfaces;

interface DatatableInterface
{
    public function elements(string $type = ''): array;
}
