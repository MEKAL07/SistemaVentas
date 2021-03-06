<?php
  namespace App\Model;
  use Illuminate\Database\Eloquent\Model;

  /**
   *
   */
  class TProveedor extends Model
  {
    protected $table='proveedores';
    protected $primaryKey='idproveedor';
    public $incrementing=true;
    public $timestamps=false;//controlamos nosotros y si es true controla larabel

    public function tVenta()
    {
      return $this->hasMany('App\Model\TVenta','dniCliente');
    }

  }

 ?>