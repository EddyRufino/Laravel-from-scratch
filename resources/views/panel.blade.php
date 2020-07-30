@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Panel</div>

                <div class="card-body">
                    <li class="list-group">
                        <a class="list-group-item" href="{{ route('products.index') }}">
                            Manage Products
                        </a>
                    </li>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
