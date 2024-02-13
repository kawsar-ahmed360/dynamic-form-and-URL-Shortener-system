@extends('Server.SuperAdmin.master')
@section('title') Event Wise Dynamic Field Create @endsection
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

 <div class="row">
   <div class="col-md-12">
   <form action="{{route('DynamicTableGenerate')}}" method="post">
     @csrf

     <input type="hidden" name="event_id" value="{{@$event_name->id}}">

      <img style="width: 25px;
    margin-bottom: 19px;" src="{{asset('laravel.svg')}}" alt="">
       @if(@$event_name->status==2)
     <button style="margin-bottom:20px" type="button" disabled  class="btn btn-info btn-sm">Migration And Model Generate</button>
    
     @else
     <button style="margin-bottom:20px" type="submit" class="btn btn-info btn-sm">Migration And Model Generate</button>
   

   @endif
    </form>

   </div>
   <div class="col-md-12">
   <form action="{{route('DynamicMysqliTableGenerate')}}" method="post">
     @csrf

     <input type="hidden" name="event_id" value="{{@$event_name->id}}">
       @if(@$event_name->status==2)
     <button style="margin-bottom:20px;    margin-left: 26px;" type="button" disabled class="btn btn-warning btn-sm"> <i class="fa fa-database"></i> Mysqli Table Generate</button>
     @else
     <button style="margin-bottom:20px;    margin-left: 26px;" type="submit"  class="btn btn-warning btn-sm"> <i class="fa fa-database"></i> Mysqli Table Generate</button>
      @endif
    </form>
   </div>
 </div>


 @if(@$event_name->status==2)
 <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10" style="margin-bottom: 40px;">{{@$event_name->event_name}} Event Dynamic Field List <a disabled class="pull-right btn btn-outline-primary btn-sm mg-b-10">Field Create</a></h6>
 @else
    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10" style="margin-bottom: 40px;">{{@$event_name->event_name}} Event Dynamic Field List <a data-toggle="modal" data-target="#modaldemo1" class="pull-right btn btn-outline-primary btn-sm mg-b-10">Field Create</a></h6>
   @endif

   
    <div class="table-wrapper">
        <div id="datatable1_wrapper" >
         
            
            <table id="example" class="table display responsive nowrap dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable1_info" style="width: 942px;">
                <thead>
                    <tr role="row">
                      
                        <th class="wd-15p sorting_asc" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 115px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">Sl</th>
                        <th class="wd-15p sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 115px;" aria-label="Last name: activate to sort column ascending">Field Name</th>
                        <th class="wd-15p sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 115px;" aria-label="Last name: activate to sort column ascending">Status</th>
                        <th class="wd-15p sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 115px;" aria-label="Last name: activate to sort column ascending">Field Validation</th>

   
                        <th class="wd-25p sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 209px;" aria-label="E-mail: activate to sort column ascending">Sequence</th>
                        <th class="wd-25p sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 209px;" aria-label="E-mail: activate to sort column ascending">Action</th>
                  
                    </tr>
                </thead>
                <tbody>
                   
                   @foreach(@$dynamic_field as $key => $value)
                       
                 
                    <tr role="row" class="odd">
                        <td tabindex="0" class="sorting_1">{{ @$key+1 }}</td>
                        <td>{{ $value->field_name }}</td>
                       
                        <td>
                            @if(@$value->status=='Input')
                                <span class="badge badge-warning" > {{ @$value->status }}</span>
                            @elseif(@$value->status=='Radio Group With Amount')
                            <span class="badge badge-warning"> {{ @$value->status }}</span>
                            @elseif(@$value->status=='Radio Group WithOut Amount')
                            <span class="badge badge-warning" > {{ @$value->status }}</span>
                            @elseif(@$value->status=='DrowpDown Select Option')
                            <span class="badge badge-warning" > {{ @$value->status }}</span>
                            @elseif(@$value->status=='Radio Group Yes/No With Amount')
                            <span class="badge badge-warning" > {{ @$value->status }}</span>
                            @endif
                       
                    
                    
                       </td>

                       <td>
                          @if(@$value->required=='required')
                          <span class="badge badge-danger" > {{ @$value->required }}</span>
                          @else
                          <span class="badge badge-warning" > no</span>
                          @endif
                       </td>
                       
                       <td>
                          @if(@$value->sequence!=null)
                          <span class="badge badge-danger" > {{ @$value->sequence }}</span>
                          @else
                          <span class="badge badge-warning" > 0</span>
                          @endif
                       </td>


                        <!-- <td><span class="badge badge-secondary">{{ @$value->dynamic_table }}</span></td> -->
                       
                        @if(@$event_name->status==2)

                        <td>
                           
                           @if(@$value->status=='Radio Group With Amount')
                           <a disabled class="btn btn-outline-warning btn-sm m_hov"><i id="hov" class="fa fa-list-alt"></i></a>
                         
                           <a disabled class="btn btn-outline-info btn-sm m_hov"><i id="hov" class="fa fa-edit"></i></a>
                           <a disabled class="btn btn-outline-danger btn-sm m_hov"><i id="hov" class="fa fa-trash"></i></a>
                       
                           @elseif(@$value->status=='Radio Group WithOut Amount')

                           <a disabled class="btn btn-outline-warning btn-sm m_hov"><i id="hov" class="fa fa-list-alt"></i></a>
                         
                         <a disabled class="btn btn-outline-info btn-sm m_hov"><i id="hov" class="fa fa-edit"></i></a>
                         <a disabled class="btn btn-outline-danger btn-sm m_hov"><i id="hov" class="fa fa-trash"></i></a>
                     
                         @elseif(@$value->status=='Radio Group Yes/No With Amount')

                         
                         <a disabled class="btn btn-outline-warning btn-sm m_hov"><i id="hov" class="fa fa-list-alt"></i></a>
                         
                         <a disabled class="btn btn-outline-info btn-sm m_hov"><i id="hov" class="fa fa-edit"></i></a>
                         <a disabled class="btn btn-outline-danger btn-sm m_hov"><i id="hov" class="fa fa-trash"></i></a>
                     

                         @elseif(@$value->status=='DrowpDown Select Option')

                                                  
                         <a disabled class="btn btn-outline-warning btn-sm m_hov"><i id="hov" class="fa fa-list-alt"></i></a>
                         
                         <a disabled class="btn btn-outline-info btn-sm m_hov"><i id="hov" class="fa fa-edit"></i></a>
                         <a disabled class="btn btn-outline-danger btn-sm m_hov"><i id="hov" class="fa fa-trash"></i></a>
                     


                           @else
                          <a disabled class="btn btn-outline-info btn-sm m_hov"><i id="hov" class="fa fa-edit"></i></a>
                           <a disabled class="btn btn-outline-danger btn-sm m_hov"><i id="hov" class="fa fa-trash"></i></a>
                       
                           @endif
                       
                        </td>
                        
                        @else
                        <td>
                           
                           @if(@$value->status=='Radio Group With Amount')
                           <a href="{{route('DynamicFieldRadioGroupAmount',[@$value->id,@$event_name->id])}}" class="btn btn-outline-warning btn-sm m_hov"><i id="hov" class="fa fa-list-alt"></i></a>
                         
                           <a data-toggle="modal" data-target="#modaldemoedit{{@$value->id}}" class="btn btn-outline-info btn-sm m_hov"><i id="hov" class="fa fa-edit"></i></a>
                           <a id="delete" href="{{route('CreateEventWiseFieldDelete',@$value->id)}}" class="btn btn-outline-danger btn-sm m_hov"><i id="hov" class="fa fa-trash"></i></a>
                       
                           @elseif(@$value->status=='Radio Group WithOut Amount')

                           <a href="{{route('DynamicFieldRadioGroupOnly',[@$value->id,@$event_name->id])}}" class="btn btn-outline-warning btn-sm m_hov"><i id="hov" class="fa fa-list-alt"></i></a>
                         
                         <a data-toggle="modal" data-target="#modaldemoedit{{@$value->id}}" class="btn btn-outline-info btn-sm m_hov"><i id="hov" class="fa fa-edit"></i></a>
                         <a id="delete" href="{{route('CreateEventWiseFieldDelete',@$value->id)}}" class="btn btn-outline-danger btn-sm m_hov"><i id="hov" class="fa fa-trash"></i></a>
                     
                         @elseif(@$value->status=='Radio Group Yes/No With Amount')

                         
                         <a href="{{route('DynamicFieldRadioGroupYesNo',[@$value->id,@$event_name->id])}}" class="btn btn-outline-warning btn-sm m_hov"><i id="hov" class="fa fa-list-alt"></i></a>
                         
                         <a data-toggle="modal" data-target="#modaldemoedit{{@$value->id}}" class="btn btn-outline-info btn-sm m_hov"><i id="hov" class="fa fa-edit"></i></a>
                         <a id="delete" href="{{route('CreateEventWiseFieldDelete',@$value->id)}}" class="btn btn-outline-danger btn-sm m_hov"><i id="hov" class="fa fa-trash"></i></a>
                     

                         @elseif(@$value->status=='DrowpDown Select Option')

                                                  
                         <a href="{{route('DynamicFieldSelectOptionDrowpdown',[@$value->id,@$event_name->id])}}" class="btn btn-outline-warning btn-sm m_hov"><i id="hov" class="fa fa-list-alt"></i></a>
                         
                         <a data-toggle="modal" data-target="#modaldemoedit{{@$value->id}}" class="btn btn-outline-info btn-sm m_hov"><i id="hov" class="fa fa-edit"></i></a>
                         <a id="delete" href="{{route('CreateEventWiseFieldDelete',@$value->id)}}" class="btn btn-outline-danger btn-sm m_hov"><i id="hov" class="fa fa-trash"></i></a>
                     


                           @else
                          <a data-toggle="modal" data-target="#modaldemoedit{{@$value->id}}" class="btn btn-outline-info btn-sm m_hov"><i id="hov" class="fa fa-edit"></i></a>
                           <a id="delete" href="{{route('CreateEventWiseFieldDelete',@$value->id)}}" class="btn btn-outline-danger btn-sm m_hov"><i id="hov" class="fa fa-trash"></i></a>
                       
                           @endif
                       
                        </td>

                        @endif


                    </tr>
                    



                    
  <!-- BASIC MODAL -->
  <div id="modaldemoedit{{@$value->id}}" class="modal fade">
            <div class="modal-dialog modal-dialog-vertical-center" role="document">
              <div class="modal-content bd-0 tx-14" style="width:540px">
                <div class="modal-header pd-y-20 pd-x-25">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Field Edit</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pd-25">
                  
                <form action="{{route('CreateEventWiseFieldUpdate')}}" method="post">
                    @csrf

                  <input type="hidden" name="event_id" value="{{@$event_name->id}}">
                  <input type="hidden" name="edit_id" value="{{@$value->id}}">

                    <div class="row">
                       
                      <div class="col-md-12">
                            <label for="">Field Name</label>
                            <input class="form-control" type="text" name="field_name" value="{{@$value->field_name}}" placeholder="Enter Field Name">
                        </div>

                        <div class="col-md-12">
                            <label for="">Field Sequence</label>
                            <input class="form-control" type="number" name="sequence" value="{{@$value->sequence}}" placeholder="Enter Field Sequence">
                        </div>


                        

                <div class="col-md-12">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label" style="font-weight: bold;">Status: <span class="tx-danger">*</span></label>
                 

                  <label class="rdiobox">
                    <input type="radio" name="status" {{(@$value->status=='Input')?'checked':''}} value="Input">
                    <span>Input</span>
                    </label>

              

                    <label class="rdiobox">
                    <input type="radio" name="status" {{(@$value->status=='Radio Group WithOut Amount')?'checked':''}} value="Radio Group WithOut Amount">
                    <span>Radio Group</span>
                    </label>


                    <label class="rdiobox">
                    <input type="radio" name="status" {{(@$value->status=='DrowpDown Select Option')?'checked':''}} value="DrowpDown Select Option">
                    <span>DrowpDown Select Option</span>
                    </label>



                    <label class="rdiobox">
                    <input type="radio" name="status" {{(@$value->status=='Radio Group Yes/No With Amount')?'checked':''}} value="Radio Group Yes/No With Amount">
                    <span>Radio Group Yes/No</span>
                    </label>



                    @error('dynamic_table')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
              </div>



              
              <div class="col-md-12">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label" style="font-weight: bold;">Field Required: <span class="tx-danger">*</span></label>
                 

                  <label class="rdiobox">
                    <input type="radio" name="required" {{(@$value->required=='required')?'checked':''}} value="required">
                    <span>Yes</span>
                    </label>

                    <label class="rdiobox">
                    <input type="radio" name="required" {{(@$value->required=='')?'checked':''}} value="">
                    <span>No</span>
                    </label>

                  



                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
              </div>
            
            </div>





                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Save changes</button>
                  <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Close</button>
                </div>
                </form>
                
                </div>


               
              </div>
            </div><!-- modal-dialog -->
          </div><!-- modal -->


                      @endforeach
                  
                </tbody>
            </table>
           
        </div>
    </div>
