<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TYPEPAY_SELECT = [
        'cashless' => 'Безналичный',
        'cash'     => 'Наличный',
        'card'     => 'Карта',
    ];

    public const STATUS_SELECT = [
        'work'      => 'В работе',
        'finished'  => 'Сдан',
        'give_work' => 'Раздать',
    ];

    public $table = 'orders';

    protected $dates = [
        'start_time',
        'end_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'status',
        'typepay',
        'client_order_id',
        'clients_many',
        'clients_pages',
        'start_time',
        'end_time',
        'languages_s_id',
        'languages_na_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function client_order()
    {
        return $this->belongsTo(Client::class, 'client_order_id');
    }

    public function getStartTimeAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartTimeAttribute($value)
    {
        $this->attributes['start_time'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getEndTimeAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEndTimeAttribute($value)
    {
        $this->attributes['end_time'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function languages_s()
    {
        return $this->belongsTo(Language::class, 'languages_s_id');
    }

    public function languages_na()
    {
        return $this->belongsTo(Language::class, 'languages_na_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
