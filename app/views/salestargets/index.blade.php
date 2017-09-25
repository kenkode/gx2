<?php


function asMoney($value) {
  return number_format($value, 2);
}

?>
@extends('layouts.erp')
@section('content')

<br><div class="row">
	<div class="col-lg-12">
  <h4>Targets</h4>

<hr>
</div>	
</div>


<div class="row">
	<div class="col-lg-12">
   
    @if (Session::has('flash_message'))

      <div class="alert alert-success">
      {{ Session::get('flash_message') }}
     </div>
    @endif

    @if (Session::has('delete_message'))

      <div class="alert alert-danger">
      {{ Session::get('delete_message') }}
     </div>
    @endif
    
    <div class="panel panel-default">
      <div class="panel-heading">
          <a class="btn btn-info btn-sm" href="{{ URL::to('salestargets/create')}}">new target</a>
        </div>
        <div class="panel-body">


    <table id="users" class="table table-condensed table-bordered table-responsive table-hover">


      <thead>

        <th>#</th>
        <th>Month</th>
        <th>Target Amount</th>
        <th>Date</th>
        <th></th>

      </thead>
      <tbody>

        <?php $i = 1; ?>
        @foreach($salestargets as $salestarget)

        <tr>

          <td> {{ $i }}</td>
          <td>{{$salestarget->month }}</td>
          <td>{{asMoney($salestarget->target_amount) }}</td>
          <td>{{ date("d-M-Y",strtotime($salestarget->target_date)) }}</td>          
          <td>

                  <div class="btn-group">
                  <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Action <span class="caret"></span>
                  </button>
          
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{URL::to('salestargets/edit/'.$salestarget->id)}}">Update</a></li>
                   
                    <li><a href="{{URL::to('salestargets/delete/'.$salestarget->id)}}"  onclick="return (confirm('Are you sure you want to Remove this Target?'))">Delete</a></li>
                    
                  </ul>
              </div>

                    </td>



        </tr>

        <?php $i++; ?>
        @endforeach


      </tbody>


    </table>
  </div>


  </div>

</div>

@stop