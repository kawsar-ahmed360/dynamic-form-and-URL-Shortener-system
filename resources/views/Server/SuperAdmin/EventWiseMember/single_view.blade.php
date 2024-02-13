@extends('Server.SuperAdmin.master')
@section('title') Event Wise Single View @endsection
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
    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10" style="margin-bottom: 40px;">{{@$event->event_name}} Event Single Member View </h6>
    <div class="table-wrapper">
        <div id="datatable1_wrapper" >


            <!---------User Information-------->
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10" style="margin-top: 27px;">User Information: </h6>
            <table class="table table-bordered" style="border:1px solid silver">
              <thead>
              <tr>
                  <th>Name</th>
                  <td>{{@$user_info->name}}</td>
              </tr>   
              <tr>
                  <th>Email</th>
                  <td>{{@$user_info->email}}</td>
              </tr>         
              <tr>
                  <th>Phone Number</th>
                  <td>{{@$user_info->phone}}</td>
              </tr>
              <tr>
                  <th>Institute</th>
                  <td>{{@$user_info->institute}}</td>
              </tr>       
              </thead>
            </table>
         


            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10" style="margin-top: 27px;">Event Basic Information: </h6>
            <table id="" class="table table-bordered" role="grid" aria-describedby="datatable1_info" style="width: 942px;border:1px solid silver;">
                <thead>


                <!-- <tr>
                    @foreach($filteredArray as $column)
                    <th>{{ str_replace('_',' ',$column) }}</th>
                    @endforeach
                </tr> -->

                @foreach($filteredArray as $column)  
                   <tr>
                    <th>{{ str_replace('_',' ',$column) }}</th>

                    <td>{{ $single_list->$column }}</td>
                    </tr>
                @endforeach
        
              
              </thead>
                <tbody>        
                <!-- <tr>
                @foreach($filteredArray as $column)
              

                <td>{{ $single_list->$column }}</td>
                @endforeach
                </tr> -->
                  
                </tbody>
            </table>






            <!---------User Information-------->
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10" style="margin-top: 27px;">Status: </h6>
            <table class="table table-bordered" style="border:1px solid silver">
              <thead>
                      
              <tr>
                  <th>Status</th>
                  <td>
                      @if($single_list->admin_status==1)
                         <span class="badge badge-danger">Pending</span>
                      @elseif($single_list->admin_status==2)
                      <span class="badge badge-success">Approved</span>
                      @endif
                  </td>
              </tr>
                  
              </thead>
            </table>



                        <!---------User Information-------->
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10" style="margin-top: 27px;">Other Information: </h6>
            <table class="table table-bordered" style="border:1px solid silver">
              <thead >
             
             
             
            
                 @foreach($newArray as $column)

                  
                     @php
                     $ex = explode("_",@$column);
                    
                     @endphp

                    

                
                    <tr>
                    

                    @if(@$ex[0]=='RadioGroupWithAmount')
                    
                    <th>{{ substr(str_replace('_',' ',$column), 20) }}</th>

                   
                    @endif


                    
                    @if(@$ex[0]=='RadioGroupOnly')
                    
                    <th>{{ substr(str_replace('_',' ',$column), 14) }}</th>

                    @endif


                    @if(@$ex[0]=='RadioGroupYesNo')

                    @php

                      
                        $first_remove = substr(str_replace('_',' ',$column), 15);
                        $last_26_charecter_get = substr(@$first_remove, -25)

                       
                    @endphp




                    @if(@$last_26_charecter_get=='radio group yes no number')
                    <th>How Many {{ substr($first_remove, 0, strlen($first_remove) - 25) }} will there be?</th>
                    @elseif(@$last_26_charecter_get!='radio group yes no number')
                    <th>{{$first_remove}} </th>
                    @endif
                    
                    

                   
                   
                    

              

                  

                    @endif




                    @if(@$ex[0]=='RadioGroupWithAmount')

                    @php
                        $group_with_amount = App\Models\RadioGroupWithAmount::where('id',@$single_list->$column)->first();
                    @endphp

                    <td>{{@$group_with_amount->radio_field_name}} </td>

                    @endif

                    

                    @if(@$ex[0]=='RadioGroupOnly')
      

                    <td>{{@$single_list->$column}}</td>

                    @endif



                    @if(@$ex[0]=='RadioGroupYesNo')

                    @php
                        $group_yes_no = App\Models\RadioGroupYesNo::where('id',@$single_list->$column)->first();
                   
                       $last_three = substr(@$single_list->$column, -3);
                       $last_two = substr(@$single_list->$column, -2);
                   
                    @endphp

                    <td>
                        

                    @if(@$last_three=='yes')
                   
                      Yes 

                      @elseif(@$last_two=='no')
                      No
                      @else
                      {{@$group_yes_no->person_no}}  ({{@$group_yes_no->person_amount??0}} Tk)
                      @endif

                    </td>

                    

                  
                  


                    @endif

                  
                    
                    

                   


                
                   
                </tr>
                @endforeach 
               
                   
            
                  
              </thead>
            </table>

            {{-- <a href="{{route('SingleEventApprovedMember',[@$single_list->id,@$single_list->event_id])}}" class="btn btn-outline-info pull-right">Approved</a> --}}
           
        </div>
    </div>
</div>


@endsection