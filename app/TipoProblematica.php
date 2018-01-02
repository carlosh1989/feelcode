<?php 
namespace App;
use App\MunicipioCne;
use App\ParroquiaCne;
use App\TipoProblematica;
use \Illuminate\Database\Eloquent\Model;
 
class TipoProblematica extends Model {
    protected $table = 'tipo_problematicas';
	public $timestamps = false;
	protected $primaryKey='id_tipo_problema';
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
		return $this->belongsTo(TipoProblematica::class, 'id_problema','id_problema');
	}
}