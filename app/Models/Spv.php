<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Spv extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'procurement_officer_id',
        'oe',
        'bid_value',
        'correction_value',
        'nego_value',
        'consultant_id',
        'invite_date',
        'evaluation_date',
        'nego_date',
        'BAHPL_date',
        'sppbj_date',
        'spk_date',
        'account_type',
        'program',
        'duration',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'procurement_officer_id' => 'integer',
        'oe' => 'decimal',
        'bid_value' => 'decimal',
        'correction_value' => 'decimal',
        'nego_value' => 'decimal',
        'consultant_id' => 'integer',
        'invite_date' => 'date',
        'evaluation_date' => 'date',
        'nego_date' => 'date',
        'BAHPL_date' => 'date',
        'sppbj_date' => 'date',
        'spk_date' => 'date',
    ];

    public function procurementOfficer(): BelongsTo
    {
        return $this->belongsTo(ProcurementOfficer::class);
    }

    public function consultant(): BelongsTo
    {
        return $this->belongsTo(Consultant::class);
    }
}
