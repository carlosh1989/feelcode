<?php 
namespace App;
use \Illuminate\Database\Eloquent\Model;
 
class ParroquiaCne extends Model {
    protected $table = 'parroquia_cne';
	public $timestamps = false;
	protected $primaryKey='id_parroquia';
    //Ejemplo de definir campos
    //protected $fillable = ['username','email','password'];
}

