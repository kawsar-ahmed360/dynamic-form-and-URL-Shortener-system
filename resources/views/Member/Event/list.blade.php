@extends('Member.master')
@section('title') All  List @endsection
@section('content')


    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">All Event Category List</a></li>
        </ol>
    </div>
    <!-- row -->

    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Event Category List Datatable 
                     
                </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display min-w850">
                            <thead>
                            <tr>
                               
                                <th>Sl</th>

                                <th>Event Category Name</th>
                               

                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                          
                            @foreach(@$avaiable_event as $key => $value)

                            @php
                            $modal_find = $value->event_table_name;
                            $ModalGenerate = str_replace('_','',$modal_find);

                            $columns = ['id','user_id','admin_status'];
                            $EvemtMemberApprovedListCount = app("App\\Models\\$ModalGenerate")::select($columns)->where('admin_status','2')
                                                       ->where('user_id',Auth::user()->id)->count();
                                                       
                            @endphp


                             @if($EvemtMemberApprovedListCount!=0)
                           
                            <tr>
                          
                                <td>{{ @$key+1 }}</td>

                                <td>{{ $value->event_name }}</td>
               
                               

                                <td>
                                    <div class="d-flex">

                                        <a href="{{route('MyEventListView',@$value->id)}}"  class="btn btn-success shadow btn-xs sharp"><i class="fa fa-eye"></i></a>

                                    </div>
                                </td>
                            </tr>

                            @else

                            @endif

                         

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