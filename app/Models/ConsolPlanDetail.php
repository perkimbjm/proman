<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ConsolPlanDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'consolidation_id',
        'budget',
        'name',
        'nego_value',
        'consol_plan_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'consolidation_id' => 'integer',
        'budget' => 'decimal',
        'nego_value' => 'decimal',
        'consol_plan_id' => 'integer',
    ];

    public function consolPlan(): BelongsTo
    {
        return $this->belongsTo(ConsolPlan::class);
    }

    public function consolidation(): BelongsTo
    {
        return $this->belongsTo(ConsolPlan::class);
    }
}
