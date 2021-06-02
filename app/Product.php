<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public $timestamps=false;
  public $fillable=
  [
    "pr_name",
    "number",
    "pr_price",
  ];
}
