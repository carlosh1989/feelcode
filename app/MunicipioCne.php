<?php 
namespace App;
use \Illuminate\Database\Eloquent\Model;
 
class MunicipioCne extends Model {
    protected $table = 'municipio_cne';
	public $timestamps = false;
	protected $primaryKey='id_municipio';
    //Ejemplo de definir campos
    //protected $fillable = ['username','email','password'];

}

