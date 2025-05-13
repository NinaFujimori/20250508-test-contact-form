<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable =[
        'last_name','first_name','gender', 'email', 'tel_first', 'tel_second','tel_third','address','building','category_id', 'detail'
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }

    /*検索*/
    public function scopeCategorySearch($query, $category_id){
        if (!empty($category_id)) {
        $query->where('category_id', $category_id);
        }
    }
    public function scopeKeywordSearch($query, $keyword){
        if (!empty($keyword)) {
        $query->where('content', 'like', '%' . $keyword . '%');
        }
    }
    // 性別検索
    public function scopeGenderSearch($query, $gender){
        if (!empty($gender) && $gender !== 'allgender') {
            $query->where('gender', $gender);
        }
    }

    // 日付検索（例: created_atの日付で絞る）
    public function scopeDateSearch($query, $date){
        if (!empty($date)) {
            $query->whereDate('created_at', $date);
        }
    }
}
