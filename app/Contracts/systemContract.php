<?php


namespace App\Contracts;

interface systemContract
{
    public function store(array $request);
    public function update(array $request);
}
