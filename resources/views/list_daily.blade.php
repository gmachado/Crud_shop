@extends('layouts.app')

@section('content')
    <body> 
        <div class="container">
            <h1>Lista de Produtos</h1>
            <a class="btn btn-primary mb-3" href="/daily_form">Novo Produto!</a>
            <table class="table table-hover">
                <thead>
                    <tr> 
                        <th>valor</th>
                        <th>quantidade em estoque</th>
                        <th>nome</th>
                        <th>status</th>
                        <th>descrição</th>
                        <th>image</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($dailies) == 0)
                    <tr>
                        <td colspan="4"  class="text-center pt-5 pb-5"><h1>Oops! Don't send your product yet? OMG!</h1></td>
                    </tr>
                @endif
                @foreach ($dailies as $daily)
                    <tr> 
                        <td>{{ $daily->valor }}</td>
                        <td>{{ $daily->quantidade_estoque}}</td>
                        <td>{{ $daily->nome}}</td>
                        @if($daily->status == 1)
                        <td>visivel</td>
                        @else
                        <td>invisivel</td>
                        @endif
                        <td>{{ $daily->descricao }}</td>
                        @if($daily->image)
                             <td> <img src="{{ asset("storage/{$daily->image}") }}" alt="{{ $daily->nome }}" style="max-width: 100px;"></td>
                        @else
                            <td>null</td>
                        @endif
                        <td>
                        @if(Auth::user()->id == $daily->user_id)
                            <a href="/daily_edit/{{$daily->id}}">Editar</a>
                            <a href="/daily_delete/{{$daily->id}}">Apagar</a>
                        @endif
                        </td>
                    </tr> 
                @endforeach
                </tbody>
            </table>
                {{ $dailies->links() }}
        </div>
    </body>
  @endsection