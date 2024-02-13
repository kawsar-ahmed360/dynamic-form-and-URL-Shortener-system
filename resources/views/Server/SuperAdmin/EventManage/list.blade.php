@extends('Server.SuperAdmin.master')
@section('title') Event Category List @endsection
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
    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10" style="margin-bottom: 40px;">Event Category List <a href="{{ route('CreateEvent') }}" class="pull-right btn btn-outline-primary btn-sm mg-b-10">Create Event Category</a></h6>
    <div class="table-wrapper">
        <div id="datatable1_wrapper" style="overflow-x:auto;">
         
            
            <table id="example" class="table display table-responsive nowrap dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable1_info" style="width: 942px;">
                <thead>
                    <tr role="row">
                      
                        <th class="wd-15p sorting_asc" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 115px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">Sl</th>
                        <th class="wd-15p sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 115px;" aria-label="Last name: activate to sort column ascending">Event Category Name</th>
                        <th class="wd-20p sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 174px;" aria-label="Position: activate to sort column ascending">Short</th>
                        <th class="wd-25p sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 209px;" aria-label="E-mail: activate to sort column ascending">Dynamic Form</th>
                        <th class="wd-25p sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 209px;" aria-label="E-mail: activate to sort column ascending">Active</th>
                  
                    </tr>
                </thead>
                <tbody>
                   
                   @foreach(@$list as $key => $value)
                       
                 
                    <tr role="row" class="odd" @if(@$value->status==2) style="background:#c3ffbf" @endif>
                        <td tabindex="0" class="sorting_1">{{ @$key+1 }}</td>
                        <td>{{ $value->event_name }}</td>
                        <td>{{ @$value->short }}</td>
                   
                        <td><span class="badge badge-secondary">{{ @$value->dynamic_table }}</span></td>
                        <td>
                           <a href="{{route('EditEvent',@$value->id)}}" class="btn btn-outline-info btn-sm m_hov"><i id="hov" class="fa fa-edit"></i></a>
                           @if(@$value->status==2)
                           <a  href="#"  class="btn btn-outline-danger btn-sm m_hov"><i id="hov" class="fa fa-trash"></i></a>
                           @else
                           <a id="delete" href="{{route('DeleteEvent',@$value->id)}}" class="btn btn-outline-danger btn-sm m_hov"><i id="hov" class="fa fa-trash"></i></a>
                         
                           @endif

                           @if(@$value->status==1)
                           <a id="active" href="{{route('ActiveEvent',@$value->id)}}" class="btn btn-outline-success btn-sm m_hov"><i id="hov" class="fa fa-check"></i></a>
                           @elseif(@$value->status==2)
                           <a  href="{{route('DeactiveEvent',@$value->id)}}" class="btn btn-outline-danger btn-sm m_hov"><i id="hov" class="fa fa-times"></i></a>
                           @endif

                           @if(@$value->dynamic_table=='yes')
                           <a href="{{route('DynamicFormEvent',@$value->id)}}" class="btn btn-outline-warning btn-sm m_hov"><i id="hov" class="fa fa-list-alt"></i></a>
                           @endif


                       
                        </td>
                    </tr>

                      @endforeach
                  
                </tbody>
            </table>
           
        </div>
    </div>
</div>


@endsection