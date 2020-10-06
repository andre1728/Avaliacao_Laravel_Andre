<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certidao extends Model
{
    
    protected $fillable = [
        'nome1', 'nome2', 'data'
    ];

    public function tabeliao()
    {
        return $this->belongsTo(Tabeliao::class);
    }


}
