@extends('layouts.master')

@section('content-header')
<h1>
  {{ trans('icda::vehicles.title.create vehicles') }}
</h1>
<ol class="breadcrumb">
  <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
  <li><a href="{{ route('admin.icda.vehicles.index') }}">{{ trans('icda::vehicles.title.vehicles') }}</a></li>
  <li class="active">{{ trans('icda::vehicles.title.create vehicles') }}</li>
</ol>
@stop

@section('content')
{!! Form::open(['route' => ['admin.icda.vehicles.store'], 'method' => 'post']) !!}
<div class="row">
  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <div class="tab-content">
        @include('icda::admin.vehicles.partials.create-fields')
        <div class="box-footer">
          <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
          <!-- <button type="button" onclick="createVehicle()" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button> -->
          <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.icda.vehicles.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
        </div>
      </div>
    </div> {{-- end nav-tabs-custom --}}
  </div>
</div>
{!! Form::close() !!}
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
//Validate data
function validateData(){
  var error=0;
  if($('#service_type').val()==""){
    error++;
    alert('The service type field is required');
  }
  if($('#type_vehicle').val()==""){
    error++;
    alert('The vehicle type field is required');
  }
  if($('#type_fuel').val()==""){
    error++;
    alert('The fuel type field is required');
  }
  if($('#board').val()==""){
    error++;
    alert('The board field is required');
  }
  if($('#board').val()==""){
    error++;
    alert('The board field is required');
  }
  if($('#brand').val()==""){
    error++;
    alert('The brand field is required');
  }
  if($('#line').val()==""){
    error++;
    alert('The line field is required');
  }
  if($('#model').val()==""){
    error++;
    alert('The model field is required');
  }
  if($('#color').val()==""){
    error++;
    alert('The color field is required');
  }
  if($('#color').val()==""){
    error++;
    alert('The color field is required');
  }
  if($('#transit_license').val()==""){
    error++;
    alert('The transit license field is required');
  }
  if($('#enrollment_date').val()==""){
    error++;
    alert('The enrollment date field is required');
  }
  if($('#chasis_number').val()==""){
    error++;
    alert('The chasis number field is required');
  }
  if($('#engine_number').val()==""){
    error++;
    alert('The engine number field is required');
  }
  if(error==0)
  return true;
  else
  return false;
}//validateData
//Create ajax
function createVehicle(inspection_id){
  var validate=false;
  validate=validateData();//Validate all data
  var data={
    service_type:$('#service_type').val(),
    type_vehicle:$('#type_vehicle').val(),
    type_fuel:$('#type_fuel').val(),
    board:$('#board').val(),
    brand:$('#brand').val(),
    line:$('#line').val(),
    model:$('#model').val(),
    color:$('#color').val(),
    transit_license:$('#transit_license').val(),
    enrollment_date:$('#enrollment_date').val(),
    chasis_number:$('#chasis_number').val(),
    engine_number:$('#engine_number').val(),
    insurance_expedition:$('#insurance_expedition').val(),
    insurance_expiration:$('#insurance_expiration').val(),
    user_id:$('#user_id').val()
  };
  if($('#axes_number').val()!="")
  data.axes_number=$('#axes_number').val();
  console.log(data);
  if(validate){
    $.ajax({
      url:"{{url('/')}}"+'/api/icda/vehicles/',
      type:'POST',
      headers:{'X-CSRF-TOKEN': "{{csrf_token()}}"},
      dataType:"json",
      data:data,
      success:function(result){
        // console.log(result.data);
        alert('Vehículo registrado exitosamente');
      },
      error:function(error){
        /*console.log(error);*/
        alert('Ha ocurrido un error, por favor valida los datos que estas ingresando.');
      }
    });//ajax
  }
}//loadInspection

//Create ajax
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
@endpush
