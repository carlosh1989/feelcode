<?php 
namespace App;
use App\Municipio;
use App\Parroquia;

use \Illuminate\Database\Eloquent\Model;
 
class Institucion extends Model {
    protected $table = 'instituciones';
	public $timestamps = false;
	protected $primaryKey='id_instituciones';
    //Ejemplo de definir campos
    //protected $fillable = ['username','email','password'];
}