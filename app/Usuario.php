<?php 
namespace App;

use App\BancoPersonal;
use App\CentroClp;
use App\ClpResponsable;
use App\Institucion;
use App\LaboratorioPersonal;
use App\MunicipalResponsable;
use App\MunicipioCne;
use App\ParroquiaCne;
use App\Ubch;
use \Illuminate\Database\Eloquent\Model;
 
class Usuario extends Model {
    protected $table = 'usuarios';

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

	public function banco_personal()
	{
		return $this->hasOne(BancoPersonal::class, 'usuario_id','id');
	}

	public function laboratorio_personal()
	{
		return $this->hasOne(LaboratorioPersonal::class, 'usuario_id','id');
	}

	public function instituciones()
	{
		return $this->belongsTo(Institucion::class, 'id_instituciones','id_instituciones');
	}

	public function centro()
	{
		return $this->belongsTo(Ubch::class,'id_ubch','id_ubch');
	}

	public function centros()
	{
		return $this->hasMany(Ubch::class,'id_clp','id_clp');
	}

	public function centros_clp()
	{
		return $this->hasMany(CentroClp::class,'id_clp','id_clp');
	}

	public function centro_clp()
	{
		return $this->hasOne(CentroClp::class,'id_clp','id_clp');
	}

	public function responsables_clp()
	{
		return $this->hasMany(ClpResponsable::class,'id_municipal','id_municipal');
	}

	public function datos_municipal()
	{
		return $this->hasOne(MunicipalResponsable::class,'id_responasble_municipal','id_municipal');
	}
}

