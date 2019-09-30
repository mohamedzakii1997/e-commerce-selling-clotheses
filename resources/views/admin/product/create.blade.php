@include('admin.header')


@include('admin.sidebar')








<div id="content">
        <div id="content-header">
          <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="#" class="tip-bottom">Add Product</a> <a href="#" class="current">Common elements</a> </div>
          <h1></h1>
        </div>
        <div class="container-fluid">
            @if($errors->any())
            <div class="alert alert-danger" style="margin:18px;" role="alert">
             <ul>
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>

              @endforeach
            </ul>
            </div>
            @endif
          <hr>
          <div class="row-fluid">
            <div class="span6">
              <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                  <h5>Product-info   </h5>
                </div>
                <div class="widget-content nopadding">
                  <form action="{{ url('/products') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                      @csrf
                    <div class="control-group">
                      <label class="control-label">Product Name :</label>
                      <div class="controls">
                        <input type="text" class="span11" placeholder=" name" name="name"/>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Price :</label>
                      <div class="controls">
                        <input type="text" class="span11" placeholder="price" name="price"  />
                      </div>
                    </div>
                    <div class="controls">
                            <label class="control-label">Description :</label>
                            <textarea class="span11" name="desc"></textarea>
                          </div>

                          <div class="controls">
                                <label class="control-label">Image :</label>
                                <div class="uploader" id="uniform-undefined"><input type="file" name="image" size="19" style="opacity: 0;"><span class="filename">No file selected</span><span class="action">Choose Photo</span></div>
                              </div>

                         

                    
                    <div class="form-actions">
                      <button type="submit" class="btn btn-success">Save</button>
                    </div>
                  </form>
                </div>
              </div>





              <script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/bootstrap-colorpicker.js"></script> 
<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/jquery.toggle.buttons.js"></script> 
<script src="js/masked.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.form_common.js"></script> 
<script src="js/wysihtml5-0.3.0.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/bootstrap-wysihtml5.js"></script> 
<script>
	$('.textarea_editor').wysihtml5();
</script>
@include('admin.footer')