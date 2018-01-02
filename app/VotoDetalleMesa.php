<?php 
namespace App;
use \Illuminate\Database\Eloquent\Model;
 
class VotoDetalleMesa extends Model {
    protected $table = 'votos_detalle_mesas';
	protected $primaryKey='id_votos_detalle';
	public $timestamps = false;
    //Ejemplo de definir campos
    //protected $fillable = ['username','email','password'];

}

