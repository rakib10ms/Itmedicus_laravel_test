<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';

    protected $fillable = ['first_name','last_name','company_id','email','phone'];

    public function company_name(){
        return $this->belongsTo('App\Models\Company','company_id');
    }
}
