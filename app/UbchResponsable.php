<?php 
namespace App;
use App\MunicipioCne;
use App\ParroquiaCne;
use \Illuminate\Database\Eloquent\Model;
 
class UbchResponsable extends Model {
    protected $table = 'responsable_ubch';
	public $timestamps = false;
	protected $primaryKey='id_responsable_ubch';
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

	public function centro()
	{
		return $this->hasOne(ParroquiaCne::class, 'id_ubch','id_ubch');
	}
}
