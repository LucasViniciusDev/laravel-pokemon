@extends('layout.app')

@section('body')
<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <input id="input-pokemon" type="text" class="form-control" placeholder="Nome do Pokemon">
            </div>
        </div>
    </div>
    <div class="col-12 mt-2">
        <div class="table-responsive">
            <table id="table-pokemon" class="table table-sm table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Pokemon</th>
                        <th scope="col">Nome</th>
                        <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data->pokemons as $pokemon)
                    <tr>
                        <td>
                            <img src="{{ $pokemon->sprites->front_default }}" alt="Pokemon" width="96">
                        </td>
                        <td style="font-weight: bold;">{{ $pokemon->name }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm btn-view" title="Visualizar" data-name="{{ $pokemon->name }}">
                                <i class="fa fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-12">
        <nav aria-label="...">
            <ul class="pagination pagination-sm">
                <li class="page-item"><a class="page-link" href="{{ \config('app.url') . '/pokemons?page=1' }}">Primeiro</a></li>

                @for ($i = $data->current_page; $i < ($data->current_page+10); $i++)
                    @if ($i < $data->total_pages)
                        @if ($i == $data->current_page)
                            <li class="page-item active" aria-current="page">
                                <span class="page-link">
                                    {{ $i }} <span class="sr-only">(current)</span>
                                </span>
                            </li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ \config('app.url') . '/pokemons?page=' . $i }}">{{ $i }}</a></li>
                        @endif
                    @endif
                @endfor

                <li class="page-item"><a class="page-link" href="{{ \config('app.url') . '/pokemons?page=' . $data->total_pages }}">Ultimo</a></li>
            </ul>
        </nav>
    </div>
    <div class="col-12">
        <span>Página {{ $data->current_page }} de {{ $data->total_pages }}</span>
    </div>
</div>

<script>
    $(document).ready(() => {
        Pokemons.init()
    })

    const Pokemons = {
        appUrl: '',

        init: () => {
            this.appUrl = $('#app-url').val()

            $('#input-pokemon').on('keyup', function() {
                let value = $(this).val().toLowerCase()
                $('#table-pokemon tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                })
            })

            $('.btn-view').on('click', function () {
                Pokemons.getByName($(this).data().name)
            })
        },

        getByName: (name) => {
            let url = appUrl + `/pokemons/${name}`
            location.href = url
        }
    }
</script>
@endsection
