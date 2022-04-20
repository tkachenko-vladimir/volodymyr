<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notarization extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const STATUS_DOCUM_SELECT = [
        'work_docum' => 'В работе',
        'certified'  => 'Заверен',
    ];

    public $table = 'notarizations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name_document',
        'client_docum_id',
        'seal_translator',
        'status_docum',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function client_docum()
    {
        return $this->belongsTo(Client::class, 'client_docum_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
