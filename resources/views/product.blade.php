@extends('layouts.app')

@section('content')

<header id="header">
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Posts<small>Manage Blog Posts</small></h1>
      </div>
      <div class="col-md-2">
        <div class="dropdown create">
          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Create Content
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a type="button" data-toggle="modal" data-target="#addPage">Add Page</a></li>
            <li><a href="#">Add Post</a></li>
            <li><a href="#">Add User</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>

<section id="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="index.html">Dashboard</a></li>
      <li class="active">Posts</li>
    </ol>
  </div>
</section>

<section id="main">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="list-group">
          <a href="index.html" class="list-group-item active main-color-bg">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
          </a>
          <a href="pages.html" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Pages <span class="badge">12</span></a>
          <a href="posts.html" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Posts <span class="badge">33</span></a>
          <a href="users.html" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users <span class="badge">203</span></a>
        </div>

        <div class="well">
          <h4>Disk Space Used</h4>
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
              60%
            </div>
          </div>
          <h4>Bandwidth Used </h4>
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
              40%
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <!-- Website Overview -->
        <div class="panel panel-default">
          <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Posts</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                <input class="form-control" type="text" placeholder="Filter Posts...">
              </div>
            </div>
            <br>
            <table class="table table-striped table-hover">
              <tr>
                <th>Product Name</th>
                <th>Product Quantity</th>
                <th>Product Price</th>
                <th>Total Price</th>
                <th>Created at</th>
                <th>Action</th>
              </tr>
              @foreach($products as $product)
              <tr>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_quantity }}</td>
                <td>{{ $product->product_price }}</td>
                <td>{{ $product->product_quantity * $product->product_price }}</td>
                <td>{{ date('D M Y', strtotime($product->created_at)) }}</td>
                <td class="d-flex">

                  <a class="btn btn-default" href="{{ route('product.edit', [ $product->id ]) }}">Edit</a>

                  <form action="{{ route('product.delete', [ $product->id ]) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" href="#">Delete</button>
                  </form>

                  <button type="reset"></button>
                </td>
              </tr>
              @endforeach
            </table>
            {{ $products->links() }}
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

@endsection