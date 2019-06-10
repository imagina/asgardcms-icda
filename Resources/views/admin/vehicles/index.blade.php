@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('icda::vehicles.title.vehicles') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i
                        class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('icda::vehicles.title.vehicles') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.icda.vehicles.create') }}" class="btn btn-primary btn-flat"
                       style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('icda::vehicles.button.create vehicles') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Lista de {{ trans('iblog::post.title.posts') }}</h3>
                    <div class="box-tools">
                        {!! Form::open(['route' => ['admin.icda.vehicles.index'], 'method' => 'get']) !!}
                        <div class="input-group input-group-sm" style="width: 250px; margin-bottom: 10px">
                            <input type="text" name="q" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="data-table table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>{{ trans('icda::vehicles.table.board') }}</th>
                                <th>{{ trans('icda::vehicles.table.brand') }}</th>
                                <th>{{ trans('icda::vehicles.table.line') }}</th>
                                <th>{{ trans('icda::vehicles.table.model') }}</th>
                                <th>{{ trans('icda::vehicles.table.color') }}</th>
                                <th>{{ trans('icda::vehicles.table.owner') }}</th>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($vehicles)): ?>
                            <?php foreach ($vehicles as $vehicle): ?>
                            <tr>
                                <td>{{$vehicle->board}}</td>
                                <td>
                                    @if($vehicle->brand)
                                        {{$vehicle->brand->name}}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @if($vehicle->line)
                                        {{$vehicle->line->name}}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>{{$vehicle->model}}</td>
                                <td>
                                    @if($vehicle->color)
                                        {{$vehicle->color->name}}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @if($vehicle->user)
                                        {{$vehicle->user->present()->fullName()}}
                                    @else
                                        --
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.icda.vehicles.edit', [$vehicle->id]) }}">
                                        {{ $vehicle->created_at }}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        @if(count($vehicle->inspections)>0)
                                            <a href="{{ route('admin.icda.vehicles.inspections', [$vehicle->id]) }}"
                                               title="{{trans('icda::vehicles.button.see inspections')}}"
                                               class="btn btn-default btn-flat"><i class="fa fa-eye"></i></a>
                                        @endif
                                        <a href="{{ route('admin.icda.vehicles.edit', [$vehicle->id]) }}"
                                           class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal"
                                                data-target="#modal-delete-confirmation"
                                                data-action-target="{{ route('admin.icda.vehicles.destroy', [$vehicle->id]) }}">
                                            <i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>{{ trans('icda::vehicles.table.board') }}</th>
                                <th>{{ trans('icda::vehicles.table.brand') }}</th>
                                <th>{{ trans('icda::vehicles.table.line') }}</th>
                                <th>{{ trans('icda::vehicles.table.model') }}</th>
                                <th>{{ trans('icda::vehicles.table.color') }}</th>
                                <th>{{ trans('icda::vehicles.table.owner') }}</th>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th>{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </tfoot>
                        </table>
                        <!-- /.box-body -->
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">

                            </div>
                        </div>
                        <div class="col-sm-7">
                            @if (isset($vehicles))
                                {{$vehicles->links()}}
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('icda::vehicles.title.create vehicles') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).keypressAction({
                actions: [
                    {key: 'c', route: "<?= route('admin.icda.vehicles.create') ?>"}
                ]
            });
        });
    </script>
    <?php $locale = locale(); ?>
    {{---
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
    });-}}
    </script>
    @endpush
