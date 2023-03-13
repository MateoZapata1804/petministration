<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pet extends Model
{
    use HasFactory;

    protected $table = 'mascotas';

    public static function getPetTypes(){
        return DB::table('tipos_mascota')->get();
    }

    public static function getRegisteredCustomers(){
        return DB::table('clientes')->get('documento_id');
    }
}
