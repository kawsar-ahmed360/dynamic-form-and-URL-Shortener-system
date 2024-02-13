@extends('Server.SuperAdmin.master')
@section('title') Event Wise Member List @endsection
@section('content')


<style>
    .m_hov:hover #hov{
        color:white;
      
    }

    .m_hov{
        cursor: pointer;
    }

    .badge{
        font-size:86% !important;
    }
</style>

<div class="br-section-wrapper">
    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10" style="margin-bottom: 40px;">{{@$event->event_name}} Event Member List </h6>
    <div class="table-wrapper">
        <div id="datatable1_wrapper" >
         
            
            <table id="example" class="table display responsive nowrap dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable1_info" style="width: 942px;">
                <thead>
                    <tr role="row">
                      
                        <th class="wd-15p sorting_asc" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 115px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">Sl</th>
                        <th class="wd-15p sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 115px;" aria-label="Last name: activate to sort column ascending">Name</th>
                        <th class="wd-20p sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 174px;" aria-label="Position: activate to sort column ascending">Email</th>
                        <th class="wd-10p sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 70px;" aria-label="Salary: activate to sort column ascending">Status</th>
                        <th class="wd-25p sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 209px;" aria-label="E-mail: activate to sort column ascending">Active</th>
                  
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
                          <span class="badge badge-warning">Pending</span>
                          @elseif(@$value->admin_status==2)
                          <span class="badge badge-success">Approved</span>
                          @endif
                        </td>
                        <td>

                        <a href="#" class="btn btn-outline-info btn-sm m_hov"><i id="hov" class="fa fa-edit"></i></a>
                           <a id="delete" href="#" class="btn btn-outline-danger btn-sm m_hov"><i id="hov" class="fa fa-trash"></i></a>
                           <a  href="{{route('SingleEventMemberInfo',[@$event->id,@$value->id])}}" class="btn btn-outline-success btn-sm m_hov"><i id="hov" class="fa fa-eye"></i></a>
                       

                        </td>
                      
                    </tr>

                      @endforeach
                  
                </tbody>
            </table>
           
        </div>
    </div>
</div>


@endsection