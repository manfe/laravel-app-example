@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <div class="row">
                        @include('layouts._sidebar')

                        <div class="col-md-9">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <h1>Painel de Controle</h1>

                            <p>Aqui iria informações relevantes...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
