<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ClientCompany
 * @package App\Models
 */
class ClientCompany extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'client_company';

    /**
     * @var bool
     */
    public $timestamps = false;
}
