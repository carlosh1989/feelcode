<?php 
namespace App;
use App\Candidato;
use App\MesasCne;
use App\VotoDetalle;
use \Illuminate\Database\Eloquent\Model;
 
class Voto extends Model {
    protected $table = 'votos';
	protected $primaryKey='id_votos';
	public $timestamps = false;
    //Ejemplo de definir campos
    //protected $fillable = ['username','email','password'];

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

	public function centros_clp()
	{
		return $this->belongsTo(MesasCne::class, 'id_mesa','id_mesas_cne');
	}

	public function candidato()
	{
		return $this->hasOne(Candidato::class, 'id_candidatos','id_candidatos');
	}

	public function ultimo_voto()
	{
		return $this->hasOne(VotoDetalle::class,'id_votos','id_votos');
	}
}

