<?php

namespace Azuriom\Plugin\Gallery\Models;

use Azuriom\Models\Traits\HasTablePrefix;
use Azuriom\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Azuriom\Plugin\Gallery\Models\Links;

/**
 * @property int $id
 * @property string $name
 */

class Category extends Model
{
    use HasTablePrefix;

    public $timestamps = false;

    /**
     * The table prefix associated with the model.
     *
     * @var string
     */
    protected $prefix = 'gallery_';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * The attributes that are mass assignable.
     */
    public function links() {
        return $this->hasMany(Links::class);
    }
}