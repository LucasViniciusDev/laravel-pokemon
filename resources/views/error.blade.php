@extends('layout.app')

@section('body')
<div class="row mt-2">
    <div class="col-12">
        <div class="card text-white bg-danger mb-3">
            <div class="card-header">Ocorreu um erro</div>
            <div class="card-body">
                <h5 class="card-title">Desculpe, tivemos um problema</h5>
                <p class="card-text">
                    <p>Mensagem: {{ $error->message }}</p>
                    <p>Code: {{ $error->code }}</p>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
