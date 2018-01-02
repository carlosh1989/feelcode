<?php 
namespace App;
use \Illuminate\Database\Eloquent\Model;
 
class Requerimiento extends Model {
    protected $table = 'requerimientos';
	public $timestamps = false;
	protected $primaryKey='id_requerimientos';
    //Ejemplo de definir campos
    //protected $fillable = ['username','email','password'];
}

