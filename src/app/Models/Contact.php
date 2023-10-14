<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname',
        'gender',
        'email',
        'code',
        'address',
        'building',
        'content'
    ];



public function scopeGetdatefrom($query, $from)
{
  if (!empty($from)) {
    $query->where('created_at', '>=', $from);
  }
}

public function scopeGetdateuntil($query, $until)
{
  if (!empty($until)) {
    $query->where('created_at', '<=', $until);
  }
}

public function scopeGetgender($query, $gender)
{
  if (!empty($gender)){
    $query->where('gender', $gender);
  }
}

public function scopeGetname($query, $name)
{
  if (!empty($name)){
    $query->where('fullname', 'like', "%{$name}%");
  }
}

public function scopeGetemail($query, $email)
{
  if (!empty($email)){
    $query->where('email', 'like', "%{$email}%");
  }
}



}
