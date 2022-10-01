<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/shopping.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/admin" class="d-block text-light">Admin Home</a>
        </div>
      </div>
  
          <li class="nav-item">
            <a href="{{ route('categories.index') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
                Categories
            </a>
            <a href="{{ route('products.index') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
                Products
            </a>

            <a href="{{ route('orders.index') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
                Orders
            </a>

            <a href="{{ route('orders.max-order-product') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
                Max Order Product
            </a>
          </li>

    </div>
  </aside>