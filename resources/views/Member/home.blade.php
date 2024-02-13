@extends('Member.master')
@section('content')

<div class="row">
    <div class="col-xl-12 col-xxl-12">
      <div class="row">
        <div class="col-xl-12">
          <div class="card plan-list">
            <div class="card-header d-sm-flex flex-wrap d-block pb-0 border-0">
              <div class="mr-auto pr-3 mb-3">
                <h4 class="text-black fs-20">Event Category List</h4>
               
              </div>
              <div class="card-action card-tabs mr-4 mt-3 mt-sm-0 mb-3">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#Avaiable" role="tab" aria-selected="false">Avaiable Envet Category</a>
                  </li>
                 
                </ul>
              </div>
             
            </div>
            <div class="card-body tab-content pt-2">

              <div class="tab-pane active show fade" id="Avaiable">
                  @foreach(@$avaiable_event as $key=>$av)

                  @php
                  $modal_find = $av->event_table_name;
                  $ModalGenerate = str_replace('_','',$modal_find);
                  $columns = ['id','user_id','admin_status'];
                  $EvemtMemberApprovedListCount = app("App\\Models\\$ModalGenerate")::select($columns)->where('admin_status','2')->count();
                  $calculator_event = $av->total_seat - $EvemtMemberApprovedListCount;
                  @endphp

                 <div class="d-flex border-bottom flex-wrap pt-3 list-row align-items-center mb-2">
                    <div class="col-xl-5 col-xxl-8 col-lg-6 col-sm-8 d-flex align-items-center">
                        <div class="list-icon bgl-primary mr-3 mb-3">
                        <p class="fs-24 text-primary mb-0 mt-2">0</p>
                        <span class="fs-14 text-primary">Avaiable</span>
                        </div>
                        <div class="info mb-3">
                        <h4 class="fs-20 "><a href="workout-statistic.html" class="text-black">{{@$av->event_name}} </a></h4>
                        <span class="text-success font-w600">Event Close:({{@$av->short}})</span>
                       <br> <span class="text-danger font-w600">UNFINISHED</span>
                        </div>
                    </div>
                    <div class="col-xl-2 col-xxl-4 col-lg-2 col-sm-4 activities mb-3 mr-auto pl-3 pr-3 text-sm-center">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0)">
                            <path d="M0.988957 17.0741C0.328275 17.2007 -0.104585 17.8386 0.0219821 18.4993C0.133361 19.0815 0.644693 19.4865 1.21678 19.4865C1.29272 19.4865 1.37119 19.4789 1.44713 19.4637L6.4592 18.5018C6.74524 18.4461 7.0009 18.2917 7.18316 18.0639L9.33481 15.3503L8.61593 14.9832C8.08435 14.7149 7.71474 14.2289 7.58818 13.6391L5.55804 16.1983L0.988957 17.0741Z" fill="#FF9432"></path>
                            <path d="M18.84 6.49306C20.3135 6.49306 21.508 5.29854 21.508 3.82502C21.508 2.3515 20.3135 1.15698 18.84 1.15698C17.3665 1.15698 16.1719 2.3515 16.1719 3.82502C16.1719 5.29854 17.3665 6.49306 18.84 6.49306Z" fill="#FF9432"></path>
                            <path d="M13.0179 3.15677C12.7369 2.8682 12.4762 2.75428 12.1902 2.75428C12.0864 2.75428 11.9826 2.76947 11.8712 2.79479L7.29203 3.88073C6.6592 4.03008 6.26937 4.66545 6.41872 5.29576C6.54782 5.83746 7.02877 6.20198 7.56289 6.20198C7.65404 6.20198 7.74514 6.19185 7.8363 6.16907L11.7371 5.24513C11.9902 5.52611 13.2584 6.90063 13.4888 7.14364C11.8763 8.87002 10.2639 10.5939 8.65137 12.3202C8.62605 12.3481 8.60329 12.3759 8.58049 12.4038C8.10966 13.0037 8.25397 13.9454 8.96275 14.3023L13.9064 16.826L11.3397 20.985C10.9878 21.5571 11.165 22.3064 11.7371 22.6608C11.9371 22.7848 12.1573 22.843 12.375 22.843C12.7825 22.843 13.1824 22.638 13.4128 22.2659L16.6732 16.983C16.8529 16.6919 16.901 16.34 16.8074 16.0135C16.7137 15.6844 16.4884 15.411 16.1821 15.2566L12.8331 13.553L16.3543 9.78636L19.0122 12.0393C19.2324 12.2266 19.5032 12.3177 19.7716 12.3177C20.0601 12.3177 20.3487 12.2114 20.574 12.0038L23.6243 9.16112C24.1002 8.71814 24.128 7.97392 23.685 7.49803C23.4521 7.24996 23.1383 7.12339 22.8244 7.12339C22.5383 7.12339 22.2497 7.22717 22.0245 7.43728L19.7412 9.56107C19.7386 9.56361 14.0178 4.18196 13.0179 3.15677Z" fill="#FF9432"></path>
                        </g>
                        <defs>
                            <clipPath id="clip0">
                            <rect width="24" height="24" fill="white"></rect>
                            </clipPath>
                        </defs>
                        </svg>
                        <span class="text-warning ml-2">Running</span>
                    </div>
                    <div class="col-xl-5 col-xxl-12 col-lg-4 col-sm-12 d-flex align-items-center">
                        <a href="{{route('EventRegistration',@$av->slug)}}" target="_blank" class="btn mb-3 play-button rounded mr-3"><i class="las la-caret-right scale-2 mr-3"></i>Join Event</a>
                        
                    </div>
                    </div>

                    @endforeach

               
              </div>



            </div>
          </div>
        </div>
      </div>
    </div>


   

</div>


 



    @endsection