@extends('dashboard.layouts.user_type.auth')

@section('content')

<div class="row mb-4">
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Convidados confirmados</p>
                <h5 class="font-weight-bolder mb-0">{{ $totalGuests }}</h5>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Acompanhantes</p>
                <h5 class="font-weight-bolder mb-0">{{ $totalCompanions }}</h5>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total previsto</p>
                <h5 class="font-weight-bolder mb-0">{{ $totalGuests + $totalCompanions }}</h5>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        @if (session('success'))
            <div class="alert alert-success mx-3">
                {{ session('success') }}
            </div>
        @endif
        <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6>Lista de confirmados - Cha de Casa Nova</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Acompanhantes</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Confirmado em</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acao</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($guests as $guest)
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0 px-3">{{ $guest->full_name }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $guest->companions_count }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $guest->created_at->format('d/m/Y H:i') }}</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <button type="button" class="btn btn-link text-danger text-gradient px-2 py-1 mb-0" data-bs-toggle="modal" data-bs-target="#deleteGuestModal{{ $guest->id }}">
                                            Excluir
                                        </button>

                                        <div class="modal fade" id="deleteGuestModal{{ $guest->id }}" tabindex="-1" aria-labelledby="deleteGuestModalLabel{{ $guest->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteGuestModalLabel{{ $guest->id }}">Confirmar exclusao</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Deseja realmente excluir a confirmacao de <strong>{{ $guest->full_name }}</strong>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                        <form method="POST" action="{{ route('dashboard.cha-de-casa-nova-convidados.destroy', $guest) }}" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn bg-gradient-danger mb-0">Excluir</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4">
                                        <span class="text-secondary text-xs font-weight-bold">Nenhuma confirmacao registrada.</span>
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
