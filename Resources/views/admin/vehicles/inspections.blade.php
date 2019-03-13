@extends('layouts.master')

@section('content-header')
<h1>
  {{ trans('icda::inspections.list resource') }}
</h1>
<ol class="breadcrumb">
  <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
  <li><a href="{{ route('admin.icda.vehicles.index') }}">{{ trans('icda::vehicles.title.vehicles') }}</a></li>
  <li class="active">{{ trans('icda::inspections.list resource') }}</li>
</ol>
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <div class="tab-content">
        <!-- Box body -->
        <div class="box-body row">
          <div class="col-md-12 text-center">
            <div class="table-responsive text-justify">
              <table class="data-table table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>{{ trans('icda::inspections.table.inspection type') }}</th>
                    <th>{{ trans('core::core.table.created at') }}</th>
                    <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (isset($vehicles)): ?>
                    <?php foreach ($vehicles->inspections as $inspection): ?>
                      <tr>
                        <td>{{$inspection->inspectionType->name  }}</td>
                        <td>
                          {{ $inspection->created_at }}
                        </td>
                        <td>
                          <div class="btn-group">
                            <button type="button" name="button" data-keyboard="false" data-backdrop="false" data-toggle="modal" data-target="#inspection" onclick="loadInspection({{$inspection->id}})" class="btn btn-default btn-flat">See</button>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>{{ trans('icda::inspections.table.inspection type') }}</th>
                    <th>{{ trans('core::core.table.created at') }}</th>
                    <th>{{ trans('core::core.table.actions') }}</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        <!-- Modal -->
        <div id="inspection" class="modal fade" role="dialog">
          <div class="modal-dialog ">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title font-weight-bold">Detalle de la inspección</h4>
              </div>
              <div class="modal-body text-center">
                <div class="row">
                  <div class="col-md-4 form-group">
                    <label for="{{ trans('icda::inspections.table.inspection type') }}">{{ trans('icda::inspections.table.inspection type') }}:</label>
                    <input type="text" class="form-control" id="inspectionType" readonly>
                  </div>
                  <div class="col-md-4 form-group">
                    <label for="{{ trans('icda::inspections.table.vehicle type') }}">{{ trans('icda::inspections.table.vehicle type') }}:</label>
                    <input type="text" class="form-control" id="vehicleType" readonly>
                  </div>
                  <div class="col-md-4 form-group">
                    <label for="{{ trans('icda::inspections.table.teaching vehicle') }}">{{ trans('icda::inspections.table.teaching vehicle') }}:</label>
                    <input type="text" class="form-control" id="teachingVehicle" readonly>
                  </div>
                  <div class="col-md-4 form-group">
                    <label for="{{ trans('icda::inspections.table.mileage') }}">{{ trans('icda::inspections.table.mileage') }}:</label>
                    <input type="text" class="form-control" id="mileage" readonly>
                  </div>
                  <div class="col-md-4 form-group" id="exhostoDiameterContainer">
                    <label for="{{ trans('icda::inspections.table.exhosto diameter') }}">{{ trans('icda::inspections.table.exhosto diameter') }}:</label>
                    <input type="text" class="form-control" id="exhostoDiameter" readonly>
                  </div>
                  <div class="col-md-4 form-group" id="engineCylindersContainer">
                    <label for="{{ trans('icda::inspections.table.engine cylinders') }}">{{ trans('icda::inspections.table.engine cylinders') }}:</label>
                    <input type="text" class="form-control" id="engineCylinders" readonly>
                  </div>
                  <div class="col-md-4 form-group" id="governorContainer">
                    <label for="{{ trans('icda::inspections.table.governor') }}">{{ trans('icda::inspections.table.governor') }}:</label>
                    <input type="text" class="form-control" id="governor" readonly>
                  </div>
                  <div class="col-md-4 form-group" id="taximeterContainer">
                    <label for="{{ trans('icda::inspections.table.taximeter') }}">{{ trans('icda::inspections.table.taximeter') }}:</label>
                    <input type="text" class="form-control" id="taximeter" readonly>
                  </div>
                  <div class="col-md-4 form-group" id="polarizedGlassesContainer">
                    <label for="{{ trans('icda::inspections.table.polarized glasses') }}">{{ trans('icda::inspections.table.polarized glasses') }}:</label>
                    <input type="text" class="form-control" id="polarizedGlasses" readonly>
                  </div>
                  <div class="col-md-4 form-group" id="armoredVehicleContainer">
                    <label for="{{ trans('icda::inspections.table.armored vehicle') }}">{{ trans('icda::inspections.table.armored vehicle') }}:</label>
                    <input type="text" class="form-control" id="armoredVehicle" readonly>
                  </div>
                  <div class="col-md-4 form-group" id="modifiedEngineContainer">
                    <label for="{{ trans('icda::inspections.table.modified engine') }}">{{ trans('icda::inspections.table.modified engine') }}:</label>
                    <input type="text" class="form-control" id="modifiedEngine" readonly>
                  </div>
                  <div class="col-md-4 form-group" id="spareTiresContainer">
                    <label for="{{ trans('icda::inspections.table.spare tires') }}">{{ trans('icda::inspections.table.spare tires') }}:</label>
                    <input type="text" class="form-control" id="spareTires" readonly>
                  </div>
                  <div class="col-md-12 text-center gasCerficate">
                    <hr>
                    <h4>{{trans('icda::inspections.table.gas vehicle')}}</h4>
                  </div>
                  <div class="col-md-4 form-group gasCerficate">
                    <label for="{{ trans('icda::inspections.table.gas certificate') }}">{{ trans('icda::inspections.table.gas certificate') }}:</label>
                    <input type="text" class="form-control" id="gasCerficate" readonly>
                  </div>
                  <div class="col-md-4 form-group gasCerficate">
                    <label for="{{ trans('icda::inspections.table.gas certifier') }}">{{ trans('icda::inspections.table.gas certifier') }}:</label>
                    <input type="text" class="form-control" id="gasCertifier" readonly>
                  </div>
                  <div class="col-md-4 form-group gasCerficate">
                    <label for="{{ trans('icda::inspections.table.gas certificate expiration') }}">{{ trans('icda::inspections.table.gas certificate expiration') }}:</label>
                    <input type="text" class="form-control" id="gasCertificateExpiration" readonly>
                  </div>
                  {{--Pre inspections--}}
                  <div class="col-md-12 text-center">
                    <hr>
                    <h4>{{trans('icda::inspections.table.pre inspection')}}</h4>
                    <div class="col-md-12" id="preInspections">

                    </div>
                  </div>
                  {{--Axes--}}
                  <div class="col-md-12 text-center">
                    <hr>
                    <h4>{{trans('icda::inspections.table.axes')}}</h4>
                    <div class="col-md-1 align-content-center">
                      <strong>{{trans('icda::inspections.table.tires')}}</strong>
                    </div>
                    <div class="col-md-11" id="axes">

                    </div>
                  </div>
                  {{--Inventory--}}
                  <div class="col-md-12 text-center">
                    <hr>
                    <h4>{{trans('icda::inspections.table.inventory')}}</h4>
                    <div class="table-responsive text-justify">
                      <table class="table table-bordered table-hover" id="tableInventory">
                        <thead>
                          <th>Item</th>
                          <th>{{trans('icda::inspections.table.evaluation')}}</th>
                          <th>{{trans('icda::inspections.table.quantity')}}</th>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                  </div>
                  {{--Gallery img's--}}

                  {{--Observations--}}
                  <div class="col-md-12 text-center" id="observationsContainer">
                    <hr>
                    <h4>{{trans('icda::inspections.table.observations')}}</h4>
                    <textarea class="form-control" id="observations" rows="8" cols="80" style="max-width:auto;"></textarea>
                  </div>
                  {{--Vehicle prepared--}}
                  <div class="col-md-12 text-center">
                    <hr>
                    <div class="col-md-2">
                      <label>Vehículo preparado para la inspección</label>
                      <input type="text" class="form-control" id="vehiclePrepared" readonly>
                    </div>
                    <div class="col-md-10">
                      <label>Firma y cédula entrega vehículo</label>
                      <img id="vehicleDeliverySignature" class="img-responsive img-fluid">
                    </div>
                    <div class="col-md-2" style="display:none;" id="seenTechnicalDirectorContainer">
                      <label>Visto bueno del director</label>
                      <input type="text" class="form-control" id="seenTechnicalDirector" readonly>
                    </div>
                    <div class="col-md-10" style="display:none;" id="signatureReceivedReportContainer">
                      <label>Firma y cedúla recibí informe, FUR y vehículo </label>
                      <img id="signatureReceivedReport" class="img-responsive img-fluid">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('core::core.back') }}</button>
              </div>
            </div>

          </div>
        </div>
        <!-- Modal -->
        <!-- Box body -->
{{--        <div class="box-footer">
          <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.update') }}</button>
          <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.icda.vehicles.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
        </div>--}}
      </div>
    </div> {{-- end nav-tabs-custom --}}
  </div>
