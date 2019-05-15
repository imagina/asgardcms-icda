<div class="box-body">
  <div class='form-group{{ $errors->has("{$lang}.name") ? ' has-error' : '' }}'>
      {!! Form::label("{$lang}[title]", trans('icda::common.table.name')) !!}
      {!! Form::text("{$lang}[name]", old("{$lang}.name"), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('icda::common.table.name')]) !!}
      {!! $errors->first("{$lang}.name", '<span class="help-block">:message</span>') !!}
  </div>
</div>
