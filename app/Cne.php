<?php 
namespace App;
use App\MunicipioCne;
use App\ParroquiaCne;
use \Illuminate\Database\Eloquent\Model;
 
class Cne extends Model {
    protected $table = 'tabla_cne';
	public $timestamps = false;
    //Ejemplo de definir campos
    //protected $fillable = ['username','email','password'];

	public function municipio()
	{
		return $this->hasOne(MunicipioCne::class, 'id_municipio','id_municipio');
	}

	public function parroquia()
	{
		return $this->hasOne(ParroquiaCne::class, 'id_parroquia','id_parroquia');
	}
}

