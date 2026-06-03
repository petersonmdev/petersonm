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
                <h6>Novo evento</h6>
                <p class="text-sm mb-0">Slug sera gerado automaticamente a partir do nome.</p>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('dashboard.eventos.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nome da pagina principal</label>
                        <input type="text" name="name" class="form-control" maxlength="120" required value="{{ old('name') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Upload style.css (opcional)</label>
                        <input type="file" name="style_css" class="form-control" accept=".css,text/css">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Upload layout.blade.php (opcional)</label>
                        <input type="file" name="layout_blade" class="form-control" accept=".php,.blade.php,.txt">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Upload page-nome-do-evento.blade.php (opcional)</label>
                        <input type="file" name="page_blade" class="form-control" accept=".php,.blade.php,.txt">
                    </div>

                    <button type="submit" class="btn bg-gradient-primary mb-0">Criar evento</button>
                    <a href="{{ route('dashboard.eventos.index') }}" class="btn btn-outline-secondary mb-0">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