</div>



  <!-- BASIC MODAL -->
  <div id="modaldemo1" class="modal fade">
            <div class="modal-dialog modal-dialog-vertical-center" role="document">
              <div class="modal-content bd-0 tx-14" style="width:540px">
                <div class="modal-header pd-y-20 pd-x-25">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Field Name</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pd-25">
                  
                <form action="{{route('CreateEventWiseFieldStore')}}" method="post">
                    @csrf

                  <input type="hidden" name="event_id" value="{{@$event_name->id}}">

                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Field Name</label>
                            <input class="form-control" type="text" name="field_name" placeholder="Enter Field Name">
                        </div>


                        <div class="col-md-12">
                            <label for="">Field Sequence</label>
                            <input class="form-control" type="number" name="sequence"  placeholder="Enter Field Sequence">
                        </div>



                <div class="col-md-12">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label" style="font-weight: bold;">Status: <span class="tx-danger">*</span></label>
                 

                  <label class="rdiobox">
                    <input type="radio" name="status" value="Input">
                    <span>Input</span>
                    </label>

                   

                    <label class="rdiobox">
                    <input type="radio" name="status" value="Radio Group WithOut Amount">
                    <span>Radio Group Amount</span>
                    </label>


                    <label class="rdiobox">
                    <input type="radio" name="status" value="DrowpDown Select Option">
                    <span>DrowpDown Select Option</span>
                    </label>



                    <label class="rdiobox">
                    <input type="radio" name="status" value="Radio Group Yes/No With Amount">
                    <span>Radio Group Yes/No</span>
                    </label>



                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
              </div>



              <div class="col-md-12">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label" style="font-weight: bold;">Field Required: <span class="tx-danger">*</span></label>
                 

                  <label class="rdiobox">
                    <input type="radio" name="required" value="required">
                    <span>Yes</span>
                    </label>

                    <label class="rdiobox">
                    <input type="radio" name="required" value="">
                    <span>No</span>
                    </label>

                  



                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
              </div>




              
            
            </div>





                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Save changes</button>
                  <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Close</button>
                </div>
                </form>
                
                </div>


               
              </div>
            </div><!-- modal-dialog -->
          </div><!-- modal -->


@endsection