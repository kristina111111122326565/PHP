<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  public $timestamps=false;
  public $fillable=
  [
    "name",
    "surname",
    "login",
    "password",
  ];
  public $hidden=
  [
    "password",
    "api_token",
  ];
}
