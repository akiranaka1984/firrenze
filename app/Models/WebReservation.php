<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class WebReservation extends Model
{
    use HasFactory;
    protected $table = 'web_reservations';
    protected $fillable = [
        'user_id',
        'name',
        'mail',
        'tel',
        'lineid',
        'lady1',
        'lady2',
        'lady3',
        'date1',
        'date2',
        'date3',
        'cource',
        'place',
        'pay',
        'contact',
        'cmnt',
        'compatible',
        'status',
        'created_at',
        'updated_at'
    ];
    
    // タイムスタンプを自動設定するかどうか
    public $timestamps = true;
    
    // 一時的なデバッグ用メソッドを追加
    public static function boot()
    {
        parent::boot();
        
        static::creating(function ($model) {
            // モデル作成時にログを残す
            Log::info('WebReservation作成中', ['attributes' => $model->attributes]);
        });
        
        static::created(function ($model) {
            // モデル作成後にログを残す
            Log::info('WebReservation作成完了', ['id' => $model->id, 'attributes' => $model->attributes]);
        });
    }
}