@extends('layout')
@section('title','Registro de información personal')
@section('css')
<style>
    :root {
        --bs-primary: #4634a5;
        --bs-primary-rgb: 70, 52, 165;
        --bs-success: #16866f;
        --bs-success-rgb: 22, 134, 111;
        --bs-body-color: #29283a;
        --bs-border-color: #e5e4ee;
        --page-ink: #25233a;
        --page-muted: #77758b;
        --page-accent: #f0a64a;
    }

    body {
        min-height: 100vh;
        background:
            radial-gradient(ellipse at 50% -15%, rgba(109, 87, 205, 0.13), transparent 48%),
            #f7f7fb;
        color: var(--page-ink);
        font-family: 'Instrument Sans', 'Segoe UI', sans-serif;
    }

    .container {
        max-width: 1080px;
    }

    .container > .row > .col-lg-8 {
        max-width: 760px;
    }

    .page-title {
        color: var(--page-ink) !important;
        font-size: clamp(1.8rem, 4vw, 2.5rem);
        font-weight: 750;
        letter-spacing: -0.045em;
        line-height: 1.15;
    }

    .page-title::after {
        display: block;
        width: 48px;
        height: 4px;
        margin: 1rem auto 0;
        border-radius: 99px;
        background: var(--page-accent);
        content: '';
    }

    .page-subtitle {
        max-width: 520px;
        margin-right: auto;
        margin-left: auto;
        color: var(--page-muted) !important;
        font-size: 1rem;
        line-height: 1.7;
    }

    .finance-card {
        overflow: hidden;
        border: 1px solid rgba(42, 38, 79, 0.08);
        border-radius: 1.1rem;
        background: #fff;
        box-shadow: 0 18px 55px rgba(37, 31, 78, 0.08) !important;
        transition: box-shadow 180ms ease, transform 180ms ease;
    }

    .finance-card:hover {
        box-shadow: 0 22px 62px rgba(37, 31, 78, 0.11) !important;
        transform: translateY(-2px);
    }

    .finance-card .card-body {
        padding: clamp(1.4rem, 5vw, 2.75rem);
    }

    .form-label {
        margin-bottom: 0.55rem;
        color: #35334b;
        font-weight: 600;
        font-size: 0.94rem;
    }

    .form-control {
        min-height: 48px;
        border-color: #e1dfeb;
        border-radius: 0.7rem;
        background-color: #fdfdff;
        color: var(--page-ink);
        transition: border-color 160ms ease, box-shadow 160ms ease, background-color 160ms ease;
    }

    .form-control:hover {
        border-color: #c9c4df;
    }

    .form-control:focus {
        border-color: #7665c5;
        background-color: #fff;
        box-shadow: 0 0 0 0.22rem rgba(89, 70, 174, 0.13);
    }

    .form-check {
        min-height: auto;
        margin-bottom: 0.45rem;
        padding: 0.7rem 0.75rem 0.7rem 2.2rem;
        border: 1px solid #eeedf3;
        border-radius: 0.7rem;
        background: #fcfcfe;
        transition: border-color 160ms ease, background-color 160ms ease;
    }

    .form-check:hover {
        border-color: #d6d1eb;
        background: #f8f7fc;
    }

    .form-check-input {
        margin-top: 0.2rem;
        margin-left: -1.45rem;
        border-color: #c7c4d4;
    }

    .form-check-input:focus {
        border-color: #7665c5;
        box-shadow: 0 0 0 0.2rem rgba(89, 70, 174, 0.14);
    }

    .form-check-input:checked {
        background-color: var(--bs-primary);
        border-color: var(--bs-primary);
    }

    .form-check-label {
        color: #57556a;
        cursor: pointer;
    }

    .btn-primary {
        --bs-btn-bg: #4634a5;
        --bs-btn-border-color: #4634a5;
        --bs-btn-hover-bg: #372783;
        --bs-btn-hover-border-color: #372783;
        --bs-btn-active-bg: #2e216f;
        --bs-btn-active-border-color: #2e216f;
        min-height: 52px;
        border-radius: 0.75rem;
        font-weight: 600;
        letter-spacing: 0.01em;
        box-shadow: 0 8px 18px rgba(70, 52, 165, 0.18);
        transition: background-color 160ms ease, box-shadow 160ms ease, transform 160ms ease;
    }

    .btn-primary:hover {
        box-shadow: 0 10px 22px rgba(70, 52, 165, 0.24);
        transform: translateY(-1px);
    }

    .results-card .card-header {
        padding: 1rem 1.4rem;
        border-bottom: 0;
        background: #16866f;
    }

    .results-card .card-header h5 {
        font-size: 1rem;
        font-weight: 650;
    }

    .results-card .card-body {
        color: #555368;
        line-height: 1.7;
    }

    .results-card .card-body p:last-child {
        margin-bottom: 0;
    }

    .results-card .card-body strong {
        color: var(--page-ink);
    }

    @media (max-width: 575.98px) {
        .container.py-5 {
            padding-top: 2.5rem !important;
            padding-bottom: 2.5rem !important;
        }

        .page-subtitle {
            margin-bottom: 2rem !important;
        }

        .finance-card .card-body {
            padding: 1.25rem;
        }
    }

    :root {
        --bs-primary: #b77b32;
        --bs-primary-rgb: 183, 123, 50;
        --bs-success: #337c70;
        --bs-success-rgb: 51, 124, 112;
        --page-ink: #202c36;
        --page-muted: #bbc4ca;
        --page-accent: #e8ad5b;
    }

    body {
        background:
            radial-gradient(ellipse at 50% 0%, rgba(72, 103, 112, 0.42), transparent 48%),
            linear-gradient(150deg, #172630 0%, #202f39 48%, #18252e 100%);
    }

    .container > .row > .col-lg-8 {
        max-width: 900px;
    }

    .page-title {
        color: #fff !important;
        font-size: clamp(1.9rem, 4vw, 2.65rem);
        letter-spacing: -0.035em;
    }

    .page-title::after {
        width: 58px;
        height: 3px;
        margin-top: 1.15rem;
        background: linear-gradient(90deg, #d08c3f, #f0c27d);
    }

    .page-subtitle {
        color: #c2cbd0 !important;
    }

    .finance-card {
        position: relative;
        border: 1px solid rgba(255, 255, 255, 0.65);
        border-radius: 1.25rem;
        box-shadow: 0 28px 75px rgba(5, 12, 17, 0.3) !important;
    }

    .finance-card::before {
        position: absolute;
        z-index: 1;
        top: 0;
        right: 0;
        left: 0;
        height: 5px;
        background: linear-gradient(90deg, #b77b32, #edc37e, #b77b32);
        content: '';
    }

    .finance-card:hover {
        box-shadow: 0 32px 82px rgba(5, 12, 17, 0.36) !important;
        transform: translateY(-3px);
    }

    .finance-card .card-body {
        padding: clamp(1.4rem, 5vw, 3rem);
    }

    .form-label {
        color: #35434c;
        font-size: 0.9rem;
        letter-spacing: 0.01em;
    }

    .form-control {
        min-height: 50px;
        border-color: #e1e5e6;
        border-radius: 0.65rem;
        background-color: #f8f9f8;
    }

    .form-control:hover {
        border-color: #d1b184;
    }

    .form-control:focus {
        border-color: #bd8541;
        box-shadow: 0 0 0 0.22rem rgba(183, 123, 50, 0.16);
    }

    .form-check {
        border-color: #e8e8e3;
        background: #fafaf8;
    }

    .form-check:hover {
        border-color: #dfc49e;
        background: #fffaf2;
    }

    .form-check-input:focus {
        border-color: #bd8541;
        box-shadow: 0 0 0 0.2rem rgba(183, 123, 50, 0.16);
    }

    .form-check-input:checked {
        background-color: #b77b32;
        border-color: #b77b32;
    }

    .form-check-label {
        color: #525f66;
    }

    .btn-primary {
        --bs-btn-bg: #a96f2d;
        --bs-btn-border-color: #a96f2d;
        --bs-btn-hover-bg: #8f5d26;
        --bs-btn-hover-border-color: #8f5d26;
        --bs-btn-active-bg: #7e5120;
        --bs-btn-active-border-color: #7e5120;
        min-height: 54px;
        border-radius: 0.7rem;
        box-shadow: 0 9px 20px rgba(169, 111, 45, 0.22);
    }

    .btn-primary:hover {
        box-shadow: 0 12px 25px rgba(169, 111, 45, 0.28);
    }

    .results-card .card-header {
        background: #337c70;
    }

    .results-card .card-body strong {
        color: #202c36;
    }

    @media (min-width: 768px) {
        #formularioBootstrap {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1.1rem 1.35rem;
        }

        #formularioBootstrap > div {
            min-width: 0;
            margin-bottom: 0 !important;
        }

        #formularioBootstrap > div:nth-child(7),
        #formularioBootstrap > div:nth-child(8) {
            grid-column: 1 / -1;
        }

        #formularioBootstrap > div:nth-child(5),
        #formularioBootstrap > div:nth-child(6) {
            align-self: stretch;
            padding: 1rem 1.1rem 0.7rem;
            border: 1px solid #e9e7df;
            border-radius: 0.85rem;
            background: #fbfaf7;
        }

        #formularioBootstrap > div:nth-child(5) .form-label,
        #formularioBootstrap > div:nth-child(6) .form-label {
            margin-bottom: 0.8rem;
        }
    }

    @media (max-width: 767.98px) {
        #formularioBootstrap > div:nth-child(5),
        #formularioBootstrap > div:nth-child(6) {
            padding: 0.8rem 0.85rem 0.55rem;
            border: 1px solid #e9e7df;
            border-radius: 0.85rem;
            background: #fbfaf7;
        }
    }
