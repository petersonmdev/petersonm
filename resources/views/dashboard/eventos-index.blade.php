@extends('dashboard.layouts.user_type.auth')

@section('content')

<div class="row mb-4">
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Eventos cadastrados</p>
                <h5 class="font-weight-bolder mb-0">{{ $totalEvents }}</h5>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Eventos ativos</p>
                <h5 class="font-weight-bolder mb-0">{{ $activeEvents }}</h5>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Eventos inativos</p>
                <h5 class="font-weight-bolder mb-0">{{ $inactiveEvents }}</h5>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        @if (session('success'))
            <div class="alert alert-success mx-3">{{ session('success') }}</div>
        @endif

        <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6>Eventos</h6>
                <a href="{{ route('dashboard.eventos.create') }}" class="btn bg-gradient-primary btn-sm mb-0">Novo evento</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Slug</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Criado em</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acoes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($events as $event)
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0 px-3">{{ $event->name }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">/{{ $event->slug }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if ($event->is_active)
                                            <span class="badge badge-sm bg-gradient-success">Ativo</span>
                                        @else
                                            <span class="badge badge-sm bg-gradient-secondary">Inativo</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $event->created_at->format('d/m/Y H:i') }}</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <a href="{{ route('dashboard.eventos.show', $event) }}" class="btn btn-link text-dark px-2 py-1 mb-0">Gerenciar</a>
                                        <a href="{{ route('dashboard.eventos.edit', $event) }}" class="btn btn-link text-info px-2 py-1 mb-0">Editar</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">
                                        <span class="text-secondary text-xs font-weight-bold">Nenhum evento cadastrado.</span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
