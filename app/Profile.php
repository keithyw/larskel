<?php
/**
 * Created by PhpStorm.
 * User: keithwatanabe
 * Date: 3/10/15
 * Time: 10:42 AM
 */

namespace App;

use App\BaseModel;


class Profile extends BaseModel {
    protected $table = 'profiles';
    protected $fillable = ['first_name', 'last_name', 'birthday', 'zipcode'];
    protected $rules = ['first_name' => 'required|max:150',
        'last_name' => 'required|max:150',
        'zipcode' => 'required|regex:/^[0-9]{5}(?:-[0-9]{4})?$/',];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\User');
    }
}