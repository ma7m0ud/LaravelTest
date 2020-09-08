@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">invoices</h1> 
    <div>
    <a style="margin: 19px;" href="{{ route('invoices.create')}}" class="btn btn-primary">New invoice</a>
    </div>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Item Name</td>
          <td>description</td>
          <td>item price</td>
          <td>quantity</td>
          <td>line total</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($Invoices as $invoice)
        <tr>
            <td>{{$invoice->id}}</td>
            <td>{{$invoice->item_name}} </td>
            <td>{{$invoice->description}}</td>
            <td>{{$invoice->item_price}}</td>
            <td>{{$invoice->quantity}}</td>
            <td>{{$invoice->line_total}}</td>
            <td>
                <a href="{{ route('invoices.edit',$invoice->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('invoices.destroy', $invoice->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>


</div>
<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
@endsection