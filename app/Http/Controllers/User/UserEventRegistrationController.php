<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventManage;
use App\Models\DynamicField;
use App\Models\RadioGroupWithAmount;
use Illuminate\Support\Facades\Auth;
use App\Models\RadioGroupYesNo;
use App\Models\User;
class UserEventRegistrationController extends Controller
{
    public function EventRegistration($id){

        // return "ok";
        // Auth::logout();

        $id = $id;
        $data['event'] = EventManage::where('slug',$id)->where('status','2')->first();
       if(!isset($data['event'])){
          return "This Event Not Avaiable";
       }
        $data['dynamic_field_event_wise'] = DynamicField::where('event_id',$data['event']->id)
                                          ->OrderBy('sequence','asc')->get();



          $list =  EventManage::where('id',$data['event']->id)->first();

            $modal_find = $data['event']->event_table_name;
            $ModalGenerate = str_replace('_','',$modal_find);
            $columns = ['id','user_id','admin_status'];
            $EvemtMemberApprovedListCount = app("App\\Models\\$ModalGenerate")::select($columns)->where('admin_status','2')->count();
  
            if($EvemtMemberApprovedListCount>$data['event']->total_seat){   
                return view('Client.EventForm.event_set_close');               
               }else{
                return view('Client.EventForm.event_form',$data); 
              }
     

           




        // $modal_find = $data['event']->event_table_name;
        // $ModalGenerate = str_replace('_','',$modal_find);
        //  $store = app("App\\Models\\$ModalGenerate");
        // $store->name = "kawsar";
        // $store->save();   
        
        // dd('ok');

        

    }




    // public function EventRegistration($id){

    //     $id = $id;

    //     $data['event'] = EventManage::where('id',$id)->first();
    //     $data['dynamic_field_event_wise'] = DynamicField::where('event_id',$data['event']->id)
    //                                       ->OrderBy('sequence','asc')->get();


    //     // $modal_find = $data['event']->event_table_name;
    //     // $ModalGenerate = str_replace('_','',$modal_find);
    //     //  $store = app("App\\Models\\$ModalGenerate");
    //     // $store->name = "kawsar";
    //     // $store->save();                                 

    //     return view('Client.EventForm.form',$data); 

    // }

    public function EventRegistrationSubmit(Request $request){

        // return $request->all();



        //-----------Modal Setup Code -----------

        $event_table = EventManage::where('id',$request->event_id)->first();
        $modal_find = $event_table->event_table_name;
        $ModalGenerate = str_replace('_','',$modal_find);
        $store = app("App\\Models\\$ModalGenerate");

        $dynamic_field_name =  DynamicField::where('event_id',$event_table->id)->get();


        $dynamic_field_array = [];
        foreach(@$dynamic_field_name as $key=>$dynamic){
           array_push($dynamic_field_array,$dynamic->field_value);
        }



        //---------request array field ----------
        $inputData = $request->all();
        $allFields = [];
    
        foreach ($inputData as $field => $value) {
            array_push($allFields, $field);
        }
        $InputnamesToRemove = ['_token', 'total_amount_val'];
        // Remove specific names from the array
        $allFields_new = array_filter($allFields, function ($allFields) use ($InputnamesToRemove) {
            return !in_array($allFields, $InputnamesToRemove);
        });

        // dd($allFields);



        // $matchedArray = array_intersect($dynamic_field_array, $allFields_new);
        $matchedArray = array_diff($allFields_new,$dynamic_field_array);
        $new_final_array_generate = array_merge($dynamic_field_array, $matchedArray);


        // dd($new_final_array_generate);


        foreach(@$new_final_array_generate as $key=>$dynamic){
        
            $store->{$dynamic} = $request->{$dynamic};
            $store->save();
           

        }

        // dd('ok');

        //--------------Radio Group With Amount --------
        // $array_con = $request->radio_group_with_amount_child_id;
        // $arrayValue_with_radio_amount = explode(',', $array_con);
        // $radio_group_with_amount_modal = RadioGroupWithAmount::whereIn('id',$arrayValue_with_radio_amount)->get();
        
        // dd($radio_group_with_amount_modal);
        
        // foreach($radio_group_with_amount_modal as $key=>$radio){

        // }

        return redirect()->route('home');



    }

    

    public function RadioGroupWithAmountAjax(Request $request){

        $radio_group_with_amount = RadioGroupWithAmount::whereIn('id',@$request->Id)->sum('radio_field_amount');
        return response()->json(['data'=>$radio_group_with_amount]);
    }

