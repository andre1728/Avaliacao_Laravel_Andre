<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $fillable = [
        'nome1', 'nome2', 'data', 'valor'];


        public function tabeliao()
        {
            return $this->belongsTo(Tabeliao::class);
        }






}
