<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AppointmentSubService extends Pivot
{
    protected $table = 'appointment_sub_service';

    // Additional columns on the pivot table
    protected $guarded = [
        'id'
    ];

    // Relationship to the Stage model
    public function stage()
    {
        return $this->belongsTo(Stage::class, 'stage_id');
    }
}
