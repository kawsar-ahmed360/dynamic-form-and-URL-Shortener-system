@extends('Server.SuperAdmin.master')
@section('title') Radio Group Yes/No Amount Create @endsection
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
    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10" style="margin-bottom: 40px;">{{@$event_name->event_name}} {{@$dynamic_field->field_name}} Radio Group Yes/No Amount Field List <a data-toggle="modal" data-target="#modaldemo1" class="pull-right btn btn-outline-primary btn-sm mg-b-10">Field Create</a></h6>
    <div class="table-wrapper">
        <div id="datatable1_wrapper" >
         
            
            <table id="example" class="table display responsive nowrap dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable1_info" style="width: 942px;">
                <thead>
                    <tr role="row">
                      
                        <th class="wd-15p sorting_asc" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 115px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">Sl</th>
                        <th class="wd-15p sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 115px;" aria-label="Last name: activate to sort column ascending">Value Name</th>
                        <th class="wd-15p sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 115px;" aria-label="Last name: activate to sort column ascending">Value Amount</th>

   
                        <th class="wd-25p sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 209px;" aria-label="E-mail: activate to sort column ascending">Active</th>
                  
                    </tr>
                </thead>
                <tbody>
                   
                   @foreach(@$list as $key => $value)
                       
                 
                    <tr role="row" class="odd">
                        <td tabindex="0" class="sorting_1">{{ @$key+1 }}</td>
                        <td>{{ $value->person_no }}</td>
                        <td>{{ $value->person_amount }}</td>


                        <!-- <td><span class="badge badge-secondary">{{ @$value->dynamic_table }}</span></td> -->
                        <td>
                           
                           
                          <a data-toggle="modal" data-target="#modaldemoedit{{@$value->id}}" class="btn btn-outline-info btn-sm m_hov"><i id="hov" class="fa fa-edit"></i></a>
                           <a id="delete" href="{{route('DynamicFieldRadioGroupYesNoDelete',@$value->id)}}" class="btn btn-outline-danger btn-sm m_hov"><i id="hov" class="fa fa-trash"></i></a>
                       
                       
                        </td>
                    </tr>
                    



                    
  <!-- BASIC MODAL -->
  <div id="modaldemoedit{{@$value->id}}" class="modal fade">
            <div class="modal-dialog modal-dialog-vertical-center" role="document">
              <div class="modal-content bd-0 tx-14" style="width:540px">
                <div class="modal-header pd-y-20 pd-x-25">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Radio Field Value Edit</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pd-25">
                  
                <form action="{{route('DynamicFieldRadioGroupYesNoUpdate')}}" method="post">
                    @csrf

                  <input type="hidden" name="event_id" value="{{@$event_name->id}}">
                  <input type="hidden" name="field_id" value="{{@$dynamic_field->id}}">
                  <input type="hidden" name="edit_id" value="{{@$value->id}}">

                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Value Name</label>
                            <input class="form-control" type="text" name="person_no" value="{{@$value->person_no}}" placeholder="Enter value Name">
                        </div>

                        <div class="col-md-12">
                            <label for="">Value Amount</label>
                            <input class="form-control" type="text" name="person_amount" value="{{@$value->person_amount}}" placeholder="Enter value amount">
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
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Radio Field Value Add</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pd-25">
                  
                <form action="{{route('DynamicFieldRadioGrouYesNoStore')}}" method="post">
                    @csrf

                  <input type="hidden" name="event_id" value="{{@$event_name->id}}">
                  <input type="hidden" name="field_id" value="{{@$dynamic_field->id}}">

                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Value Name</label>
                            <input class="form-control" type="text" name="person_no" placeholder="Enter value Name">
                        </div>

                        <div class="col-md-12">
                            <label for="">Value Amount</label>
                            <input class="form-control" type="text" name="person_amount" placeholder="Enter value amount">
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