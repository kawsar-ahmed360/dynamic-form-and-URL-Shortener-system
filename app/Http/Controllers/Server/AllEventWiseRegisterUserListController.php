<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventManage;
use App\Models\User;
use Illuminate\Support\Collection;
use PDF;
use Mail;
class AllEventWiseRegisterUserListController extends Controller
{
    //

    public function AllEventListShow($id){

        $event_table = EventManage::where('id',$id)->first();
        $data['event'] = EventManage::where('id',$id)->first();
        $modal_find = $event_table->event_table_name;
        $ModalGenerate = str_replace('_','',$modal_find);
        $columns = ['id','user_id', 'transaction_id', 'total_amount','admin_status'];
        $data['EvemtMemberList'] = app("App\\Models\\$ModalGenerate")::select($columns)->get();
        // $data['EvemtMemberList'] = app("App\\Models\\$ModalGenerate")::select($columns)->where('admin_status','1')->get();

        // dd('ok');


        return view('Server.SuperAdmin.EventWiseMember.list',$data);

        // return $EvemtMemberList;
        // return $data['all'];
        
    }

    public function SingleEventMemberInfo($event_id,$id){

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


   

            // dd($columns);

        // return $data['single_list'];
        // $data['user_basic_info'] = User::where('id',$data['single_list']->user_id)->first(); 


        return view('Server.SuperAdmin.EventWiseMember.single_view',$data);


        // return $event_table;

    }

    public function SingleEventApprovedMember($id,$event_id){
        
     
        $event_table = EventManage::where('id',$event_id)->first();
        $data['event'] = EventManage::where('id',$event_id)->first();
        $modal_find = $event_table->event_table_name;
        $ModalGenerate = str_replace('_','',$modal_find);
        $single_list = app("App\\Models\\$ModalGenerate")::where('id',$id)->first();
        $single_list->admin_status = 2;
        $single_list->save();

  
  
        // dd($event_table);

          // Generate the PDF file
          $data['name'] = 'kawsar hamid';
          $pdf = PDF::loadView('Server.SuperAdmin.MemberTicket.member_pdf', $data)->setOptions(['defaultFont' => 'sans-serif']);;
        
          $rand = rand(11,22);
          $fileName = $data['name'] .$rand.'_'.$event_table->event_name.'_Ticket'. '.pdf';
        
          $pdf->save(public_path('Ticket/' . $fileName)); // Save the PDF to a public directory
        //   $pdf->save(public_path('Ticket/example.pdf')); // Save the PDF to a public directory

                  // Send the PDF file as an attachment via email
        $userEmail = 'support1@esoft.com.bd'; // Change this to the specific user's email address
        $emailData = [
            'email' => $userEmail,
            'pdfPath' => public_path('Ticket/' . $fileName)
            // 'pdfPath' => public_path('Ticket/example.pdf')
        ];

        Mail::send('Server.SuperAdmin.Email.pdf', $emailData, function ($message) use ($emailData) {
            $message->to($emailData['email'])
                ->from('otonestwebsitemail@otonest.com')
                ->subject('PDF Attachment')
                ->attach($emailData['pdfPath']);
        });

        // Delete the temporary PDF file
        unlink(public_path('Ticket/' . $fileName));

        return 'PDF generated and sent successfully.';

        // return $pdf->stream('Server.SuperAdmin.MemberTicket.member_pdf',$data);


        // return view('Server.SuperAdmin.MemberTicket.member_pdf',$data);
  

        dd($pdf);

     



        return redirect()->route('AllEventListShow',$event_id);
    }


}
