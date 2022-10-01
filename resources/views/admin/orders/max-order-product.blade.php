@extends('admin.layouts.master')
@section('main-content')
  <div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <h3 class="m-0">Maximum Order of Product</h3>
            <br>
            <div class="card">
              <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
              @endif
              @if(session('error'))
              <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <p class="text-primary">Maximum product order of the year 2022 is:</p>
            <div class="bg-warning">
                <p><b>Name:</b> {{ $summary->name }}</p>
                <p><b>Total Order:</b> {{ $summary->total_qty }}</p>
                <p><b>Order Total:</b> {{ $summary->total_amount }}</p>
            </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection
