@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Novo Produtos                    
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => "/products/$product->id", 'method' => 'put']) !!}
                        
                    <div class="form-group row">
                            {{ Form::label('nome', 'Nome', ['class' => 'col-sm-2 col-form-label']) }}
                            <div class="col-sm-10">
                                {{ Form::text('nome', $product->nome, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            {{ Form::label('valor', 'Valor', ['class' => 'col-sm-2 col-form-label']) }}
                            <div class="col-sm-10">
                                {{ Form::text('valor', $product->valor, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-12">
                                {{ Form::submit('Salvar', ['class' => 'btn btn-success float-right']) }}
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
