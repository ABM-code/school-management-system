<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grades extends Model
{

    use HasTranslations;
public $translatable = ['Name'];

protected $fillable=['Name','Notes'];
protected $table ='Grades';
public $timestamps = true;
}

