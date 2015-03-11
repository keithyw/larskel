<?php
/**
 * Created by PhpStorm.
 * User: keithwatanabe
 * Date: 3/9/15
 * Time: 12:07 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class BaseModel extends Model
{
    use ValidatingTrait;
    protected $rules = [];
}

