<div id="orderHistory" class="col-xs-12" >
  <div class="panel panel-default">

    <div class="panel-heading">{{trans('icda::inspections.table.inspection history')}}</div>

    <div class="panel-body">

      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#history">{{trans('icda::inspections.table.history')}}</a></li>
      </ul>

      <div class="tab-content">

        <div id="history" class="tab-pane fade in active">

          <table id="infor-history" class="table table-bordered">
            <th>{{ trans('core::core.table.created at') }}</th>
            <th>{{trans('icda::inspections.table.comment')}}</th>
            <th>{{trans('icda::inspections.table.status')}}</th>
            <!-- <th>{{trans('icommerce::orders.table.customer notified')}}</th> -->



            @foreach ($inspections->inspectionHistory as $history)

            <tr>
              <td>
                {{$history->created_at}}</td>
                <td>{{$history->comment}}</td>
                <td>
                  @foreach ($inspectionStatus->lists() as $index => $orsta)
                  @if($index == $history->status)
                  {{$orsta}}
                  @endif
                  @endforeach
                </td>
{{--                <td>
                  @if ($history->notify==0)
                  {{trans('icda::inspections.form.no')}}
                  @else
                  {{trans('icda::inspections.form.yes')}}
                  @endif
                </td>--}}
              </tr>
              @endforeach
            </table>
            <br>
            <h4>{{trans('icda::inspections.table.add inspection history')}}</h4>
            <hr>

            <div class="form-group row">

              <label for="status" class="col-sm-2 text-right">{{trans('icda::inspections.table.status')}}</label>
              <div class="col-sm-10">
                <select class="form-control" id="newstatus" name="newstatus">
                  @foreach ($inspectionStatus->lists() as $index => $ts)
                  <option value="{{$index}}" @if($index==$inspections->inspection_status) selected @endif >{{$ts}}</option>
                  @endforeach
                </select>
              </div>

            </div>
{{--
            <div class="form-group row">

              <label for="notified" class="col-sm-2 text-right">{{trans('icda::inspections.table.customer notify')}}</label>
              <div class="col-sm-10">
                <select class="form-control" id="notified" name="notified">
                  <option value="0" selected>NO</option>
                  <option value="1">{{trans('icda::inspections.form.yes')}}</option>
                </select>
              </div>

            </div>
--}}
            <div class="form-group row">

              <label for="comment" class="col-sm-2 text-right">{{trans('icda::inspections.table.comment')}}</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="5" id="comment"></textarea>
              </div>

            </div>

            <div class="row">
              <div class="col-xs-12">
                <button id="addhistory" type="button" class="btn btn-primary pull-right" data-loading-text="Loading...">{{trans('icda::inspections.button.add history')}}</button>
              </div>
            </div>

          </div>

</div>

</div>

</div>
</div>

@push('js-stack')

<script type="text/javascript">

$(function(){

  $('#addhistory').on('click', function() {
    var token = $('meta[name="token"]').attr('value');
    var url = '{{route('api.icda.inspectionHistory.create')}}';
    var inspectionId = {{$inspections->id}};
    var newStatus = $("#newstatus").val();// Select
    //var notify = $("#notified").val();// Select
    var comment = $("#comment").val();
    var newStatusText = $("#newstatus option:selected").text();
    var notifyText = $("#notified option:selected").text();

    $.ajax({
      type: "POST",
      url: url,
      dataType: "JSON",
      data:{inspections_id:inspectionId,status:newStatus,comment:comment,newStatusText:newStatusText},
      headers: {'X-CSRF-TOKEN': token},

      beforeSend: function(){
        $("#addhistory").button('loading');
      },

      success: function(data) {
        var date = " --- ";
        var newRow = $("<tr>");
        var cols = "";
        cols += '<td>'+data.data.created_at+'</td>';
        cols += '<td>'+comment+'</td>';
        cols += '<td>'+newStatusText+'</td>';
        //cols += '<td>'+notifyText+'</td> ';
        newRow.append(cols);
        $("#infor-history").append(newRow);
        $("#addhistory").button('reset');
        $("#comment").val("");
      },
      error: function(data)
      {
        $("#addhistory").button('reset');
        alert("{{trans('icda::inspections.messages.error add history')}}")

      }
    })

  });

});

</script>

@endpush
