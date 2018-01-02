<?php 
namespace App;
use App\Municipio;
use App\Parroquia;

use \Illuminate\Database\Eloquent\Model;
 
class Estructura extends Model {
    protected $table = 'estructura';
	public $timestamps = false;
	protected $primaryKey='id_estructura';
    //Ejemplo de definir campos
    //protected $fillable = ['username','email','password'];
}