<?php
  namespace App\Model;
  use Illuminate\Database\Eloquent\Model;

  /**
   *
   */
  class TCategoria extends Model
  {
    protected $table='categoria';
    protected $primaryKey='idcategoria';
    public $incrementing=true;
    public $timestamps=false;//controlamos nosotros y si es true controla larabel

    public function tVenta()
    {
      return $this->hasMany('App\Model\TVenta','dniCliente');
    }

  }

 ?>