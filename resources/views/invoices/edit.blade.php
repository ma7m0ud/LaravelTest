@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a invoice</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('invoices.update', $invoice->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="item_name">item name:</label>
                <input type="text" class="form-control" name="item_name" value={{ $invoice->item_name }} />
            </div>

            <div class="form-group">
                <label for="description">description:</label>
                <input type="text" class="form-control" name="description" value={{ $invoice->description }} />
            </div>

            <div class="form-group">
                <label for="item_price">item price:</label>
                <input type="text" class="form-control" name="item_price" value={{ $invoice->item_price }} />
            </div>
            <div class="form-group">
                <label for="quantity">quantity:</label>
                <input type="text" class="form-control" name="quantity" value={{ $invoice->quantity }} />
            </div>
            <div class="form-group">
                <label for="line_total">line total:</label>
                <input type="text" class="form-control" name="line_total" value={{ $invoice->line_total }} />
            </div>
           <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection