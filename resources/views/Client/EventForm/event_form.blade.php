@extends('Client.master')
@section('title') Event Form @endsection

@section('content')

  <!-- Start Apply-from -->
  <section class="pt-200">
            <div class="Reference-from-area ">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="Reference-from">
                         
                        
                           <div class="col-xl-8 col-md-8 offset-md-2 col-auto">
                                <!-- from headeing -->
                                <div class="forom-headeing">
                                    <div class="logo-top">
                                        <img src="{{asset('logo01 (2).png')}}">
                                    </div>
                                    <span><i class="fas fa-times"></i></span>
                                    <h3><span>{{$event->event_name}}</span></h3>

                                    <div class="head-title head-title-mb mt-b-10">
                                      @if(Auth::user()->id)
                                        <p class="reg-txt">If you are already registered  </p><a target="_blank" class="header-btn header-btn-mb" href="{{route('home')}}">Login Here</a>
                                    @else
                                    <p class="reg-txt">If you are already registered  </p><a class="header-btn header-btn-mb" href="{{route('login')}}">Login Here</a>
                                    @endif
                                      </div>

                                      

                                  
                                    
                                </div>

                               <form action="{{route('EventRegistrationSubmit')}}" method="post">
                                  @csrf

                                  <input type="hidden" name="event_id" value="{{@$event->id}}">


                                  <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                  <input type="hidden" name="admin_status" value="2">


                                  <div class="row">
                                @foreach(@$dynamic_field_event_wise as $key=>$dy)


                                    @if(@$dy->status=='Radio Group With Amount')
                                      @php
                                          $field_name = App\Models\RadioGroupWithAmount::where('event_id',@$event->id)
                                                      ->where('field_id',$dy->id)->get();
                                         @endphp
                                    <div class="row mb-10">
                                    <div class="col-xl-12">
                                      <h3 class="main-lavel-title">{{@$dy->field_name}} @if(@$dy->required=='required') <span style="color:red">*</span> @endif</h3>
                                    </div>
                                       @foreach(@$field_name as $key=>$name)
                                        <div class="col-xl-12">
                                           <div class="form-check form-group-custom">
                                              <label class="form-check-label">
                                                <input type="radio" id="radio_group_with_amount{{@$name->id}}" name="{{@$dy->field_value}}" @if(@$dy->required=='required') required="" @endif class="form-check-input id-checkbox" value="{{@$name->id}}">{{@$name->radio_field_name}}
                                              </label>
                                            </div>
                                        </div>

                                        @endforeach


                                       

                                   </div>

                                   @elseif(@$dy->status=='Radio Group WithOut Amount')

                                     @php
                                      $field_name_out_amount = App\Models\RadioGroupOnly::where('event_id',@$event->id)
                                                  ->where('field_id',$dy->id)->get();
                                     @endphp
                                    <div class="row mt-10 mb-10">
                                    <div class="col-xl-12">
                                      <h3 class="reg-for main-lavel-title">{{@$dy->field_name}} @if(@$dy->required=='required') <span style="color:red">*</span> @endif</h3>
                                    </div>
                                       @foreach(@$field_name_out_amount as $key=>$name)
                                        <div class="col-xl-12">
                                           <div class="form-check form-group-custom">
                                              <label class="form-check-label">
                                                <input type="radio" id="radio_group_with_amount{{@$name->id}}"  name="{{@$dy->field_value}}" @if(@$dy->required=='required') required="" @endif class="form-check-input" value="{{@$name->radio_field_name}} ">{{@$name->radio_field_name}}
                                              </label>
                                            </div>
                                        </div>

                                        @endforeach


                                       

                                   </div>


                                    
                                   @elseif(@$dy->status=='DrowpDown Select Option')

                                     @php
                                        $field_name_drowp_down = App\Models\SelectOptionDrowpdown::where('event_id',@$event->id)
                                                    ->where('field_id',$dy->id)->get();
                                    @endphp
                                   
                                   <div class="col-xl-6 p-l5-r-5">
                                            <label for="message">{{@$dy->field_name}} @if(@$dy->required=='required') <span style="color:red">*</span> @endif</label>
                                            <select name="{{@$dy->field_value}}" @if(@$dy->required=='required') required="" @endif id="select">
                                                
                                               @foreach(@$field_name_drowp_down as $key=>$dr)
                                                <option value="{{@$dr->option_value}}">{{@$dr->option_value}}</option>

                                                @endforeach
                                            </select>
                                        </div>


                                  @elseif(@$dy->status=='Input')

                                  <div class="col-xl-6 p-l5-r-5">
                                            <label for="message">{{@$dy->field_name}} @if(@$dy->required=='required') <span style="color:red">*</span> @endif</label>
                                            <input type="text" name="{{@$dy->field_value}}"@if(@$dy->required=='required') required="" @endif placeholder="{{@$dy->field_name}}">
                                    </div>


                                  


                                    @elseif(@$dy->status=='Radio Group Yes/No With Amount')


                                      @php
                                          $field_name_yes_no = App\Models\RadioGroupYesNo::where('event_id',@$event->id)
                                                      ->where('field_id',$dy->id)->get();
                                      @endphp


                                       <div class="row m-l5-r-5 mt-10">
                                            <div class="col-xl-4">
                                               <div class="form-group-custom">
                                                  <label class="form-check-label">
                                                    # {{@$dy->field_name}} 
                                                  </label>
                                                </div>
                                            </div>


                                            <div class="col-xl-2">
                                               <div class="form-check form-group-custom">
                                                  <label class="form-check-label">
                                                    <input type="radio" class="form-check-input yes_no_radio" name="{{@$dy->field_value}}" value="{{$dy->radio_button_yes}}"  >Yes
                                                  </label>
                                                </div>
                                            </div>


                                            <div class="col-xl-2">
                                               <div class="form-check form-group-custom">
                                                  <label class="form-check-label">
                                                    <input type="radio" class="form-check-input yes_no_radio" checked="" name="{{@$dy->field_value}}" value="{{$dy->radio_button_no}}"> No
                                                  </label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row m-l5-r-5" id="yes{{$dy->radio_button_yes}}">
                                          
                                        </div>

                               
                                       





                                   @endif


                                 @endforeach


                                       



                                        <!-- <div class="col-xl-12">
                                            <input placeholder="Please put a password for retrieval of your e-ticket" type="text">
                                        </div> -->

                                        <div class="col-xl-12 mt-b-10">
                                            
                                                <button type="submit" class="fromn-btn f-right btn-next">Submit</button>
                                            
                                        </div>

                                        </div>
                                    
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div> 
            <!-- from button -->
        </section>
         <!-- End Reference-from -->


