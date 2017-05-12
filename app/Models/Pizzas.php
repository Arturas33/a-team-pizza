<?php
/**
 * Created by PhpStorm.
 * User: Antanas Kiselis
 * Date: 2017.05.09
 * Time: 13:07
 */

namespace App\models;


class Pizzas extends CoreModel
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'pz_pizza';

    /**
     * Column names
     * @var array
     */
    protected $fillable = ['id', 'cheese_id', 'pizza_pad_id', 'user_id', 'name', 'calories', 'comment'];
}