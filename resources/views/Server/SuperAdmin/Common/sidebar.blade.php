   <div class="br-sideleft overflow-y-auto">
      <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
      <div class="br-sideleft-menu">
        <a href="{{ route('home') }}" class="br-menu-link active">
          <div class="br-menu-item">
            <i class="menu-item-icon fa fa-home " style="font-size: 16px;"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->


             
        <a href="#" class="br-menu-link">
          <div class="br-menu-item">
            <i class="menu-item-icon fa fa-file" style="font-size: 16px"></i>
            <span class="menu-item-label">Event Category Manage</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route('CreateEvent') }}" class="nav-link">Create Category</a></li>
          <li class="nav-item"><a href="{{ route('AllEvent') }}" class="nav-link">All Category</a></li>
       
        </ul>

             
        <a href="#" class="br-menu-link">
          <div class="br-menu-item">
            <i class="menu-item-icon fa fa-file" style="font-size: 16px"></i>
            <span class="menu-item-label">All Register User</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          @foreach(App\Models\EventManage::where('dynamic_table','yes')->get() as $key=>$event)
          <li class="nav-item"><a href="{{ route('AllEventListShow',@$event->id) }}" class="nav-link">{{@$event->event_name}}</a></li>

          @endforeach
          <!-- <li class="nav-item"><a href="{{ route('AllEvent') }}" class="nav-link">All Event</a></li> -->
       
        </ul>



      </div><!-- br-sideleft-menu -->



      <br>
    </div>