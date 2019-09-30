@include('admin.header')


@include('admin.sidebar')



<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Users</a> <a href="#" class="current">Tables</a>
    
    </div>
 
      <h1>Users Data</h1>
      
    </div>
    <br>
    
  
            @if(Session::has('sucsess'))

            <div class="alert alert-success" style="margin:18px;" role="alert">
                   {{ Session::get('sucsess') }}
                  </div>
            @endif

    <br>
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <h5>Data table</h5>
        </div>
        
        <div class="widget-content nopadding">
          <table class="table table-bordered data-table">
            <thead>
              <tr>
                <th>#</th>
                <th>Customer Name</th>
                <th>Customer Email</th>
                <th>Customer Phone</th>
                <th>Customer Adderss</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
              <tr class="gradeX">
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}
                  </td>
                <td>{{ $user->email }}</td>
                <td class="center">{{ $user->phone }} </td>
                <td class="center">{{ $user->address }} </td>
                <td> 
                        <a class="btn btn-warning" href="{{ url('/edituser/'.$user->id) }}"> Edit Customer</a> 
                          
                        <a class="btn btn-danger" href="{{ url('/deleteuser/'.$user->id) }}">Delete Customer</a>
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
</div>

@include('admin.footer')