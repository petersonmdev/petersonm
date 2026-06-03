@extends('dashboard.layouts.user_type.auth')

@section('content')
<div class="row">
    <div class="col-12">
        @if ($errors->any())
            <div class="alert alert-danger text-white">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Editar evento</h6>
                <p class="text-sm mb-0">Slug da rota: /{{ $event->slug }}</p>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('dashboard.eventos.update', $event) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nome da pagina principal</label>
                        <input type="text" name="name" class="form-control" maxlength="120" required value="{{ old('name', $event->name) }}">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="activeSwitch" name="is_active" value="1" {{ old('is_active', $event->is_active ? 1 : 0) ? 'checked' : '' }}>
                        <label class="form-check-label" for="activeSwitch">Evento ativo (desmarque para deixar rotas indisponiveis)</label>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Substituir style.css (opcional)</label>
                        <input type="file" name="style_css" class="form-control" accept=".css,text/css">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Substituir layout.blade.php (opcional)</label>
                        <input type="file" name="layout_blade" class="form-control" accept=".php,.blade.php,.txt">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Substituir page-nome-do-evento.blade.php (opcional)</label>
                        <input type="file" name="page_blade" class="form-control" accept=".php,.blade.php,.txt">
                    </div>

                    <button type="submit" class="btn bg-gradient-primary mb-0">Salvar alteracoes</button>
                    <a href="{{ route('dashboard.eventos.show', $event) }}" class="btn btn-outline-secondary mb-0">Voltar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
