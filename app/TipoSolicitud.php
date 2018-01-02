<?php 
namespace App;
use \Illuminate\Database\Eloquent\Model;
 
class TipoSolicitud extends Model {
    protected $table = 'tipo_solicitudes';
	public $timestamps = false;
	protected $primaryKey='id_tipo_solicitud';

    //Ejemplo de definir campos
    //protected $fillable = ['username','email','password'];

}

