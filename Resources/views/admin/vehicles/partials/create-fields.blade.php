<div class="box-body row">
  <div class="col-md-4">
    <label for="service type">{{trans('icda::vehicles.table.service type')}}:</label>
    <input type="text" class="form-control" name="service_type">
  </div>
  <div class="col-md-4">
    <label for="type vehicle">{{trans('icda::vehicles.table.type vehicle')}}:</label>
    <input type="text" class="form-control" name="type_vehicle">
  </div>
  <div class="col-md-4">
    <label for="type fuel">{{trans('icda::vehicles.table.type fuel')}}:</label>
    <input type="text" class="form-control" name="type_fuel">
  </div>
  <div class="col-md-4">
    <label for="board">{{trans('icda::vehicles.table.board')}}:</label>
    <input type="text" class="form-control" name="board">
  </div>
  <div class="col-md-4">
    <label for="brand">{{trans('icda::vehicles.table.brand')}}:</label>
    <input type="text" class="form-control" name="brand">
  </div>
  <div class="col-md-4">
    <label for="line">{{trans('icda::vehicles.table.line')}}:</label>
    <input type="text" class="form-control" name="line">
  </div>
  <div class="col-md-4">
    <label for="model">{{trans('icda::vehicles.table.model')}}:</label>
    <input type="text" class="form-control" name="model">
  </div>
  <div class="col-md-4">
    <label for="color">{{trans('icda::vehicles.table.color')}}:</label>
    <input type="text" class="form-control" name="color">
  </div>
  <div class="col-md-4">
    <label for="transit_license">{{trans('icda::vehicles.table.transit license')}}:</label>
    <input type="text" class="form-control" name="transit_license">
  </div>
  <div class="col-md-4">
    <label for="enrollment_date">{{trans('icda::vehicles.table.enrollment date')}}:</label>
    <input type="text" class="form-control" name="enrollment_date">
  </div>
  <div class="col-md-4">
    <label for="chasis_number">{{trans('icda::vehicles.table.chasis number')}}:</label>
    <input type="text" class="form-control" name="chasis_number">
  </div>
  <div class="col-md-4">
    <label for="engine number">{{trans('icda::vehicles.table.engine number')}}:</label>
    <input type="text" class="form-control" name="engine_number">
  </div>
  <div class="col-md-4">
    <label for="displacement">{{trans('icda::vehicles.table.displacement')}}:</label>
    <input type="text" class="form-control" name="displacement">
  </div>
  <div class="col-md-4">
    <label for="axes_number">{{trans('icda::vehicles.table.axes number')}}:</label>
    <input type="text" class="form-control" name="axes_number">
  </div>
  <div class="col-md-4">
    <label for="insurance_expedition">{{trans('icda::vehicles.table.insurance expedition')}}:</label>
    <input type="date" class="form-control" name="insurance_expedition">
  </div>
  <div class="col-md-4">
    <label for="insurance_expiration">{{trans('icda::vehicles.table.insurance expiration')}}:</label>
    <input type="date" class="form-control" name="insurance_expiration">
  </div>
  <div class="col-md-4">
    <label for="Owner">{{trans('icda::vehicles.table.owner')}}:</label>
    <select class="form-control" name="user_id">
        <option value="0">{{trans('icda::vehicles.form.select a owner')}}</option>
        @foreach($users as $user)
          <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
        @endforeach
    </select>
  </div>
</div>
