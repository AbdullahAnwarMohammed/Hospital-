<?php

namespace App\interfaces\Dectors;

interface DoctorRepositoryInterface
{
// get Doctor
public function index();

public function create();

public function store($reqest);

public function destroy($reqest);


public function edit($id);

public function update($reqest);

public function update_password($reqest);

public function update_status($reqest);



}