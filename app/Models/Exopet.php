<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exopet extends Model
{
    protected $table = 'exopet';
    protected $fillable = [
                            'ownerName', 
                            'animalType', 
                            'animalAge', 
                            'animalPrice', 
                            'location', 
                            'picture'];
}
