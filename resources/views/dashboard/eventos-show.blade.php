@extends('dashboard.layouts.user_type.auth')

@section('content')
<div class="row mb-4">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card"><div class="card-body p-3"><p class="text-sm mb-0 text-capitalize font-weight-bold">Evento</p><h5 class="font-weight-bolder mb-0">{{ $event->name }}</h5></div></div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card"><div class="card-body p-3"><p class="text-sm mb-0 text-capitalize font-weight-bold">Convidados</p><h5 class="font-weight-bolder mb-0">{{ $totalGuests }}</h5></div></div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card"><div class="card-body p-3"><p class="text-sm mb-0 text-capitalize font-weight-bold">Presentes</p><h5 class="font-weight-bolder mb-0">{{ $totalGifts }}</h5></div></div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card"><div class="card-body p-3"><p class="text-sm mb-0 text-capitalize font-weight-bold">Status</p><h5 class="font-weight-bolder mb-0">{{ $event->is_active ? 'Ativo' : 'Inativo' }}</h5></div></div>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success mx-3">{{ session('success') }}</div>
@endif

<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header pb-0"><h6>Confirmacao de presenca</h6></div>
            <div class="card-body">
                <form method="POST" action="{{ route('dashboard.eventos.guests.store', $event) }}">
                    @csrf
                    <div class="mb-3"><label class="form-label">Nome completo</label><input type="text" name="full_name" class="form-control" required></div>
                    <div class="mb-3"><label class="form-label">Acompanhantes</label><input type="number" min="0" max="10" name="companions_count" class="form-control" value="0" required></div>
                    <button class="btn bg-gradient-primary mb-0" type="submit">Adicionar convidado</button>
                </form>

                <hr>
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead><tr><th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th><th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Acompanhantes</th><th></th></tr></thead>
                        <tbody>
                            @forelse ($guests as $guest)
                                <tr>
                                    <td><p class="text-xs font-weight-bold mb-0 px-3">{{ $guest->full_name }}</p></td>
                                    <td><p class="text-xs font-weight-bold mb-0">{{ $guest->companions_count }}</p></td>
                                    <td class="text-end pe-3">
                                        <form method="POST" action="{{ route('dashboard.eventos.guests.destroy', [$event, $guest]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-link text-danger mb-0" type="submit">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="3" class="text-center py-3"><span class="text-secondary text-xs">Nenhum convidado.</span></td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header pb-0"><h6>Sugestao de presentes</h6></div>
            <div class="card-body">
                <form method="POST" action="{{ route('dashboard.eventos.gifts.store', $event) }}">
                    @csrf
                    <div class="mb-2"><label class="form-label">Nome</label><input type="text" name="name" class="form-control" required></div>
                    <div class="mb-2"><label class="form-label">Categoria</label><input type="text" name="category" class="form-control" required></div>
                    <div class="mb-2"><label class="form-label">Descricao</label><textarea name="description" class="form-control" rows="2"></textarea></div>
                    <div class="form-check form-switch mb-2"><input class="form-check-input" type="checkbox" name="received" value="1" id="receivedNew"><label class="form-check-label" for="receivedNew">Recebido</label></div>
                    <div class="mb-3"><label class="form-label">Presenteado por</label><input type="text" name="gifted_by" class="form-control"></div>
                    <button class="btn bg-gradient-primary mb-0" type="submit">Adicionar presente</button>
                </form>

                <hr>
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead><tr><th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Item</th><th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th><th></th></tr></thead>
                        <tbody>
                            @forelse ($gifts as $gift)
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0 px-3">{{ $gift->name }}</p>
                                        <p class="text-xs text-secondary mb-0 px-3">{{ $gift->category }}{{ $gift->gifted_by ? ' · ' . $gift->gifted_by : '' }}</p>
                                    </td>
                                    <td><span class="badge badge-sm {{ $gift->received ? 'bg-gradient-success' : 'bg-gradient-secondary' }}">{{ $gift->received ? 'Recebido' : 'Disponivel' }}</span></td>
                                    <td class="text-end pe-3">
                                        <form method="POST" action="{{ route('dashboard.eventos.gifts.destroy', [$event, $gift]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-link text-danger mb-0" type="submit">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="3" class="text-center py-3"><span class="text-secondary text-xs">Nenhum presente.</span></td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
