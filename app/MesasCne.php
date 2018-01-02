<?php 
namespace App;
use \Illuminate\Database\Eloquent\Model;
 
class MesasCne extends Model {
    protected $table = 'mesas_cne';
	public $timestamps = false;
	protected $primaryKey='id_mesas_cne';
    //Ejemplo de definir campos
    //protected $fillable = ['username','email','password'];

}

