<?php
namespace App\Repository\Contract;

interface IBase
{
    public function all();
    public function show();
    public function store();
    public function destroy();
}
