<?php 
namespace App;
use \Illuminate\Database\Eloquent\Model;
 
class VotoDetalleEscrutinio extends Model {
    protected $table = 'votos_detalle_mesa_escrutinio';
	protected $primaryKey='id_votos_detalle';
	public $timestamps = false;
    //Ejemplo de definir campos
    //protected $fillable = ['username','email','password'];

}

