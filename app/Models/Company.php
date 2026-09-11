<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    /**
     * الحقول المسموح تعبئتها باستخدام create() أو update()
     */
    protected $fillable = [
        'user_id',
        'name',
        'industry',
        'location',
        'website',
    ];

    /**
     * الشركة تابعة لمستخدم واحد
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * الشركة لديها عدة طلبات توظيف
     * سنستخدم هذه العلاقة عندما ننشئ Application Model
     */
    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }
}