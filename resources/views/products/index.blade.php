@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Produtos
                    <a href="/products/create" class="float-right btn btn-success">Novo Produto</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        @include('layouts._sidebar')

                        <div class="col-md-9">
                            <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Preço</th>
                                    <th>Ações</th>
                                </tr>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->nome }}</td>
                                    <td>{{ $product->valor }}</td>
                                    <td>
                                        <a href="/products/{{ $product->id }}/edit" id="'edit-{{ $product->id }}" class="float-left">
                                            <i class="fa fa-pencil btn btn-warning"></i>
                                        </a>
                                        
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $product->id], 'onSubmit' => "return confirm('Você confirma a exclusão do item: $product->nome');", 'class' => ' float-left']) !!}
                                            <button type="submit" class="fa fa-trash btn btn-danger" id="delete-{{ $product->id }}"></button>
                                        {!! Form::close() !!}
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
