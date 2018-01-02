<?php 
namespace App;
use App\Partido;
use \Illuminate\Database\Eloquent\Model;
 
class MesaTestigo extends Model {
    protected $table = 'mesas_ubch_testigos';
	public $timestamps = false;
	protected $primaryKey='id_mesas_ubch_testigos';
    //Ejemplo de definir campos
    //protected $fillable = ['username','email','password'];

	public function partido()
	{
		return $this->belongsTo(Partido::class,'id_partidos','id_partidos');
	}
}

