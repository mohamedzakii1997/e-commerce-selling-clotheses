@include('admin.header')


@include('admin.sidebar')


<div id="content">
        <div id="content-header">
          <div id="breadcrumb"> <a href="{{ route('dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="#" class="tip-bottom">Edit User</a> <a href="#" class="current">Common elements</a> </div>
          <h1></h1>
        </div>
        <div class="container-fluid">
          <hr>
          <div class="row-fluid">
            <div class="span6">
              <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                  <h5>Personal-info</h5>
                </div>
                <div class="widget-content nopadding">
                  <form action="{{ url('/updateuser/'.$user->id) }}" method="post" class="form-horizontal">
                      @csrf
                    <div class="control-group">
                      <label class="control-label">Costomer Name :</label>
                      <div class="controls">
                        <input type="text" class="span11" placeholder=" name" name="name" value="{{ $user->name }}"/>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Email :</label>
                      <div class="controls">
                        <input type="email" class="span11" placeholder="email" name="email" value="{{ $user->email }}" />
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Password </label>
                      <div class="controls">
                        <input type="password"  class="span11" placeholder="Enter Password" name="password"   />
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Address :</label>
                      <div class="controls">
                        <input type="text" class="span11" name="address" placeholder=" address" value="{{ $user->address }}" />
                      </div>
                    </div>
                    <div class="control-group">
                            <label class="control-label">Phone :</label>
                            <div class="controls">
                              <input type="text" class="span11" name="phone" placeholder="phone" value="{{ $user->phone }}" />
                            </div>
                          </div>
                    
                    <div class="form-actions">
                      <button type="submit" class="btn btn-success">Save</button>
                    </div>
                  </form>
                </div>
              </div>





@include('admin.footer')