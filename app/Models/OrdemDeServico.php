<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class OrdemDeServico extends Model
{
    use HasFactory;

    protected $table = 'ordem_de_servicos';

    protected $fillable = [
        'user_id',
        'descricao',
        'status',
    ];

    protected $casts = [
        'status' => 'string',
    ];

    public static function getStatusValues()
    {
        // Corrigindo o uso de DB::raw
        $columnType = DB::selectOne("SHOW COLUMNS FROM ordem_de_servicos WHERE Field = 'status'")->Type;

        // Extraindo os valores do ENUM
        preg_match('/^enum\((.*)\)$/', $columnType, $matches);
        $enumValues = [];

        if (isset($matches[1])) {
            foreach (explode(',', $matches[1]) as $value) {
                $enumValues[] = trim($value, "'");
            }
        }

        return $enumValues;
    }
}
