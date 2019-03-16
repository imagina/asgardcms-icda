<div class="box-body row">

  <div class="col-xs-12 col-sm-4">

    <div class="panel panel-default">

      <div class="panel-heading">
        <i style="margin-right: 5px;" class="fa fa-shopping-cart" aria-hidden="true"></i>
        {{trans('icda::inspections.table.inspection details')}}
      </div>

      <ul class="list-group">
        <li class="list-group-item">{{$inspections->created_at}}</li>
        <li class="list-group-item">{{$inspections->inspectionType->name}}</li>
      </ul>

    </div>

  </div>

  <div class="col-xs-12 col-sm-4">

    <div class="panel panel-default">

      <div class="panel-heading">
        <i style="margin-right: 5px;" class="fa fa-user" aria-hidden="true"></i>
        {{trans('icda::inspections.table.inspector data')}}
      </div>

      <ul class="list-group">
        <li class="list-group-item">{{$inspections->inspector->first_name}} {{$inspections->inspector->last_name}}</li>
        <li class="list-group-item">{{$inspections->inspector->email}}</li>
      </ul>

    </div>

  </div>
  <div class="col-xs-12 col-sm-4">

    <div class="panel panel-default">

      <div class="panel-heading">
        <i style="margin-right: 5px;" class="fa fa-user" aria-hidden="true"></i>
        {{trans('icda::inspections.table.data owner vehicle')}}
      </div>

      <ul class="list-group">
        <li class="list-group-item">{{$inspections->vehicle->user->first_name}} {{$inspections->vehicle->user->last_name}}</li>
        <li class="list-group-item">{{$inspections->vehicle->user->email}}</li>
      </ul>

    </div>

  </div>

  <div id="orderC" class="col-xs-12">
    <div class="panel panel-default">

      <div class="panel-heading">
        <i style="margin-right: 5px;" class="fa fa-book" aria-hidden="true"></i>
        {{trans('icda::inspections.title.inspection')}}
        #{{$inspections->id}}
      </div>

      <div class="panel-body">
        <div class="col-md-4 form-group">
          <label for="{{ trans('icda::inspections.table.vehicle type') }}">{{ trans('icda::inspections.table.vehicle type') }}:</label>
          <input type="text" class="form-control" id="vehicleType" value="{{$inspections->type_vehicle}}" readonly>
        </div>
        <div class="col-md-4 form-group">
          <label for="{{ trans('icda::inspections.table.teaching vehicle') }}">{{ trans('icda::inspections.table.teaching vehicle') }}:</label>
          <input type="text" class="form-control" id="teachingVehicle" value="@if($inspections->type_vehicle==1){{trans('icda::inspections.form.yes')}}@else{{trans('icda::inspections.form.no')}}@endif" readonly>
        </div>
        <div class="col-md-4 form-group">
          <label for="{{ trans('icda::inspections.table.mileage') }}">{{ trans('icda::inspections.table.mileage') }}:</label>
          <input type="text" class="form-control" id="mileage" value="{{$inspections->mileage}}" readonly>
        </div>
        @if($inspections->exhosto_diameter)
        <div class="col-md-4 form-group">
          <label for="{{ trans('icda::inspections.table.exhosto diameter') }}">{{ trans('icda::inspections.table.exhosto diameter') }}:</label>
          <input type="text" class="form-control" id="exhostoDiameter" value="{{$inspections->exhosto_diameter}}" readonly>
        </div>
        @endif
        @if($inspections->engine_cylinders)
        <div class="col-md-4 form-group" >
          <label for="{{ trans('icda::inspections.table.engine cylinders') }}">{{ trans('icda::inspections.table.engine cylinders') }}:</label>
          <input type="text" class="form-control" id="engineCylinders" value="{{$inspections->engine_cylinders}}" readonly>
        </div>
        @endif
        @if($inspections->governor)
        <div class="col-md-4 form-group" >
          <label for="{{ trans('icda::inspections.table.governor') }}">{{ trans('icda::inspections.table.governor') }}:</label>
          <input type="text" class="form-control" id="governor" value="@if($inspections->governor==1){{trans('icda::inspections.form.yes')}}@else{{trans('icda::inspections.form.no')}}@endif" readonly>
        </div>
        @endif
        @if($inspections->taximeter)
        <div class="col-md-4 form-group" >
          <label for="{{ trans('icda::inspections.table.taximeter') }}">{{ trans('icda::inspections.table.taximeter') }}:</label>
          <input type="text" class="form-control" id="taximeter" value="@if($inspections->taximeter==1){{trans('icda::inspections.form.yes')}}@else{{trans('icda::inspections.form.no')}}@endif" readonly>
        </div>
        @endif
        @if($inspections->gas_certificate)
        <div class="col-md-4 form-group gasCerficate">
          <label for="{{ trans('icda::inspections.table.gas certificate') }}">{{ trans('icda::inspections.table.gas certificate') }}:</label>
          <input type="text" class="form-control" id="gasCerficate" value="{{$inspections->gas_certificate}}" readonly>
        </div>
        <div class="col-md-4 form-group gasCerficate">
          <label for="{{ trans('icda::inspections.table.gas certifier') }}">{{ trans('icda::inspections.table.gas certifier') }}:</label>
          <input type="text" class="form-control" id="gasCertifier" value="{{$inspections->gas_certifier}}" readonly>
        </div>
        <div class="col-md-4 form-group gasCerficate">
          <label for="{{ trans('icda::inspections.table.gas certificate expiration') }}">{{ trans('icda::inspections.table.gas certificate expiration') }}:</label>
          <input type="text" class="form-control" id="gasCertificateExpiration" value="{{$inspections->gas_certificate_expiration}}" readonly>
        </div>
        @endif
        @if($inspections->polarized_glasses)
        <div class="col-md-4 form-group" id="polarizedGlassesContainer">
          <label for="{{ trans('icda::inspections.table.polarized glasses') }}">{{ trans('icda::inspections.table.polarized glasses') }}:</label>
          <input type="text" class="form-control" id="polarizedGlasses" value="@if($inspections->polarized_glasses==1){{trans('icda::inspections.form.yes')}}@else{{trans('icda::inspections.form.no')}}@endif" readonly>
        </div>
        @endif
        @if($inspections->armored_vehicle)
        <div class="col-md-4 form-group" id="armoredVehicleContainer">
          <label for="{{ trans('icda::inspections.table.armored vehicle') }}">{{ trans('icda::inspections.table.armored vehicle') }}:</label>
          <input type="text" class="form-control" id="armoredVehicle" value="@if($inspections->armored_vehicle==1){{trans('icda::inspections.form.yes')}}@else{{trans('icda::inspections.form.no')}}@endif" readonly>
        </div>
        @endif
        @if($inspections->modified_engine)
        <div class="col-md-4 form-group" id="modifiedEngineContainer">
          <label for="{{ trans('icda::inspections.table.modified engine') }}">{{ trans('icda::inspections.table.modified engine') }}:</label>
          <input type="text" class="form-control" id="modifiedEngine" value="@if($inspections->modified_engine==1){{trans('icda::inspections.form.yes')}}@else{{trans('icda::inspections.form.no')}}@endif" readonly>
        </div>
        @endif
        @if($inspections->spare_tires)
        <div class="col-md-4 form-group" id="spareTiresContainer">
          <label for="{{ trans('icda::inspections.table.spare tires') }}">{{ trans('icda::inspections.table.spare tires') }}:</label>
          <input type="text" class="form-control" id="spareTires" value="@if($inspections->spare_tires==1){{trans('icda::inspections.form.yes')}}@else{{trans('icda::inspections.form.no')}}@endif" readonly>
        </div>
        @endif
        <div class="col-md-12 text-center">
          <hr>
          <h4>{{trans('icda::inspections.table.pre inspection')}}</h4>
          <div class="col-md-12" id="preInspections">
            @foreach($inspections->pre_inspections as $pre_inspection)
              <div class='col-md-4'>
                <label >{{$pre_inspection['name']}}:</label>
                @if($pre_inspection['value']==1)
                  <input type="text" class="form-control" value="{{trans('icda::inspections.form.yes')}}" readonly>
                @else
                  <input type="text" class="form-control" value="{{trans('icda::inspections.form.no')}}" readonly>
                @endif
              </div>
            @endforeach
          </div>
        </div>

        <div class="col-md-12 text-center">
          <hr>
          <h4>
            <strong>
              {{trans('icda::inspections.table.axes')}}
            </strong>
          </h4>
          <div class="col-md-1 align-content-center">
            <strong>{{trans('icda::inspections.table.tires')}}</strong>
          </div>
          <div class="col-md-11" id="axes">
            @foreach($inspections->axes as $axe)
              <div class='col-md-11'>
                <h5>{{trans('icda::inspections.table.axe')}} {{$loop->iteration}}</h5><br>
                <div class='col-md-3'>
                  <strong>{{trans('icda::inspections.table.side')}}:</strong><br>
                  <strong>{{trans('icda::inspections.table.pressure init')}}:</strong><br>
                  <strong>{{trans('icda::inspections.table.adjust')}}:</strong><br>
                </div>
                @foreach($axe as $ax)
                  <div class='col-md-2'>
                    <label >{{$ax['type']}}</label>
                    <input type="text" class="form-control" value="{{$ax['pressure_init']}}" readonly>
                    <input type="text" class="form-control" value="{{$ax['adjustment']}}" readonly>
                  </div>
                @endforeach
              </div>
            @endforeach
          </div>
        </div>

        {{--Inventory--}}
        <div class="col-md-12 text-center">
          <hr>
          <h4 >
            <strong>
              {{trans('icda::inspections.table.inventory')}}
            </strong>
          </h4>
          <div class="table-responsive text-justify">
            <table class="table table-bordered table-hover" id="tableInventory">
              <thead>
                <th>Item</th>
                <th>{{trans('icda::inspections.table.evaluation')}}</th>
                <th>{{trans('icda::inspections.table.quantity')}}</th>
              </thead>
              <tbody>
                @foreach($inspections->itemsInventory as $item)
                <tr>
                  <td>{{$item->inventory->name}}</td>
                  <td>{{$item->evaluation}}</td>
                  <td>{{$item->quantity}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        {{--Observations--}}
        @if($inspections->observations)
        <div class="col-md-12 text-center" id="observationsContainer">
          <hr>
          <h4>{{trans('icda::inspections.table.observations')}}</h4>
          <textarea class="form-control" id="observations" rows="8" cols="80" style="max-width:auto;">
            {{$inspections->observations}}
          </textarea>
        </div>
        @endif
        {{--Vehicle prepared--}}
        <div class="col-md-12 text-center">
          <hr>
          <div class="col-md-2">
            <label>{{trans('icda::inspections.table.vehicle prepared')}}</label>
            <input type="text" class="form-control" id="vehiclePrepared" value="@if($inspections->vehicle_prepared==1){{trans('icda::inspections.form.yes')}}@else{{trans('icda::inspections.form.no')}}@endif" readonly>
          </div>
          <div class="col-md-10">
            <label>{{trans('icda::inspections.table.signature certificate vehicle')}}</label>
            <img id="vehicleDeliverySignature" value="{{$inspections->vehicle_delivery_signature}}" class="img-responsive img-fluid">
          </div>
          @if($inspections->seen_technical_director)
          <div class="col-md-2" style="display:none;" id="seenTechnicalDirectorContainer">
            <label>{{trans('icda::inspections.table.seen good director')}}</label>
            <input type="text" class="form-control" value="{{$inspections->seen_technical_director}}" id="seenTechnicalDirector" readonly>
          </div>
          @endif
          @if($inspections->signature_received_report)
          <div class="col-md-10" style="display:none;" id="signatureReceivedReportContainer">
            <label>{{trans('icda::inspections.table.signature cedula received report')}}</label>
            <img id="signatureReceivedReport" value="{{$inspections->signature_received_report}}" class="img-responsive img-fluid">
          </div>
          @endif
        </div>
      </div> <!-- panel body -->

    </div>
  </div> <!-- inspection container -->

  <!-- history -->
  @include('icda::admin.inspections.partials.history')


</div>
