<?php


namespace Modules\Icda\Events\Handlers;

use Modules\Icda\Events\MigrateVehicle;
//Entidades
use Modules\Icda\Entities\VehiclesExternalMySql;
use Modules\Icda\Entities\ClientesExternalMySql;
use Modules\Icda\Entities\HojaDeTrabajoExternalMySql;
use Modules\Icda\Entities\PruebasExternalMySql;
use Modules\Icda\Entities\MarcasExternalMySql;
use Modules\Icda\Entities\ColorExternalMySql;
use Modules\Icda\Entities\LineasExternalMySql;
use Modules\Icda\Entities\Vehicles;
use Modules\Icda\Entities\Inspections;
//Repository
use Modules\Iprofile\Repositories\UserRepository;
//Transformer
use Modules\Iprofile\Transformers\UserProfileTransformer;
class MigrateVehicleData
{
  /**
  * @var Setting
  */
  private $user;
  public function __construct(UserRepository $user)
  {
    $this->user = $user;

  }

  /**
  * @param InspectionWasCreated $event
  */
  public function handle(MigrateVehicle $event)
  {
    try {
      $tecmas_user=config("asgard.icda.config.tecmas_user");
      $entity = $event->entity;//Entity Inspection
      //vehicle
      $vehicle=Vehicles::find($event->entity->vehicles_id);
      //Client id
      $user = $this->user->getItem($vehicle->user_id, (object)["include"=>[]]);
      $user=new UserProfileTransformer($user);
      foreach ($user->fields as $field) {
        if ($field->is_translatable) {
          $data[$field->name] = $field->value;
        } else {
          if (json_decode($field->plain_value)!=null) {
            $user[$field->name] = json_decode($field->plain_value);
          } else {
            $user[$field->name] = $field->plain_value;
          }
        }
      }//fields
      //$user->number_document
      $cliente=ClientesExternalMySql::where("numero_identificacion",$user->number_document)->first();
      if(!$cliente){
        $cliente=ClientesExternalMySql::create([
          "numero_identificacion"=>$user->number_document,
          "tipo_identificacion"=>1,
          "nombre1"=>$user->first_name,
          "apellido1"=>$user->last_name,
          "correo"=>$user->email,
          "propietario"=>1,
          "telefono1"=>"000000000",
          "cod_ciudad"=>11001,
        ]);
      }
      $data=[];
      $externalVehicle=VehiclesExternalMySql::where('numero_placa',$vehicle->board)->first();
      $v=$externalVehicle;
      //$externalVehicle=VehiclesExternalMySql::where('numero_placa',"DDD111")->first();
      $data['numero_placa']=$vehicle->board;
      $data['idpropietarios']=$cliente->idcliente;
      $data['idcliente']=$cliente->idcliente;
      if($vehicle->service_type)
      $data['idservicio']=$vehicle->service_type;
      else
      $data['idservicio']=3;//Particular
      if($vehicle->brand_id && $vehicle->line_id){
        $brand=MarcasExternalMySql::where("nombre","like","%".$vehicle->brand->name."%")->first();
        if(!$brand)
        $brand=MarcasExternalMySql::create(["nombre"=>$vehicle->brand->name]);
        $line=LineasExternalMySql::where("nombre","like","%".$vehicle->line->name."%")->first();
        if(!$line)
        $line=LineasExternalMySql::create(["nombre"=>$vehicle->line->name,"idmarca"=>$brand->idmarca,"idmintrans"=>885]);
        $data['idlinea']=$line->idlinea;
      }else
        throw new \Exception("Vehicle doesn't brand and line data",500);
      if($vehicle->color_id){
        $color=ColorExternalMySql::where("nombre","like","%".$vehicle->color->name."%")->first();
        if(!$color)
          $color=ColorExternalMySql::create(["nombre"=>$vehicle->color->name]);
        $data['idcolor']=$color->idcolor;
      }else
        throw new \Exception("Vehicle doesn't color data",500);
      //Buscar linea
      //$data['idlinea']=29756;
      //Buscar color
      //$data['idcolor']=9441;
      $data['idclase']=$vehicle->vehicle_class;
      $data['idtipocombustible']=$vehicle->type_fuel;
      $data['ano_modelo']=$vehicle->model;
      $data['numero_motor']=$vehicle->engine_number;
      $data['numero_serie']="---";
      $data['numero_tarjeta_propiedad']="---";
      $data['idsoat']=1;
      $data['cilindraje']=$vehicle->displacement;
      $data['kilometraje']=$entity->mileage;
      $data['potencia_motor']=0;
      if($entity->exhosto_diameter)
      $data['diametro_escape']=$entity->exhosto_diameter;
      else
      $data['diametro_escape']=0;
      $data['imagen']="-";
      $data['tipo_vehiculo']=$vehicle->type_vehicle;
      $data['taximetro']=$entity->taximeter;
      if($entity->engine_cylinders)
      $data['cilindros']=$entity->engine_cylinders;
      else
      $data['cilindros']=0;
      $data['tiempos']=0;
      $data['ensenanza']=$entity->teaching_vehicle;
      $data['idpais']=90;
      $data['fecha_matricula']=date("Y-m-d");
      $data['blindaje']=0;
      $data['polarizado']=$entity->polarized_glasses;
      $data['numsillas']=0;
      $data['numero_vin']=$vehicle->vin_number;
      $data['numero_exostos']=1;
      $data['numero_lote']=0;
      $data['diseno']=0;
      $data['transmision']=0;
      $data['scooter']=0;
      //Esto viene de el campo axes de inspection
      $data['numejes']=count($entity->axes);
      $num_llantas=0;
      foreach($entity->axes as $axe)
      $num_llantas=$num_llantas+count($axe);
      $data['numero_llantas']=$num_llantas;
      $data['registrorunt']=0;
      //dd($data);
      if(!$externalVehicle){
        //Si existe el vehículo actualiza sino lo crea
        $v=VehiclesExternalMySql::create($data);
        //dd($v);
      }//externalVehicle
      else{
        //Actualiza datos del vehículo
        VehiclesExternalMySql::where('numero_placa',$vehicle->board)->update($data);
      }
      //Si es reinspeccion es 8888 los demas es 0
      $reinspeccion=0;
      if($entity->inspections_types_id==2)
      $reinspeccion=8888;//Re-inspección
      else
      $hojaTrabajo=HojaDeTrabajoExternalMySql::create([
        'estadototal'=>1,
        'fechainicial'=>date('Y-m-d H:i:s'),
        'idvehiculo'=>$v->idvehiculo,
        'reinspeccion'=>$reinspeccion,
        'usuario'=>$tecmas_user,
        'factura'=>0,
      ]);
      $array=config("asgard.icda.config.tecmas_pruebas");
      $array=json_decode(json_encode($array));
      foreach($array as $key){
        PruebasExternalMySql::create([
          'idhojapruebas'=>$hojaTrabajo->idhojapruebas,
          'fechainicial'=>date('Y-m-d H:i:s'),
          'prueba'=>$key->prueba,
          'idusuario'=>$tecmas_user,
          'idtipo_prueba'=>$key->id
        ]);
      }//foreach
      //dd($v,$hojaTrabajo);
      \Log::info("insert successfull");
    } catch (\Exception $e) {
      //dd($e->getMessage());
      \Log::error("Error eventHander migrateVehicleData :".$e->getMessage());
    }


  }//handle()
}
