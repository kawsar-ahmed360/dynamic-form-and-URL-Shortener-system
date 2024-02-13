@extends('Server.SuperAdmin.master')
@section('title') Event Category Edit @endsection
@section('content')

<style type="text/css">
	.form-group{
		margin-bottom: 13px !important;
	}

  .payment_input{
    margin-left:10px;
    display:none;
    width: 139px;
    height: 30px;
  }
</style>

<div class="br-section-wrapper">
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10" style="margin-bottom:40px">Event Category Edit <a href="{{ route('AllEvent') }}" class="pull-right btn btn-outline-primary btn-sm mg-b-10">All Event</a></h6>

<form action="{{ route('UpdateEvent') }}" method="post">
@csrf

<input type="hidden" name="edit_id" value="{{@$edit->id}}">

    <div class="form-layout form-layout-1">
            <div class="row mg-b-25">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label" style="font-weight: bold;">Event Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="event_name" value="{{ @$edit->event_name }}" placeholder="Event Name">
                  @error('event_name')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div><!-- col-4 -->
          

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label" style="font-weight: bold;">Short: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="short" value="{{ @$edit->short }}"  placeholder="event short">
                  @error('short')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div><!-- col-4 -->



             <div class="col-lg-12">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label" style="font-weight: bold;">Dynamic Form: <span class="tx-danger">*</span></label>
                 
                 <label class="rdiobox">
                <input type="radio" name="dynamic_table" {{(@$edit->dynamic_table=='yes')?'checked':''}} value="yes">
                <span>YES</span>
                </label>

                <label class="rdiobox">
                <input type="radio" name="dynamic_table" {{(@$edit->dynamic_table=='no')?'checked':''}} value="no">
                <span>NO</span>
                </label>

                @error('dynamic_table')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div><!-- col-4 -->



            </div><!-- row -->



            <div class="form-layout-footer">
              <button type="submit" class="btn btn-info">Update Form</button>
              <button type="button" class="btn btn-secondary">Cancel</button>
            </div><!-- form-layout-footer -->
          </div>

          </form>


 </div>

 @section('footer')
<script>
   $('input[name="payment"]').on('change',function(){

   var payment_value = $(this).val();

   if(payment_value=='bkash'){

     $('#bkash_number').show();
     $('#nagad_number').hide();
     $('#rocket_number').hide();

   }else if(payment_value=='nagad'){

    $('#bkash_number').hide();
     $('#nagad_number').show();
     $('#rocket_number').hide();

   }else if(payment_value=='rocket'){

    $('#bkash_number').hide();
     $('#nagad_number').hide();
     $('#rocket_number').show();

   }else{
    $('#bkash_number').hide();
     $('#nagad_number').hide();
     $('#rocket_number').hide();
   }

  //  alert(payment_value);

   })

   var currentDate = new Date().toISOString().split("T")[0];

// Set min attribute of the input field
document.getElementById("dateInput").min = currentDate;
</script>
 @endsection

@endsection