<?php 
namespace App;
use App\ClpResponsable;
use App\MunicipioCne;
use App\ParroquiaCne;
use App\Ubch;
use App\Usuario;
use \Illuminate\Database\Eloquent\Model;
 
class CentroClp extends Model {
    protected $table = 'centros_clp';
	protected $primaryKey='id_centros_clp';
	public $timestamps = false;
    //Ejemplo de definir campos
    //protected $fillable = ['username','email','password'];
	public function clp()
	{
		return $this->belongsTo(Usuario::class, 'id_clp', 'id_clp');
	}

	public function ubch()
	{
		return $this->hasOne(Ubch::class, 'codigo_cne','codigo_cne');
	}

	public function municipio()
	{
		return $this->hasOne(MunicipioCne::class, 'id_municipio','id_municipio');
	}

	public function parroquia()
	{
		return $this->hasOne(ParroquiaCne::class, 'id_parroquia','id_parroquia');
	}

	public function responsable()
	{
		return $this->hasOne(ClpResponsable::class, 'id_clp','id_clp');
	}

	public function centros()
	{
		return $this->hasMany(Ubch::class, 'id_clp','id_clp');
	}
}

