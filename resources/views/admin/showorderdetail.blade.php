@include('admin.header')


@include('admin.sidebar')



<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Products</a> <a href="#" class="current">Tables</a>
    
    </div>
 
      <h1>Products Data</h1>
      
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
                <th>Product Name</th>
             
                <th>Product Description</th>
                <th>Product Price</th>
                <th>Product Rate</th>
                <th>Product Image</th>
                <th>Product Quantity</th>
              </tr>
            </thead>
            <tbody>
                @foreach($order->product as $product)
              <tr class="gradeX">
                <td>{{ $product->product->id }}</td>
                <td>{{ $product->product->name }}
                  </td>
                  
               
                <td class="center">{{ $product->product->description }} </td>
                <td class="center">{{ $product->product->price }} </td>
                <td class="center">{{ $product->product->rate }} </td>
                <td><img style="width: 100px;height: 100px" src="{{ url('products/'.$product->product->id.'/getImage') }}"></td>
                <td class="center">{{ $product->quantity }} </td>
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