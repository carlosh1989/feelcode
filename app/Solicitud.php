<?php 
namespace App;
use App\TipoSolicitud;
use \Illuminate\Database\Eloquent\Model;
 
class Solicitud extends Model {
    protected $table = 'solicitud_ubch';
	public $timestamps = false;
	protected $primaryKey='id_solicitud_ubch';

    //Ejemplo de definir campos
    //protected $fillable = ['username','email','password'];

	public function tipo()
	{
		return $this->belongsTo(TipoSolicitud::class, 'id_tipo_solicitud','id_tipo_solicitud');
	}

	public function municipio()
	{
		return $this->hasOne(MunicipioCne::class, 'id_municipio','id_municipio');
	}

	public function parroquia()
	{
		return $this->hasOne(ParroquiaCne::class, 'id_parroquia','id_parroquia');
	}

	public function ubch()
	{
		return $this->belongsTo(Ubch::class, 'id_ubch','id_ubch');
	}
}

