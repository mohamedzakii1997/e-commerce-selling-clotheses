@include('admin.header')





<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Products</a> <a href="#" class="current">Tables</a>
    
    </div>
 
      <h1>Orders Data</h1>
      
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
                <th>Order Status</th>
             
                <th>Customer Name</th>
                <th>Delevery Cost</th>
                <th>Total Cost</th>
                <th>Payment Method</th>
                <th>Order Address</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
              <tr class="gradeX">
                <td>{{ $order->id }}</td>
                <td>@if($order->status == 1)  
                    Still Deleveing
                    @else 
                    Finished
                    @endif
                  </td>
                  
               
                <td class="center">{{ $order->user->name }} </td>
                <td class="center">{{ $order->delevery_cost }} </td>
                <td class="center">{{ $order->price }} </td>
                <td class="center">{{ $order->payment_method }} </td>
                <td class="center">{{ $order->address }} </td>
               
                <td>   
                        <a class="btn btn-warning" href="{{ url('/orderdetails/'.$order->id) }}"> Order Details </a>
                        
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