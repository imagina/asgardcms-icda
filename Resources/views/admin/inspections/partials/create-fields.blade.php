<div class="box-body row">
  <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
  <div class="col-md-6">
    <label for="board">{{trans('icda::vehicles.table.board')}}:</label>
    <input type="text" class="form-control" name="board">
  </div>
  <div class="col-md-6">
    <label for="model">{{trans('icda::vehicles.table.model')}}:</label>
    <input type="text" class="form-control" name="model">
  </div>
</div>