    public function RadioGroupYesNoWithAmountAjax(Request $request){

        $radio_yes = DynamicField::where('radio_button_yes',@$request->Id)->get();
        $radio_no = DynamicField::where('radio_button_no',@$request->Id)->get();


        return response()->json(['radio_yes'=>$radio_yes,'radio_no'=>$radio_no]);

    }


    public function RadioGroupYesNoValueWithAmountAjax(Request $request){

        $radio_group_yes_no_value = RadioGroupYesNo::where('field_id',$request->yes_id)->get();

        $dynamic_field_name = DynamicField::where('id',@$request->yes_id)->first();

        return response()->json(['data_list'=>$radio_group_yes_no_value,'dynamic_field_name'=>$dynamic_field_name]);
    }


    public function RadioGroupYesNoPersonValueWithAmountAjax(Request $request){

        $radio_group_with_amount = RadioGroupYesNo::whereIn('id',@$request->Id)->sum('person_amount');

      
        $radio_group_with_amount = $radio_group_with_amount;
        $return_value_id = $request->Id;

        // dd($return_value_id);

        return response()->json(['data'=>$radio_group_with_amount,'return_value_id'=>$return_value_id]);

    }

   

    public function RadioGroupYesNoValueWithAmountMinusAjax(Request $request){


        $list = @$request->value_array_id;
       $end_list = end($list);

    //    return $end_list;
    //     return $request->all();

        $radio_group_with_amount = RadioGroupYesNo::whereIn('id',@$end_list)
                                   ->where('field_id',$request->yes_id)->sum('person_amount');

        // return $radio_group_with_amount;
        return response()->json(['amount_minus'=>$radio_group_with_amount]);

    }


    public function MyEventList(){
        $data['user_id'] = User::where('id',Auth::user()->id)->where('super_admin_status','no')->first();
        $data['avaiable_event'] =  EventManage::where('status','2')->OrderBy('id','desc')->get();
        return view('Member.Event.list',$data);
    
    }

    

    public function MyEventListView($event_id){

        $data['user_id'] = User::where('id',Auth::user()->id)->where('super_admin_status','no')->first();
        // dd(Auth::user()->id);
        $event_table = EventManage::where('id',$event_id)->first();
        $data['event'] = EventManage::where('id',$event_id)->first();
        $modal_find = $event_table->event_table_name;
        $ModalGenerate = str_replace('_','',$modal_find);
        $columns = ['id','user_id', 'transaction_id', 'total_amount','admin_status'];
        $data['EvemtMemberList'] = app("App\\Models\\$ModalGenerate")::select($columns)
                                 ->where('admin_status','2')->get();
        // dd($data['single_list']);

        // dd($data['EvemtMemberList']);


        return view('Member.Event.list_view',$data);

    }


    public function MyEventSingleListItemView($event_id,$id){

        $event_table = EventManage::where('id',$event_id)->first();
        $data['event'] = EventManage::where('id',$event_id)->first();
        $modal_find = $event_table->event_table_name;
        $ModalGenerate = str_replace('_','',$modal_find);
        $data['single_list'] = app("App\\Models\\$ModalGenerate")::where('id',$id)->first();

     
        $table = $data['single_list']->getTable();
        $columns = $data['single_list']->getConnection()->getSchemaBuilder()->getColumnListing($table);
        $data['user_info'] = User::where('id',$data['single_list']->user_id)->first();


        $specificValue = 'RadioGroup'; // Replace with your specific value
        
        $data['newArray'] = collect($columns)
            ->filter(function ($value) use ($specificValue) {
                return substr($value, 0, 10) === substr($specificValue, 0, 10);
            })
            ->values()
            ->all();


       $data['column_list'] = $data['single_list']->getConnection()->getSchemaBuilder()->getColumnListing($table);



       $itemsToRemove  = ['user_id', 'event_id','admin_status','total_amount','updated_at','created_at','transaction_id',
                     'RadioGroupYesNo_accompany_person_two_radio_group_yes_no_number','RadioGroupYesNo_accompany_person_radio_group_yes_no_number',
                    'RadioGroupYesNo_accompany_person_two','RadioGroupWithAmount_registration_for_two','RadioGroupYesNo_accompany_person','RadioGroupOnly_foreign_participants','RadioGroupWithAmount_registration_for'];

        $data['filteredArray'] = array_filter($data['column_list'], function ($value) use ($itemsToRemove) {
            return !in_array($value, $itemsToRemove);
        });

        return view('Member.Event.single_view',$data);
   
    }


}
