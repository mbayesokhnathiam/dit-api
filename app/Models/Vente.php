<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'clientId',
        'vendeurId'
    ];


    public function generateCodeVente(){
        $code = 'VENTE-'.uniqid();

        while(self::where('numero',$code)->exists()){
            $code = 'VENTE-'.uniqid();
        }

        $this->numero = $code;
    }
}
