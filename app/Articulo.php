<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $fillable=['nombre','categoria','precio','stock','imagen'];

    //scopes
    public function scopeCategoria($query,$v){
        if($v=='%'){
            return $query->where('categoria','like',$v);
        }else{
            return $query->where('categoria',$v);
        }
        
    }

    public function scopePrecio($query,$v){
        if($v=='%'){
            return $query->where('precio','like',$v);
        }
        switch ($v) {
            case '1':
                return $query->where('precio','>','0')->where('precio','<','50');
                break;
            case '2':
                return $query->where('precio','>','50')->where('precio','<','200');
                break;
            case '3':
                return $query->where('precio','>','200')->where('precio','<','500');
                break;
            case '4':
                return $query->where('precio','>','500')->where('precio','<','1000');
                break;    
            default:
                # code...
                break;
        }
    }
}