<input type="text" style="display:none" id="radio_group_with_single_amount" >
<input type="text" style="display:none"  id="radio_group_yes_no_person_with_single_amount" >


<input type="text" style="display:none"  id="radio_group_yes_no_person_with_amount_array_id" multiple name="radio_group_yes_no_person_with_amount_array_id[]" >


@section('footer')


<script>

    
  
   
    function final_calculate(){

        var radio_group_with_single_amount_value = $('#radio_group_with_single_amount').val();
        var radio_group_yes_no_person_with_single_amount_value = $('#radio_group_yes_no_person_with_single_amount').val();
       
          if(radio_group_with_single_amount_value !=="" && radio_group_yes_no_person_with_single_amount_value !==""){

           
            $('#total_amount_val').val(parseInt($('#radio_group_with_single_amount').val())+parseInt($('#radio_group_yes_no_person_with_single_amount').val()));
  
          }else if(radio_group_with_single_amount_value !==""){
            $('#total_amount_val').val(radio_group_with_single_amount_value);
          }else if(radio_group_yes_no_person_with_single_amount_value !==""){
            $('#total_amount_val').val(radio_group_yes_no_person_with_single_amount_value);
          }

        
  
   }

    function radio_group_with_amount_function(ids){

        var Id = ids
        $.ajax({
            url:"{{route('RadioGroupWithAmountAjax')}}",
            type:"GET",
            data:{Id:Id},
            success:function(data){

             
              $('#radio_group_with_single_amount').val(data.data);
              final_calculate();

            }
        })

     
    }


    
</script>


<!-- JavaScript code -->
<script>
    $('.id-checkbox').on('change', function(e) {
        e.preventDefault();
        var ids = [];
        $('.id-checkbox:checked').each(function() {
            ids.push($(this).val());
        });

         $('#radio_group_with_amount_child_id').val(ids);

        radio_group_with_amount_function(ids);
    });
</script>



<!-------Yes No Person Value------>


<script>

   $(document).on('change','.yes_no_person_value', function(e) {
        e.preventDefault();

        var ids_console = [];
        $('.yes_no_person_value:checked').each(function() {
            ids_console.push($(this).val());
        });

        radio_group_yes_no_person_with_amount_function(ids_console);
        // if($('.yes_no_person_value').is(':checked') ){
        //     radio_group_yes_no_person_with_amount_function(ids_console);
        // }else{

        //     console.log(ids_console);

        // }

      
      
    });
