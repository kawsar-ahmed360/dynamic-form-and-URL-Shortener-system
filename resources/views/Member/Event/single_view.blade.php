@extends('Member.master')
@section('title') Single View @endsection
@section('content')


    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{@$event->event_name}} Event Single Member View </a></li>
        </ol>
    </div>
    <!-- row -->

    <div class="row">

<div class="col-12">

    <div class="card">
        
       <div class="card-header">
        

             <div class="col-md-12">
              <p style="    font-weight: bold;
    font-size: 18px;
    font-family: 'Poppins';
    font-family: 'Roboto';">Basic Information:</p>
             <table class="table table-bordered  responsive  nowrap no-footer dtr-inline">
            <thead>
            <tr>
                    @foreach($filteredArray as $column)
                    <th>{{ ucwords(str_replace('_', ' ', $column)) }}</th>
                    @endforeach
                </tr>
            </thead>

            <tbody>
            <tr>
                @foreach($filteredArray as $column)
                <!-- <th>{{ str_replace('_',' ',$column) }}</th> -->

                <td>{{ $single_list->$column }}</td>
                @endforeach
                </tr>
            </tbody>
        </table>



        
        <p style="    font-weight: bold;
    font-size: 18px;
    font-family: 'Poppins';
    font-family: 'Roboto';">User Information:</p>

<table class="table table-bordered table-active">
              <thead>
              <tr>
                  <th>Name</th>
                  <td>{{@$user_info->name}}</td>
              </tr>   
              <tr>
                  <th>Email</th>
                  <td>{{@$user_info->email}}</td>
              </tr>         
                 
              </thead>
            </table>




             
        <p style="    font-weight: bold;
    font-size: 18px;
    font-family: 'Poppins';
    font-family: 'Roboto';">Status:</p>

<table class="table table-bordered table-active">
              <thead>
                  
              <tr>
                  <th>Status</th>
                  <td>
                      @if($single_list->admin_status==1)
                         <span class="badge badge-danger badge-sm">Pending</span>
                      @elseif($single_list->admin_status==2)
                      <span class="badge badge-success badge-sm">Approved</span>
                      @endif
                  </td>
              </tr>
                  
              </thead>
            </table>


                         
        <p style="    font-weight: bold;
    font-size: 18px;
    font-family: 'Poppins';
    font-family: 'Roboto';">Other Information:</p>

<table class="table table-bordered table-active">
              <thead>
             
             
             
            
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
                    <th>{{ substr($first_remove, 0, strlen($first_remove) - 25) }} Child</th>
                    @elseif(@$last_26_charecter_get!='radio group yes no number')
                    <th>{{$first_remove}} </th>
                    @endif
                    
                    

                   
                   
                    

              

                  

                    @endif




                    @if(@$ex[0]=='RadioGroupWithAmount')

                    @php
                        $group_with_amount = App\Models\RadioGroupWithAmount::where('id',@$single_list->$column)->first();
                    @endphp

                    <td>{{@$group_with_amount->radio_field_name}}</td>

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

             </div>


             



        </div>

      
    </div>
   </div>
</div>





    @endsection