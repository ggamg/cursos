<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
    protected $table = 'users';//nombre de la tabla en la BD para que lo maneje el ORM 
}