<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Dector extends Model
{
    use Translatable;
    use HasFactory;
    public $translatedAttributes = ['name'];
    protected $fillable = ['email', 'email_verified_at', 'password','status', 'phone','name','section_id'];

    // get the decotrs image
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function doctorappointments()
    {
        return $this->belongsToMany(Appointment::class,'appointment_doctor');
    }
}
