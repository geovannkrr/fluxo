@extends('layouts.base')
@section('content')
    <h1>- LANCAMENTOS
        |
    <a class="btn btn-primary" href="{{route('lancamento.create')}}">
        novo lancamento
        </a>
</h1>
    <h2> {{ Auth::user()->name }}</h2>

    {{-- alerts --}}
    @include('layouts.partials.alerts')
    {{-- /alerts --}}

    {!! $lancamentos->links() !!}

    <div class="table-responsive">
        <table class="table table-striped  table-hover ">
            <thead>
                <caption>LISTA DE</caption>
                <tr>
                    <th>#</th>
                    <th>vencimento</th>
                    <th>tipo</th>
                    <th>valor</th>
                    <th>centro de custo</th>
                    <th>descricao</th>
                    <th>usuario</th>
                    <th>data do lancamento</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @forelse ($lancamentos as $lancamento )




                <tr>
                    <td scope="row" class="col-2">
                        <div class="flex-column">
                            {{-- ver --}}
                            <a class="btn btn-success" href="{{url('/storage/anexos/'.$lancamento->anexo)}}" target="_blank">
                                <i class="bi bi-paperclip"></i>
                            </a>
                            {{-- editar --}}
                            <a class="btn btn-dark" href="#">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            {{-- excluir --}}
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modalExcluir" data-identificacao="" data-url="">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                    <td>{{$lancamento->vencimento->format('d/m/Y')}}</td>
                    <td>{{$lancamento->tipo->tipo}}</td>
                    <td>{{$lancamento->valor}}</td>
                    <td>{{$lancamento->centroCusto->centro_custo}}</td>
                    <td>{{$lancamento->descricao}}</td>
                    <td>{{$lancamento->usuario->name}}</td>
                    <td>{{$lancamento->created_at->format('d/m/Y \a\s H:i')}}
                    {{-- / --}}
                    {{-- {{$lancamento->created_at->age}} anos --}}
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="8">
                                nenhum registro retornado
                        </td>

                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

{{-- Modal Excluir --}}
@include('layouts.partials.modalExcluir')
{{-- /Modal Excluir --}}
@endsection
@section('scripts')
@parent

@endsection
