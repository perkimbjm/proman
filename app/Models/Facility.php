<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Facility extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'contractor_id',
        'consultant_id',
        'district_id',
        'village_id',
        'length',
        'width',
        'lat',
        'lng',
        'real_1',
        'real_2',
        'real_3',
        'real_4',
        'real_5',
        'real_6',
        'real_7',
        'real_8',
        'photo_0',
        'photo_50',
        'photo_100',
        'photo_pho',
        'note',
        'note_pho',
        'team',
        'construct_type',
        'spending_type',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'contractor_id' => 'integer',
        'consultant_id' => 'integer',
        'district_id' => 'integer',
        'village_id' => 'integer',
        'length' => 'decimal',
        'width' => 'decimal',
        'real_1' => 'decimal',
        'real_2' => 'decimal',
        'real_3' => 'decimal',
        'real_4' => 'decimal',
        'real_5' => 'decimal',
        'real_6' => 'decimal',
        'real_7' => 'decimal',
        'real_8' => 'decimal',
        'team' => 'array',
    ];

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function village(): BelongsTo
    {
        return $this->belongsTo(Village::class);
    }

    public function contractor(): BelongsTo
    {
        return $this->belongsTo(Contractor::class);
    }

    public function consultant(): BelongsTo
    {
        return $this->belongsTo(Consultant::class);
    }
}
