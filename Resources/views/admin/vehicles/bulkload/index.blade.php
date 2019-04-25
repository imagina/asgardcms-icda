@extends('layouts.master')
@section('content')
    <div class="container text-center py-5">
        <div class="card">
            <div class="card-body">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{trans('icda::vehicles.bulkload.title')}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" enctype='multipart/form-data' action="{{route('admin.icda.bulkload.import')}}">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="row justify-content-center">
                                <div class="form-group form-group col-xs-12 col-sm-4 col-sm-offset-4">
                                    <label for="InputFile">{{trans('icda::vehicles.bulkload.Select File')}}</label>
                                    <input type="file"
                                           id="InputFile"
                                           name="importfile"
                                           accept=".csv,.xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                           style="margin: auto">
                                    <p class="help-block">{{trans('icda::vehicles.bulkload.Select Filecompatible files CSV, XLSX')}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">{{trans('icda::vehicles.bulkload.Submit')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
