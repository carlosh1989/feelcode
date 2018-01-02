<?php 
namespace App;
use App\MesaTestigo;
use \Illuminate\Database\Eloquent\Model;
 
class Mesa extends Model {
    protected $table = 'mesas_ubch';
	public $timestamps = false;
	protected $primaryKey='id_mesas_ubch';
    //Ejemplo de definir campos
    //protected $fillable = ['username','email','password'];
	public function testigos()
	{
		return $this->hasMany(MesaTestigo::class,'id_mesas_ubch','id_mesas_ubch');
	}
}

