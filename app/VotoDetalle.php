<?php 
namespace App;
use \Illuminate\Database\Eloquent\Model;
 
class VotoDetalle extends Model {
    protected $table = 'votos_detalle';
	protected $primaryKey='id_votos_detalle';
	public $timestamps = false;
    //Ejemplo de definir campos
    //protected $fillable = ['username','email','password'];
}

