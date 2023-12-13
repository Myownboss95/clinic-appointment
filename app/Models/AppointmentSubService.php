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

    
    public function appointment(){
        return $this->belongsTo(Appointment::class);
    }



}
