<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postingan extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'judul',
    //     'author',
    //     'paragraf',
    // ];

        public function scopeFilter($query, array $filters){

            $query->when($filters['search'] ?? false, function ($query, $search ){
                return $query->where('judul', 'like', '%' . $search. '%' )
                ->orwhere('paragraf', 'like', '%' . $search . '%' );
            });

            $query->when($filters['kategori'] ?? false, function ($query, $category ){
                return $query->whereHas('kategori', function($query) use($category){
                    $query->where('slug', $category);
                });
                }
            );

            $query->when($filters['author'] ?? false, function ($query, $author ){
                return $query->whereHas('user', function($query) use($author){
                    $query->where('name', $author);
                });
                }
            );
         
        }

    protected $guarded = [
        'id',
    ];

    protected $with = [
        'kategori',
        'user'
    ];

    public function kategori(){
        return $this->belongsTo(kategori::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}

