<?php

namespace App\Models;

use App\Interfaces\CrudInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Company extends Model implements CrudInterface
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['name', 'email', 'foundation_year', 'description'];

    /**
     * @var string[]
     */
    protected $dates = [
        'foundation_year',
    ];

    /**
     * @return BelongsToMany
     */
    public function clients(): BelongsToMany
    {
        return $this->belongsToMany(Client::class, 'client_company');
    }
}
