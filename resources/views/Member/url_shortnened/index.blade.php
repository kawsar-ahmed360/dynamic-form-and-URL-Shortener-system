@extends('Member.master')
@section('title') All Url List @endsection
@section('content')


    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">All Url List</a></li>
        </ol>
    </div>
    <!-- row -->

    <div class="row">

        <div class="col-12">
           
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Url List Datatable 
                     
                </h4>
                <button class="btn btn-success btn-sm" style="float: right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Add</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display min-w850">
                            <thead>
                            <tr>
                               
                                <th>Sl</th>

                                <th>Original Url</th>
                                <th>Short Code Url</th>
                                <th>Visitor Count</th>
                               

                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                  
                            
                           @foreach (@$list as $key=>$l)
                               
                          
                            <tr>
                          
                                <td>{{$key+1}}</td>

                                <td>{{$l->original_url}}</td>
                                <td> <a href="https/uSER/{{ $l->shortened_url }}">{{$l->shortened_url}}</a> </td>
                                <td>{{$l->visitor??0}}</td>
               
                               

                                <td>
                                    <div class="d-flex">

                                        <a href="{{route('UrlDelete',$l->id)}}"  class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>

                                    </div>
                                </td>
                            </tr>

                            @endforeach

                      



                           


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">URL Shortener</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        
        <form action="{{route('UrlListPost')}}" method="post">
            @csrf

            <div class="row">
              <div class="col-md-12">
                <label for="">Url</label>
                <input type="text" class="form-control" name="original_url" placeholder="Enter Url">
              </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
        </form>

        </div>
       
      </div>
    </div>
  </div>


@section('footer')

@endsection

    @endsection