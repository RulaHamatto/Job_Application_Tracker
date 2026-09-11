<?php

namespace App\Models;
use App\Models\Interview;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Application extends Model
{
    protected $fillable = [
        'user_id',
        'company_id',
        'job_title',
        'job_type',
        'location',
        'application_date',
        'status',
        'salary',
        'job_url',
        'description',
    ];

    /**
     * طلب التوظيف تابع لمستخدم واحد
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * طلب التوظيف تابع لشركة واحدة
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * طلب التوظيف يمكن أن يكون له عدة مقابلات
     */
    public function interviews(): HasMany
    {
        return $this->hasMany(Interview::class);
    }

    /**
     * طلب التوظيف يمكن أن يكون له عدة ملاحظات
     */
    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }
}