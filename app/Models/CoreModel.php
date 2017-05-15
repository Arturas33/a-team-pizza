<?php
/**
 * Created by PhpStorm.
 * User: Antanas Kiselis
 * Date: 2017.05.02
 * Time: 10:47
 */
namespace App\models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class CoreModel extends Model
{
    use SoftDeletes;
    
    public $incrementing = false;

    /** 
     *  Generates Uuid if the entry doesn't have one
     *
     *
     */

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model)
        {
            if (!isset($model->attributes['id'])) {
                $model->attributes['id'] = Uuid::uuid4();
            } else {
                $model->{$model->getKeyName()} = $model->attributes['id'];
            }
        });
    }

    /**
     * Returns name of the table
     *
     * @return string
     */
    public function getTableName()
    {
        $tableName = substr($this->table,3, -1);
        return $tableName;
    }
}