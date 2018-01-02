<?php 
namespace App;
use \Illuminate\Database\Eloquent\Model;
 
class CandidatoCentro extends Model {
    protected $table = 'candidatos_mesas';
	protected $primaryKey='id_candidatos';
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
		return $this->belongsTo(CentroClp::class, 'id_centros_clp','id_centros_clp');
	}
}

