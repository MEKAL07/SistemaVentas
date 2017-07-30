<?php
  namespace App\Model;
  use Illuminate\Database\Eloquent\Model;

  /**
   *
   */
  class TPersona extends Model
  {
    protected $table='persona';
    protected $primaryKey='idpersona';
    public $incrementing=true;
    public $timestamps=false;//controlamos nosotros y si es true controla larabel

    public function tVenta()
    {
      return $this->hasMany('App\Model\TVenta','dniCliente');
    }

  }

 ?>