</script>


 <script>
     var myArray = [];
     function radio_group_yes_no_person_with_amount_function(ids){
        
        var Id = ids
        $.ajax({
            url:"{{route('RadioGroupYesNoPersonValueWithAmountAjax')}}",
            type:"GET",
            data:{Id:Id},
            success:function(data){

              $('#radio_group_yes_no_person_with_single_amount').val(data.data);

            //   console.log(data.return_value_id);

            myArray.push(data.return_value_id);

            //    var inputValue = $('#radio_group_yes_no_person_with_amount_array_id').val();
              
            //   $('#radio_group_yes_no_person_with_amount_array_id').val(data.return_value_id);

              final_calculate();

            }
        })
     }
 </script>





<script>
    //-----------------script Yes/No---------

    $('.yes_no_radio').on('change', function(e) {
        e.preventDefault();
        var ids = $(this).val();
        // $('.yes_no_radio:checked').each(function() {
        //     ids.push($(this).val());
        // });

        // console.log(ids);
        radio_group_yes_no_amount_function(ids);
    });

    function radio_group_yes_no_amount_function(ids){

        // console.log(ids);

        
        var Id = ids
        $.ajax({
            url:"{{route('RadioGroupYesNoWithAmountAjax')}}",
            type:"GET",
            data:{Id:Id},
            success:function(data){

                // console.log(data);
               
                if(data.radio_yes.length>0){

                    // var yes_id ='';
                
                    $.each(data.radio_yes,function (k,v) {

                        var yes_id = v.id;
                       
                        $.ajax({
                            url:"{{route('RadioGroupYesNoValueWithAmountAjax')}}",
                            type:"GET",
                            data:{yes_id:yes_id},
                            success:function(data){

                           
                                var html = '';
                                $.each(data.data_list, function (k1, v1) {

                                   //  html += `<ul>
                                   //     <li>

                                   //      <p style="font-family: cursive;"><input  name="${data.dynamic_field_name.radio_button_yes_no_person_no}" value="${v1.id}" type="radio" class="yes_no_person_value"> ${v1.person_no} </p>
                                   //    </li>
                                   // </ul>`; 

                                   html += `
                                            <div class="col-xl-5 offset-md-4 col-auto">
                                               <div class="form-check form-group-custom">
                                                  <label class="form-check-label">
                                                    <input type="radio" name="${data.dynamic_field_name.radio_button_yes_no_person_no}"  class="form-check-input yes_no_person_value" value="${v1.id}">  ${v1.person_no}
                                                  </label>
                                                </div>
                                            </div>
                                        `;


                                });

                                
                                    $('#yes'+data.dynamic_field_name.radio_button_yes).html(html);


                            }
                        })

                        // $('#yes'+v.radio_button_yes).text(v.radio_button_yes);

                        // console.log(v)
                    });
                   
                    
                }
                
               if(data.radio_no.length>0){

                    // console.log(data.radio_yes);
                    $.each(data.radio_no,function (k,v) {

                        var yes_id = v.id;

                        var value_array_id = myArray;

                        // var value_array_id = $('#radio_group_yes_no_person_with_amount_array_id').val();
                        // console.log(value_array_id);

                        $.ajax({
                            url:"{{route('RadioGroupYesNoValueWithAmountMinusAjax')}}",
                            type:"GET",
                            data:{yes_id:yes_id,value_array_id:value_array_id},
                            success:function(data){

                                console.log(data.amount_minus);

                                var total_amount_value_received = $('#radio_group_yes_no_person_with_single_amount').val();
                               
                                var total_calculate_amount = parseInt(total_amount_value_received) - parseInt(data.amount_minus);
                               
                                $('#radio_group_yes_no_person_with_single_amount').val(total_calculate_amount);
                                
                                final_calculate();

                                // console.log(total_calculate_amount);
                                // var total_calculate_amount = total_amount_value_received - data.amount_minus;
                                // $('#radio_group_yes_no_person_with_single_amount').val(total_calculate_amount);
                            //    var total_amount_minus = $('#total_amount_val').val();
                            //    var total_calculate_amount = total_amount_minus - data.amount_minus;
                            //    $('#total_amount_val').val(total_calculate_amount);
                            }
                        })
                        // console.log(yes_id);

                        $('#yes'+v.radio_button_yes).html('');


                        });

                }

                


            }
        })

    }
</script>






@endsection



@endsection