<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    use HasFactory;
    public static array $experiences = ['entry', 'intermediate', 'senior'];
    public static array $jobCategories = [
        'IT', 'Finance', 'Marketing', 'Sales', 'Design', 'Engineering', 'Legal', 'Accounting', 'Other'
    ];
}