</style>
@stop

@section('content')
    <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h1 class="page-title text-center mb-3">Registro de información personal</h1>
            <p class="page-subtitle text-center mb-5">
                Interfaz clara y confiable, inspirada en la identidad visual del sector financiero.
            </p>
            <!-- Zona de resultados -->
                <div id="resultados" class="mt-5" style="display: none;">
                     <div class="card border-success finance-card results-card">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Respuestas seleccionadas</h5>
                </div>
        <div class="card-body" id="contenidoResultados"></div>
    </div>
</div>
            <div class="card finance-card">
    <div class="card-body p-4">
        <form id="formularioBootstrap">
            <!-- Nombres -->
            <div class="mb-3">
                <label for="nombres" class="form-label">Nombres</label>
                <input type="text" class="form-control" id="nombres" name="nombres" required>
            </div>

            <!-- Apellidos -->
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" required>
            </div>

            <!-- Fecha de nacimiento -->
            <div class="mb-3">
                <label for="fechaNacimiento" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
            </div>

            <!-- Cantidad de niños a cargo -->
            <div class="mb-3">
                <label for="ninos" class="form-label">Cantidad de niños a cargo</label>
                <input type="number" class="form-control" id="ninos" name="ninos" min="0" value="0" required>
            </div>
                <!-- Madre cabeza de familia -->