</div>
@stop

@section('footer')
<a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
<dl class="dl-horizontal">
  <dt><code>b</code></dt>
  <dd>{{ trans('core::core.back to index') }}</dd>
</dl>
@stop

@push('js-stack')
<script type="text/javascript">
  // var inspections={!! $vehicles->inspections ? $vehicles->inspections : "''"!!};
  // console.log('test inspections',inspections);
  function loadInspection(inspection_id){
    $.ajax({
      url:"{{url('/')}}"+'/api/icda/inspections/'+inspection_id,
      type:'GET',
      headers:{'X-CSRF-TOKEN': "{{csrf_token()}}"},
      dataType:"json",
      data:{},
      success:function(result){
        var htmlPreInspection="";
        var htmlAxes="";
        var htmlInventory="";
        $('#inspectionType').val(result.data.inspectionType.name);
        $('#vehicleType').val(result.data.typeVehicle);
        //Teaching Vehicle
        if(result.data.teachingVehicle==1)
          $('#teachingVehicle').val("{{trans('icda::inspections.form.yes')}}");
        else
          $('#teachingVehicle').val("{{trans('icda::inspections.form.no')}}");
        //Kilometraje
        $('#mileage').val(result.data.mileage);
        //Exhosto Diameter
        if(result.data.exhostoDiameter){
          $('#exhostoDiameter').val(result.data.exhostoDiameter);
          $('#exhostoDiameterContainer').show();
        }else
        $('#exhostoDiameterContainer').hide();
        //Engine Cylinders
        if(result.data.engineCylinders){
          $('#engineCylinders').val(result.data.engineCylinders);
          $('#engineCylindersContainer').show();
        }else
        $('#engineCylindersContainer').hide();
        //Governor
        if(result.data.governor){
          if(result.data.governor==1)
            $('#governor').val("{{trans('icda::inspections.form.yes')}}");
          else
            $('#governor').val("{{trans('icda::inspections.form.no')}}");
          $('#governorContainer').show();
        }else
        $('#governorContainer').hide();
        //Taximeter
        if(result.data.taximeter){
          if(result.data.taximeter==1)
            $('#taximeter').val("{{trans('icda::inspections.form.yes')}}");
          else
            $('#taximeter').val("{{trans('icda::inspections.form.no')}}");
          $('#taximeterContainer').show();
        }else
        $('#taximeterContainer').hide();
        //Gas cerificate
        if(result.data.gasCertificate){
          $('#gasCertificate').val(result.data.gasCertificate);
          $('#gasCertifier').val(result.data.gasCertifier);
          $('#gasCertificateExpiration').val(result.data.gasCertificateExpiration);
          $('.gasCertificate').show();
        }else{
          console.log('hide gas certificates');
          $('.gasCertificate').hide();
        }
        //polarizedGlasses
        if(result.data.polarizedGlasses){
          if(result.data.polarizedGlasses==1)
          $('#polarizedGlasses').val("{{trans('icda::inspections.form.yes')}}");
          else
          $('#polarizedGlasses').val("{{trans('icda::inspections.form.no')}}");
          $('#polarizedGlassesContainer').show();
        }else
        $('#polarizedGlassesContainer').hide();
        //armoredVehicle
        if(result.data.armoredVehicle){
          if(result.data.armoredVehicle==1)
          $('#armoredVehicle').val("{{trans('icda::inspections.form.yes')}}");
          else
          $('#armoredVehicle').val("{{trans('icda::inspections.form.no')}}");
          $('#armoredVehicleContainer').show();
        }else
        $('#armoredVehicleContainer').hide();
        //modifiedEngine
        if(result.data.modifiedEngine){
          if(result.data.modifiedEngine==1)
          $('#modifiedEngine').val("{{trans('icda::inspections.form.yes')}}");
          else
          $('#modifiedEngine').val("{{trans('icda::inspections.form.no')}}");
          $('#modifiedEngineContainer').show();
        }else
        $('#modifiedEngineContainer').hide();
        //spareTires
        if(result.data.spareTires){
          $('#spareTires').val(spareTires);
          $('#spareTiresContainer').show();
        }else
        $('#spareTiresContainer').hide();
        //preInspections
        for(var i=0;i<result.data.preInspections.length;i++){
          htmlPreInspection+="<div class='col-md-4'>";
          htmlPreInspection+='<label >'+result.data.preInspections[i].name+':</label>';
          if(result.data.preInspections[i].value==1)
          htmlPreInspection+='<input type="text" class="form-control" value="{{trans('icda::inspections.form.yes')}}" readonly>';
          else
          htmlPreInspection+='<input type="text" class="form-control" value="{{trans('icda::inspections.form.no')}}" readonly>';
          htmlPreInspection+="</div>";
        }//for
        $('#preInspections').html(htmlPreInspection);
        //Axes
        for(var i=0;i<result.data.axes.length;i++){
          // console.log(result.data.axes[i]);
          htmlAxes+="<div class='col-md-11'>";
          htmlAxes+="<h5>{{trans('icda::inspections.table.axe')}} "+(i+1)+"</h5><br>";
          /* For tires*/
          htmlAxes+="<div class='col-md-3'>";
          htmlAxes+="<strong>{{trans('icda::inspections.table.side')}}:</strong><br>";
          htmlAxes+="<strong>{{trans('icda::inspections.table.pressure init')}}:</strong><br>";
          htmlAxes+="<strong>{{trans('icda::inspections.table.adjust')}}:</strong><br>";
          htmlAxes+="</div>";
          for(var a=0;a<result.data.axes[i].length;a++){
            htmlAxes+="<div class='col-md-2'>";
            htmlAxes+='<label >'+result.data.axes[i][a].type+'</label>';
            htmlAxes+='<input type="text" class="form-control" value="'+result.data.axes[i][a].pressure_init+'" readonly>';
            htmlAxes+='<input type="text" class="form-control" value="'+result.data.axes[i][a].adjustment+'" readonly>';
            htmlAxes+="</div>";
          }
          htmlAxes+="</div>";
        }//for
        $('#axes').html(htmlAxes);
        //Inventory items
        for (var i = 0; i < result.data.itemsInventory.length; i++) {
          htmlInventory+="<tr>";
          htmlInventory+="<td>"+result.data.itemsInventory[i].name+"</td>";
          htmlInventory+="<td>"+result.data.itemsInventory[i].evaluation+"</td>";
          htmlInventory+="<td>"+result.data.itemsInventory[i].quantity+"</td>";
          htmlInventory+="</tr>";
        }//for items inventory
        if ( $.fn.DataTable.isDataTable('#tableInventory') )
          $('#tableInventory').DataTable().destroy();
        $('#tableInventory tbody').html(htmlInventory);
        $('#tableInventory').DataTable();
        //Observations
        if (result.data.observations) {
          $('#observations').val(result.data.observations);
          $('#observationsContainer').show();
        }else
        $('#observationsContainer').hide();
        //Vehicle Prepared to inspection
        if(result.data.vehiclePrepared==1)
        $('#vehiclePrepared').val("{{trans('icda::inspections.form.yes')}}");
        else
        $('#vehiclePrepared').val("{{trans('icda::inspections.form.no')}}");
        //Signature
        $("#vehicleDeliverySignature").attr("src",result.data.vehicleDeliverySignature);
        //Vehicle Prepared to inspection
        if (result.data.seenTechnicalDirector) {
          if(result.data.seenTechnicalDirector==1)
          $('#seenTechnicalDirector').val("{{trans('icda::inspections.form.yes')}}");
          else
          $('#seenTechnicalDirector').val("{{trans('icda::inspections.form.no')}}");
          $('#seenTechnicalDirectorContainer').show();
        }else
        $('#seenTechnicalDirectorContainer').hide();
        //Signature received report
        if(result.data.signatureReceivedReport){
          $("#signatureReceivedReport").attr("src",result.data.signatureReceivedReport);
          $('#signatureReceivedReportContainer').show();
        }else
        $('#signatureReceivedReportContainer').hide();
      },
      error:function(error){
        /*console.log(error);*/
      }
    });//ajax
  }//loadInspection
</script>
<script type="text/javascript">
$( document ).ready(function() {
  $(document).keypressAction({
    actions: [
      { key: 'b', route: "<?= route('admin.icda.vehicles.index') ?>" }
    ]
  });
});
</script>
<script>
$( document ).ready(function() {
  $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
    checkboxClass: 'icheckbox_flat-blue',
    radioClass: 'iradio_flat-blue'
  });
});
</script>
<?php $locale = locale(); ?>
<script type="text/javascript">
$(function () {
  $('.data-table').dataTable({
    "paginate": true,
    "lengthChange": true,
    "filter": true,
    "sort": true,
    "info": true,
    "autoWidth": true,
    "order": [[ 0, "desc" ]],
    "language": {
      "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
    }
  });
});
</script>
@endpush
