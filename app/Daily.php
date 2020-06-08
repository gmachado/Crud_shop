<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daily extends Model
{
    protected $fillable = [
        'valor', 'quantidade_estoque', 'nome', 'status', 'descricao', 'image','user_id'
    ];

    public function user()
    {
        return $this->hasOne('App\users');
    }
}
