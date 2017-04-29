<?php

namespace CareerBind\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class like extends Model{

protected $table='likeable';

public function likeable()
{
  return $this->morphTo();

}

}
