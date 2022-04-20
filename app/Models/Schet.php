<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schet extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'schets';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'klient_name_id',
        'nomenclatura',
        'kol_vo',
        'stoimost',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function klient_name()
    {
        return $this->belongsTo(Client::class, 'klient_name_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
