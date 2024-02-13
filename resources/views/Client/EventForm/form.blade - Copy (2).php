<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

</head>
<body>

<div class="container">
  <h2>Stacked form</h2>
  <form action="/action_page.php">


   <h4>Deadline for Registration: {{date('D-F-Y',strtotime($event->event_close_date))}}</h4>
 
   @foreach(@$dynamic_field_event_wise as $key=>$dy)
   
  

   <div class="row">

      @if(@$dy->status=='Radio Group With Amount')

        @php
        $field_name = App\Models\RadioGroupWithAmount::where('event_id',@$event->id)
                    ->where('field_id',$dy->id)->get();
       @endphp

    

        <div class="col-md-12">
            
            

                <h5>{{@$dy->field_name}}</h5>
                @foreach(@$field_name as $key=>$name)
               <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" id="radio_group_with_amount{{@$name->id}}"  name="{{@$dy->field_value}}" value="{{@$name->id}}" class="form-check-input id-checkbox" >{{@$name->radio_field_name}} 
                </label>
                </div>
                @endforeach



        </div>

        @elseif(@$dy->status=='Radio Group WithOut Amount')
        <div class="col-md-12">
            
            <div class="cehckbox">
                <h5>Radio Group WithOut Amount</h5>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                <label class="custom-control-label" for="defaultUnchecked">Default unchecked</label>
            </div>
            </div>
        </div>

        @elseif(@$dy->status=='DrowpDown Select Option')

       
        <div class="col-md-6">
        <!-- <h5>DrowpDown Select Option</h5> -->
            <label for="">DrowpDown Select Option</label>
            <select name="" class="form-control" id="">
                <option value=""></option>
            </select>
       </div>
       
       @elseif(@$dy->status=='Input')
      
       <div class="col-md-6">
           <div class="form-group">
            <label for="usr">Name:</label>
            <input type="text" class="form-control" id="usr">
            </div>
        </div>



        @elseif(@$dy->status=='Radio Group Yes/No With Amount')

        @php
            $field_name_yes_no = App\Models\RadioGroupYesNo::where('event_id',@$event->id)
                        ->where('field_id',$dy->id)->get();
        @endphp

        <div class="col-md-12">
            
            <div class="cehckbox">
                <h5>{{@$dy->field_name}}</h5>

           
                <div class="custom-control custom-checkbox">
                <label class="form-check-label">
                <input type="radio" name="{{@$dy->field_value}}" value="{{$dy->radio_button_yes}}"  class="form-check-input yes_no_radio" >
                 Yes


                  <br>
                  <p id="yes{{$dy->radio_button_yes}}"></p>

                </label>


                <label class="form-check-label" style="margin-left: 31px;">
                <input type="radio" name="{{@$dy->field_value}}" value="{{$dy->radio_button_no}}"  class="form-check-input yes_no_radio" >
                 No
                </label>


                </div>

                

                <!-- <div class="custom-control custom-checkbox">
                <label class="form-check-label">
                <input type="radio" name="{{@$dy->field_value}}" value="no" class="form-check-input" >
                 No
                </label>
                </div> -->


            </div>
        </div>

        @endif


    </div>

    



 

    

    @endforeach

    <br>

    <div class="col-md-12">
            
            <div class="cehckbox">
                <h5>Total Amount</h5>

            <div class="custom-control custom-checkbox">
                <input type="text" id="total_amount_val" class="form-control" >
               
            </div>


            </div>
        </div>

     <br>



    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>


<input type="text" style="display:none" id="radio_group_with_single_amount" >
<input type="text" style="display:none"  id="radio_group_yes_no_person_with_single_amount" >


<input type="text" style="display:none"  id="radio_group_yes_no_person_with_amount_array_id" multiple name="radio_group_yes_no_person_with_amount_array_id[]" >

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




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

                                    html += `<ul>
                                       <li>

                                        <p style="font-family: cursive;"><input  name="${data.dynamic_field_name.radio_button_yes_no_person_no}" value="${v1.id}" type="radio" class="yes_no_person_value"> ${v1.person_no} </p>
                                      </li>
                                   </ul>`;
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






</html>
