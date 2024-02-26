<?php

namespace App\Interfaces;
interface InterfaceCrud
{
    public function index();

    public function create();

    public function store();

    public function edit();

    public function update();

    public function delete();
}