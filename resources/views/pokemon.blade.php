@extends('layout.app')

@section('body')
<style>
    .bold {
        font-weight: bold;
    }
</style>

<div class="row mt-2">
    <div class="col-12">
        <div class="row justify-content-center">
            <img src="{{ $pokemon->sprites->front_default }}" alt="pokemon" width="200">
        </div>
        <div class="row justify-content-center">
            <div class="alert alert-success" role="alert"><h5>{{ $pokemon->name }}</h5></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-8 col-lg-5">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="bold">Experiência:</td>
                                <td>{{ $pokemon->base_experience }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-12 col-md-8 col-lg-5">
                        <div class="alert alert-success" role="alert"><span>Habilidades</span></div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-12 col-md-8 col-lg-5">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th></th>
                                    <th>Escondido?</th>
                                </thead>
                                <tbody>
                                    @foreach ($pokemon->abilities as $ability)
                                    <tr>
                                        <td>{{ $ability->ability->name }}</td>
                                        @if ($ability->is_hidden)
                                        <td><i class="fa fa-check text-success"></i></td>
                                        @else
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-12 col-md-8 col-lg-5">
                        <div class="alert alert-success" role="alert"><span>Estatísticas</span></div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-12 col-md-8 col-lg-5">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <thead>
                                        <th></th>
                                        <th>Base</th>
                                        <th>Esforço</th>
                                    </thead>
                                    @foreach ($pokemon->stats as $stat)
                                    <tr>
                                        <td>{{ $stat->stat->name }}</td>
                                        <td>{{ $stat->base_stat }}</td>
                                        <td>{{ $stat->effort }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-12 col-md-8 col-lg-5">
                        <div class="alert alert-success" role="alert"><span>Tipos</span></div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-12 col-md-8 col-lg-5">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    @foreach ($pokemon->types as $type)
                                    <tr>
                                        <td>{{ $type->type->name }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-12 col-md-8 col-lg-5">
                        <div class="alert alert-success" role="alert"><span>Formas</span></div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-12 col-md-8 col-lg-5">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    @foreach ($pokemon->forms as $form)
                                    <tr>
                                        <td>{{ $form->name }}</td>
                                        <td>
                                            <img src="{{ $form->sprites->front_default }}" alt="Pokemon">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-2 mb-2">
            <button id="btn-voltar" class="btn btn-success">
                <i class="fa fa-arrow-left"></i>
                Voltar
            </button>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
        Pokemons.init()
    })

    const Pokemons = {
        init: () => {
            $('#btn-voltar').on('click', () => {
                history.back()
            })
        }
    }
</script>
@endsection
