<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventManage;
use App\Models\RadioGroupWithAmount;
use App\Models\RadioGroupOnly;
use App\Models\DynamicField;
use App\Models\RadioGroupYesNo;
use App\Models\SelectOptionDrowpdown;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class EventManageController extends Controller
{



    public function DynamicTableGenerate(Request $request){


        $event =EventManage::where('id',$request->event_id)->first();
        $event_table =DynamicField::where('event_id',$request->event_id)->get('field_value');    

        $tableName = $event->event_table_name;
        $rows = explode("\n", $event_table);

          // Create the dynamic table migration
          $migrationName = 'Create' . Str::studly($tableName) . 'Table';
          $migrationFileName = date('Y_m_d_His') . '_' . strtolower($migrationName) . '.php';
          $migrationFilePath = database_path('migrations/' . $migrationFileName);

          $modelFilePath_exists = app_path('Models/' . Str::studly($tableName) . '.php');

          if (!File::exists($modelFilePath_exists)) {
  
            $migrationContents = $this->generateMigrationContents($tableName, $rows);
            file_put_contents($migrationFilePath, $migrationContents);
            // Create the dynamic model file
            $modelContents = $this->generateModelContents($tableName);
            $modelFilePath = app_path('Models/' . Str::studly($tableName) . '.php');
            file_put_contents($modelFilePath, $modelContents);

          }else{

            $Noti = array(
                'message'=>'already file exists',
                'alert-type'=>'error',
            );

            return redirect()->back()->with($Noti);

          }

  

          $Noti = array(
              'message'=>'successfully Created',
              'alert-type'=>'success'
          );
        return redirect()->back()->with($Noti);
   
    }

    private function generateMigrationContents($tableName, $rows)
    {
        $className = 'Create' . Str::studly($tableName) . 'Table';
      
      
        $rowss = json_decode($rows[0]);

        $tableData = '';
        // $datagetg =[];
        foreach ($rowss as $row) {
            $columnName = $row->field_value;
            $tableData .= "\$table->text('$columnName');\n";
        }

        // dd($datagetg);

        $contents = <<<PHP
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class $className extends Migration
{
    public function up()
    {
        Schema::create('$tableName', function (Blueprint \$table) {
            \$table->increments('id');
            $tableData
            \$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('$tableName');
    }
}
PHP;

        return $contents;
    }


    private function generateModelContents($tableName)
    {
        $modelName = Str::studly($tableName);
        $contents = <<<PHP
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class $modelName extends Model
{
    protected \$table = '$tableName';
    protected \$guarded = [];
}
PHP;

        return $contents;
    }



    //-------------Laravel Dynamic table generate ----------

    public function DynamicMysqliTableGenerate(Request $request){

        

        $event =EventManage::where('id',$request->event_id)->first();
        $event_table =DynamicField::where('event_id',$request->event_id)->get('field_value');


        $checkbox_field = DynamicField::where('event_id',$request->event_id)->whereNotNull('radio_button_yes_no_person_no')->get('radio_button_yes_no_person_no');

        // dd($checkbox_field);
        $tableName = $event->event_table_name;

        // $lastCharacter = substr($tableName, -1);

        // if($lastCharacter!='s'){

        //     $tableName = $event->event_table_name.'s';
        // }

        // Bicc_Third
        // $tableName = strtolower($tableName);

        
        if (DB::connection()->getSchemaBuilder()->hasTable($tableName)) {
            DB::statement("DROP TABLE $tableName");
        }

        DB::statement("CREATE TABLE $tableName (id INT AUTO_INCREMENT PRIMARY KEY)");
        $rows = explode("\n", $event_table);
        $rowss = json_decode($rows[0]);

        // dd($rowss);field_value


        foreach ($rowss as $field) {
            $columnName = $field->field_value;
            DB::statement("ALTER TABLE $tableName ADD $columnName text(255)");
        }

        foreach ($checkbox_field as $checkbox_field) {
            $columnName_next = $checkbox_field->radio_button_yes_no_person_no;
            DB::statement("ALTER TABLE $tableName ADD $columnName_next text(255)");


        }

        //---------Extra 4 column generate user_id transaction_id total_amount status------------
        DB::statement("ALTER TABLE $tableName ADD event_id integer(11), ADD user_id integer(11), ADD transaction_id VARCHAR(255), ADD total_amount integer(11), ADD admin_status integer(11)");
   
        DB::statement("ALTER TABLE $tableName ADD created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, ADD updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
     

        $Noti = array(
            'message'=>'successfully Created',
            'alert-type'=>'success'
        );
      return redirect()->back()->with($Noti);
    }



    public function CreateEvent(){

       return view('Server.SuperAdmin.EventManage.create');
    }

    public function AllEvent(){

        $data['list'] = EventManage::where('trash','1')->get();

        return view('Server.SuperAdmin.EventManage.list',$data);
    }

    public function StoreValidation(Request $request){

        if($request->payment=='bkash'){
            
            $request->validate([
                'bkash_number'=>'required'
            ]);
        }
        if($request->payment=='nagad'){
            
            $request->validate([
                'nagad_number'=>'required'
            ]);
        }
        if($request->payment=='rocket'){
            
            $request->validate([
                'rocket_number'=>'required'
            ]);
        }

    }

    public function StoreEvent(Request $request){

        $request->validate([
            'event_name'=>'required',
            'dynamic_table'=>'required',
        ],[
            'dynamic_table.required'=>'Dynamic Form Access Field Required!!'
        ]);

      

        $this->StoreValidation($request);

        $store = new EventManage();
        $this->save($store,$request);

        $noti = array(
            'message'=>'successfully saved',
            'alert-type'=>'success'
        );

        return redirect()->route('AllEvent')->with($noti);
    }

    
    public function UpdateEvent(Request $request){

        $store =EventManage::where('id',$request->edit_id)->first();
        $this->save($store,$request);

        $noti = array(
            'message'=>'successfully update',
            'alert-type'=>'success'
        );

        return redirect()->route('AllEvent')->with($noti);
    }
    

    protected function save(EventManage $store,Request $request){

         $store->event_name = $request->event_name;
         $store->short = $request->short;
         $store->dynamic_table = $request->dynamic_table;
         $store->event_table_name =  str_replace(' ','_',$request->event_name); 
         $store->slug = str_replace(' ','-',$request->event_name);

         $store->save();
    }

    public function EditEvent($id){

        $data['edit'] = EventManage::where('id',$id)->first();
        return view('Server.SuperAdmin.EventManage.edit',$data);
    }

    public function DeleteEvent($id){

        EventManage::where('id',$id)->update(['trash'=>2]);


        $noti = array(
            'message'=>'successfully delete',
            'alert-type'=>'success'
        );

        return redirect()->route('AllEvent')->with($noti);

    }

    public function DynamicFormEvent($id){

        $data['event_name'] = EventManage::where('id',$id)->first();
        $data['dynamic_field'] = DynamicField::where('event_id',$id)->get();


        return view('Server.SuperAdmin.EventManage.DynamicForm.list',$data);


    }

    public function CreateEventWiseFieldStore(Request $request){


        // return $request->all();

        $store = new DynamicField();
        $store->field_name = $request->field_name;

        if($request->status=='Radio Group With Amount'){
            $store->field_value = 'RadioGroupWithAmount_'.str_replace(' ','_',strtolower($request->field_name));
        }elseif($request->status=='Radio Group WithOut Amount'){
            $store->field_value = 'RadioGroupOnly_'.str_replace(' ','_',strtolower($request->field_name));

        }elseif($request->status=='Radio Group Yes/No With Amount'){
            $store->field_value = 'RadioGroupYesNo_'.str_replace(' ','_',strtolower($request->field_name));
        }else{
            $store->field_value = str_replace(' ','_',strtolower($request->field_name));
        }
        

        $store->field_placeholder = $request->field_name;
        $store->event_id = $request->event_id;
        $store->status = $request->status;
        $store->required = $request->required;
        $store->sequence = $request->sequence;
        if($request->status=='Radio Group Yes/No With Amount'){
            $store->radio_button_yes_no_person_no ='RadioGroupYesNo_'.str_replace(' ','_',strtolower($request->field_name)).'_radio_group_yes_no_number';
            $store->radio_button_yes =str_replace(' ','_',strtolower($request->field_name)).'_yes';
            $store->radio_button_no =str_replace(' ','_',strtolower($request->field_name)).'_no';
        }

        $store->save();

        $noti = array(
            'message'=>'successfully Added',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($noti);

    }


    
    public function CreateEventWiseFieldUpdate(Request $request){

        $store = DynamicField::where('id',$request->edit_id)->first();
        $store->field_name = $request->field_name;

        if($request->status=='Radio Group With Amount'){
            $store->field_value = 'RadioGroupWithAmount_'.str_replace(' ','_',strtolower($request->field_name));
        }elseif($request->status=='Radio Group WithOut Amount'){
            $store->field_value = 'RadioGroupOnly_'.str_replace(' ','_',strtolower($request->field_name));

        }elseif($request->status=='Radio Group Yes/No With Amount'){
            $store->field_value = 'RadioGroupYesNo_'.str_replace(' ','_',strtolower($request->field_name));
        }else{
            $store->field_value = str_replace(' ','_',strtolower($request->field_name));
        }

        $store->field_placeholder = $request->field_name;
        $store->event_id = $request->event_id;
        $store->status = $request->status;
        $store->required = $request->required;
        $store->sequence = $request->sequence;
        if($request->status=='Radio Group Yes/No With Amount'){
            $store->radio_button_yes_no_person_no ='RadioGroupYesNo_'.str_replace(' ','_',strtolower($request->field_name)).'_radio_group_yes_no_number';
            $store->radio_button_yes =str_replace(' ','_',strtolower($request->field_name)).'_yes';
            $store->radio_button_no =str_replace(' ','_',strtolower($request->field_name)).'_no';
        }
        $store->save();

        $noti = array(
            'message'=>'successfully Added',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($noti);

    }

    public function CreateEventWiseFieldDelete($id){

        DynamicField::where('id',$id)->delete();

        $noti = array(
            'message'=>'successfully Deleted',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($noti);


    }


    public function DynamicFieldRadioGroupAmount($id,$event_id){

        $data['event_name'] = EventManage::where('id',$event_id)->first();
        $data['dynamic_field'] = DynamicField::where('id',$id)->first();

        $data['list'] = RadioGroupWithAmount::where('event_id',$event_id)->where('field_id',$id)->get();

        return view('Server.SuperAdmin.EventManage.RadioGroupAmount.list',$data);



    }



    public function DynamicFieldRadioGroupAmountStore(Request $request){

        $store = new RadioGroupWithAmount();
        $store->event_id = $request->event_id;
        $store->field_id = $request->field_id;
        $store->radio_field_name = $request->radio_field_name;
        $store->radio_field_amount = $request->radio_field_amount;
        $store->save();

        
        $noti = array(
            'message'=>'successfully Stored',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($noti);
    }


    public function DynamicFieldRadioGroupAmountUpdate(Request $request){

        $store = RadioGroupWithAmount::where('id',$request->edit_id)->first();
        $store->event_id = $request->event_id;
        $store->field_id = $request->field_id;
        $store->radio_field_name = $request->radio_field_name;
        $store->radio_field_amount = $request->radio_field_amount;
        $store->save();

        
        $noti = array(
            'message'=>'successfully Update',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($noti);

    }

    public function DynamicFieldRadioGroupAmountDelete($id){

        RadioGroupWithAmount::where('id',$id)->delete();

        $noti = array(
            'message'=>'successfully Delete',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($noti);

    }


    public function DynamicFieldRadioGroupOnly($id,$event_id){

        $data['event_name'] = EventManage::where('id',$event_id)->first();
        $data['dynamic_field'] = DynamicField::where('id',$id)->first();

        $data['list'] = RadioGroupOnly::where('event_id',$event_id)->where('field_id',$id)->get();

        return view('Server.SuperAdmin.EventManage.RadioGroupOnly.list',$data);

    }

    public function DynamicFieldRadioGrouOnlytStore(Request $request){

        $store = new RadioGroupOnly();
        $store->event_id = $request->event_id;
        $store->field_id = $request->field_id;
        $store->radio_field_name = $request->radio_field_name;
        $store->save();

        
        $noti = array(
            'message'=>'successfully Stored',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($noti);
    }

    public function DynamicFieldRadioGroupOnlyUpdate(Request $request){

        $store =  RadioGroupOnly::where('id',$request->edit_id)->first();
        $store->event_id = $request->event_id;
        $store->field_id = $request->field_id;
        $store->radio_field_name = $request->radio_field_name;
        $store->save();

        
        $noti = array(
            'message'=>'successfully Update',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($noti);

    }


    public function DynamicFieldRadioGroupOnlyDelete($id){

        RadioGroupOnly::where('id',$id)->delete();

        
        
        $noti = array(
            'message'=>'successfully Delete',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($noti);

    }


    //---------------Radio Group Yes/No Amount------


    public function DynamicFieldRadioGroupYesNo($id,$event_id){

        $data['event_name'] = EventManage::where('id',$event_id)->first();
        $data['dynamic_field'] = DynamicField::where('id',$id)->first();

        $data['list'] = RadioGroupYesNo::where('event_id',$event_id)->where('field_id',$id)->get();

        return view('Server.SuperAdmin.EventManage.RadioGroupYesNo.list',$data);
    }


    public function DynamicFieldRadioGrouYesNoStore(Request $request){

        $store = new RadioGroupYesNo();
        $store->event_id = $request->event_id;
        $store->field_id = $request->field_id;
        $store->person_no = $request->person_no;
        $store->person_amount = $request->person_amount;
        $store->save();

        $noti = array(
            'message'=>'successfully store',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($noti);
    }

    public function DynamicFieldRadioGroupYesNoUpdate(Request $request){

        $store = RadioGroupYesNo::where('id',$request->edit_id)->first();
        $store->event_id = $request->event_id;
        $store->field_id = $request->field_id;
        $store->person_no = $request->person_no;
        $store->person_amount = $request->person_amount;
        $store->save();

        $noti = array(
            'message'=>'successfully Update',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($noti);
    }

    public function DynamicFieldRadioGroupYesNoDelete($id){

        RadioGroupYesNo::where('id',$id)->delete();

        
        $noti = array(
            'message'=>'successfully Delete',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($noti);
    }

    //---------------Select Option Drowpdown ----------

    public function DynamicFieldSelectOptionDrowpdown($id,$event_id){

        $data['event_name'] = EventManage::where('id',$event_id)->first();
        $data['dynamic_field'] = DynamicField::where('id',$id)->first();

        $data['list'] = SelectOptionDrowpdown::where('event_id',$event_id)->where('field_id',$id)->get();

        return view('Server.SuperAdmin.EventManage.SelectOptionDrowpdown.list',$data);
    }

    
    public function DynamicFieldSelectOptionDrowpdownStore(Request $request){

        $store = new SelectOptionDrowpdown();
        $store->event_id = $request->event_id;
        $store->field_id = $request->field_id;
        $store->option_value = $request->option_value;
        $store->save();

        $noti = array(
            'message'=>'successfully store',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($noti);
    }


    public function DynamicFieldSelectOptionDrowpdownUpdate(Request $request){

        $store = SelectOptionDrowpdown::where('id',$request->edit_id)->first();
        $store->event_id = $request->event_id;
        $store->field_id = $request->field_id;
        $store->option_value = $request->option_value;
        $store->save();

        $noti = array(
            'message'=>'successfully Update',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($noti);
    }



    public function DynamicFieldSelectOptionDrowpdownDelete($id){

        SelectOptionDrowpdown::where('id',$id)->delete();

        
        $noti = array(
            'message'=>'successfully Delete',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($noti);
    }


    //-------------Event Active and deactive ---------

    public function ActiveEvent($id){

        $active = EventManage::where('id',$id)->first();
        $active->status=2;
        $active->save();

        $noti = array(
            'message'=>'successfully Launch',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($noti);
    }

    public function DeactiveEvent($id){

        $active = EventManage::where('id',$id)->first();
        $active->status=1;
        $active->save();

        $noti = array(
            'message'=>'successfully Deactive',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($noti);
    }


}
