<?php 
namespace App;
use App\Municipio;
use App\Parroquia;

use \Illuminate\Database\Eloquent\Model;
 
class Partido extends Model {
    protected $table = 'partidos';
	public $timestamps = false;
	protected $primaryKey='id_partidos';
    //Ejemplo de definir campos
    //protected $fillable = ['username','email','password'];
}