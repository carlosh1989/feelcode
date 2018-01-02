<?php 
namespace App;
use App\Mesa;
use App\MunicipioCne;
use App\ParroquiaCne;
use App\Problematica;
use App\Solicitud;
use App\UbchSolicitudComunicacion;
use App\UbchUnoxDiez;
use \Illuminate\Database\Eloquent\Model;
 
class Ubch extends Model {
    protected $table = 'registro_ubch';
	public $timestamps = false;
	protected $primaryKey='id_ubch';
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

	public function responsable()
	{
		return $this->hasOne(UbchResponsable::class, 'id_ubch','id_ubch');
	}

	public function mesas()
	{
		return $this->belongsTo(MesasCne::class, 'tipo_solicitud_id', 'id');
	}

	public function requerimientos()
	{
		return $this->hasMany(Requerimiento::class,'id_ubch','id_ubch');
	}

	public function solicitudes_comunicaciones()
	{
		return $this->hasMany(UbchSolicitudComunicacion::class,'id_ubch','id_ubch');
	}

	public function problematicas()
	{
		return $this->hasMany(Problematica::class,'id_ubch','id_ubch');
	}

	public function solicitudes()
	{
		return $this->hasMany(Solicitud::class,'id_ubch','id_ubch');
	}

	public function centro_mesas()
	{
		return $this->hasMany(Mesa::class,'id_ubch','id_ubch');
	}

	public function unoxdiez_padrinos()
	{
		return $this->hasMany(UbchUnoxDiez::class,'id_ubch','id_ubch');
	}

	public function patrulleros()
	{
		return $this->hasMany(UbchUnoxDiez::class,'id_ubch','id_ubch');
	}
}
