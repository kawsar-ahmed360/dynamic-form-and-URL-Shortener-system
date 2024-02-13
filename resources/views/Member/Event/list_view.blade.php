@extends('Member.master')
@section('title') All Event List List @endsection
@section('content')


    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">All {{@$event->event_name}} List</a></li>
        </ol>
    </div>
    <!-- row -->

    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{@$event->event_name}} List Datatable 
                     
                </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display min-w850">
                            <thead>
                            <tr>
                               
                                <th>Sl</th>

                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                             

                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach(@$EvemtMemberList as $key => $value)

@php

$user = App\Models\User::where('id',$value->user_id)->first();

@endphp
    

 <tr role="row" class="odd">
     <td tabindex="0" class="sorting_1">{{$key+1}}</td>
     <td>{{$user->name}}</td>
     <td>{{$user->email}}</td>
     <td>
       @if(@$value->admin_status==1)
       <span class="badge badge-warning badge-sm">Pending</span>
       @elseif(@$value->admin_status==2)
       <span class="badge badge-success badge-sm">Approved</span>
       @endif
     </td>
     <td>

     
        <a  href="{{route('MyEventSingleListItemView',[@$event->id,@$value->id])}}" class="btn btn-outline-success btn-sm m_hov"><i id="hov" class="fa fa-eye"></i></a>
    

     </td>
   
 </tr>

   @endforeach

                           


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



@section('footer')

@endsection

    @endsection