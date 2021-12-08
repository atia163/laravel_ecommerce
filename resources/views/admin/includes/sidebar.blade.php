<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('assets/admin')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/admin')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
 <!-----dashboard-->
          <li class="nav-item has-treeview menu-open">
            <a href="{{url('dashboard')}}" class="nav-link {{request()->is('dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
<!------ category------>
          <li class="nav-item has-treeview {{request()->is('admin/category/*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link ">

            <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="{{route('admin.addCategory')}}" class="nav-link {{request()->is('admin/category/add-category','admin/category/edit-category/*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.viewCategory')}}" class="nav-link {{request()->is('admin/category/view-category') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Category</p>
                </a>
              </li>
            </ul>
          </li>

<!----------subcategory--------------->
          <li class="nav-item has-treeview {{request()->is('admin/subcategory/*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
               SubCategory
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="{{route('admin.addSubCategory')}}" class="nav-link {{request()->is('admin/subcategory/add-subcategory','admin/subcategory/edit-subcategory/*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add SubCategory</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.viewSubCategory')}}" class="nav-link {{request()->is('admin/subcategory/view-subcategory') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View SubCategory</p>
                </a>
              </li>
            </ul>
          </li>



<!--------- brands--------->

          <li class="nav-item has-treeview {{request()->is('admin/subcategory/*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>

          Brand
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="{{route('admin.addBrand')}}" class="nav-link {{request()->is('admin/brand/add-brand','admin/brand/edit-brand/*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Brand</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.viewBrand')}}" class="nav-link {{request()->is('admin/brand/view-brand') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Brand</p>
                </a>
              </li>
            </ul>
          </li>
    <!-- color sidebar -->

    <li class="nav-item has-treeview {{request()->is('admin/color/*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>

          Color
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="{{route('admin.addColor')}}" class="nav-link {{request()->is('admin/color/add-color','admin/color/edit-color/*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Color</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.viewColor')}}" class="nav-link {{request()->is('admin/color/view-color') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Color</p>
                </a>
              </li>
            </ul>
          </li>

  <!-----Size-------------->


  <li class="nav-item has-treeview {{request()->is('admin/size/*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>

          Size
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="{{route('admin.addSize')}}" class="nav-link {{request()->is('admin/size/add-size','admin/size/edit-size/*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Size</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.viewSize')}}" class="nav-link {{request()->is('admin/size/view-size') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Size</p>
                </a>
              </li>
            </ul>
          </li>

<!-----------product sidebar------------------>

<li class="nav-item has-treeview {{request()->is('admin/product/*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>

          Products
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="{{route('admin.addproduct')}}" class="nav-link {{request()->is('admin/product/add-product','admin/product/edit-product/*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.viewproduct')}}" class="nav-link {{request()->is('admin/product/view-product') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View product</p>
                </a>
              </li>
            </ul>
          </li>





       </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>