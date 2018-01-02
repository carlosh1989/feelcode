<?php 
namespace App;
use App\Ubch;
use \Illuminate\Database\Eloquent\Model;
 
class UbchSolicitudComunicacion extends Model {
    protected $table = 'requerimientos_comunicaciones_ubch';
	protected $primaryKey='id_requerimientos';
	public $timestamps = false;

    //Ejemplo de definir campos
    //protected $fillable = ['username','email','password'];
	public function centro()
	{
		return $this->belongsTo(Ubch::class, 'id_ubch','id_ubch');
	}

}

