<?php


namespace App\Contracts;

interface employeeContract
{
    public function store(array $request);
    public function update(array $request);
}