<div class="mb-3">
    <label class="form-label d-block">¿Es madre cabeza de familia?</label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="madreCabeza" id="madreSi" value="Sí">
        <label class="form-check-label" for="madreSi">Sí</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="madreCabeza" id="madreNo" value="No" checked>
        <label class="form-check-label" for="madreNo">No</label>
    </div>
</div>

<!-- Técnico o Tecnólogo -->
<div class="mb-3">
    <label class="form-label d-block">¿Está realizando un técnico o tecnólogo?</label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="estudio" id="estudioSi" value="Sí">
        <label class="form-check-label" for="estudioSi">Sí</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="estudio" id="estudioNo" value="No" checked>
        <label class="form-check-label" for="estudioNo">No</label>
    </div>
</div>

<!-- Géneros de cine -->
<div class="mb-4">
    <label class="form-label d-block">Géneros de cine que prefiere:</label>
    <div class="row">
        <div class="col-md-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="generos" value="Acción" id="accion">
                <label class="form-check-label" for="accion">Acción</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="generos" value="Comedia" id="comedia">
                <label class="form-check-label" for="comedia">Comedia</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="generos" value="Drama" id="drama">
                <label class="form-check-label" for="drama">Drama</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="generos" value="Terror" id="terror">
                <label class="form-check-label" for="terror">Terror</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="generos" value="Ciencia Ficción" id="scifi">
                <label class="form-check-label" for="scifi">Ciencia Ficción</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="generos" value="Romance" id="romance">
                <label class="form-check-label" for="romance">Romance</label>
            </div>
        </div>
    </div>
</div>

<!-- Botón de envío -->
<div class="d-grid">
    <button type="submit" class="btn btn-primary btn-lg">
        Enviar y mostrar respuestas
    </button>
</div>
        </form>
    </div>
</div>

        </div>
    </div>
</div>
@stop

@section('js')
<script>
    document.getElementById('formularioBootstrap').addEventListener('submit', function (e) {
        e.preventDefault(); // Previene la recarga de la página

        // Captura de valores
        const nombres = document.getElementById('nombres').value;
        const apellidos = document.getElementById('apellidos').value;
        const fecha = document.getElementById('fechaNacimiento').value;
        const ninos = document.getElementById('ninos').value;
        const madre = document.querySelector('input[name="madreCabeza"]:checked').value;
        const estudio = document.querySelector('input[name="estudio"]:checked').value;

        // Captura de múltiples checkboxes
        const generosSeleccionados = [];
        document.querySelectorAll('input[name="generos"]:checked').forEach(cb => {
            generosSeleccionados.push(cb.value);
        });

        const generosTexto = generosSeleccionados.length > 0
            ? generosSeleccionados.join(', ')
            : 'Ninguno seleccionado';

        // Estructura de datos a presentar
        const respuestas = [
            ['Nombres', nombres],
            ['Apellidos', apellidos],
            ['Fecha de nacimiento', fecha],
            ['Cantidad de niños a cargo', ninos],
            ['Madre cabeza de familia', madre],
            ['Está realizando técnico/tecnólogo', estudio],
            ['Géneros de cine preferidos', generosTexto]
        ];

        // Renderizado dinámico en el DOM
        const contenidoResultados = document.getElementById('contenidoResultados');
        contenidoResultados.replaceChildren(...respuestas.map(([etiqueta, valor]) => {
            const parrafo = document.createElement('p');
            const titulo = document.createElement('strong');
            titulo.textContent = `${etiqueta}:`;
            parrafo.append(titulo, ` ${valor}`);
            return parrafo;
        }));

        // Muestra el contenedor y desplaza la vista hacia los resultados
        document.getElementById('resultados').style.display = 'block';
        document.getElementById('resultados').scrollIntoView({
            behavior: 'smooth'
        });
    });
</script>
@stop