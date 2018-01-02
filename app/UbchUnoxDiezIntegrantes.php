<?php 
namespace App;
use \Illuminate\Database\Eloquent\Model;
 
class UbchUnoxDiezIntegrantes extends Model {
    protected $table = 'ubch_registro_unoxdiez_integrantes';
	public $timestamps = false;
	protected $primaryKey='id_ubch_registro_unoxdiez_integrantes';

    //Ejemplo de definir campos
    //protected $fillable = ['username','email','password'];

}

