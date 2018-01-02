<?php 
namespace App;
use App\MunicipioCne;
use App\ParroquiaCne;
use App\Ubch;
use \Illuminate\Database\Eloquent\Model;
 
class Problematica extends Model {
    protected $table = 'problematica_ubch';
	public $timestamps = false;
	protected $primaryKey='id_problematica_ubch';
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

	public function tipo()
	{
		return $this->belongsTo(TipoProblematica::class, 'id_tipo_problema','id_tipo_problema');
	}

	public function ubch()
	{
		return $this->belongsTo(Ubch::class, 'id_ubch','id_ubch');
	}
}
