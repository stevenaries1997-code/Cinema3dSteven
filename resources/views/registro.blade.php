@extends('layout')
@section('title', 'Registro de información personal')
@section('css')
<style>
    :root {
        --cinema-ink: #20212b;
        --cinema-muted: #747583;
        --cinema-paper: #f4f1eb;
        --cinema-accent: #ef624b;
        --cinema-border: #e8e6e1;
    }

    body {
        min-height: 100vh;
        background: var(--cinema-paper);
        color: var(--cinema-ink);
        font-family: 'Instrument Sans', 'Segoe UI', sans-serif;
    }

    .page-wrap {
        max-width: 1040px;
        padding-top: clamp(1.5rem, 5vw, 4rem);
        padding-bottom: 4rem;
    }

    .page-hero {
        position: relative;
        display: flex;
        min-height: 245px;
        align-items: center;
        justify-content: space-between;
        overflow: hidden;
        gap: 2rem;
        margin-bottom: 1.5rem;
        padding: clamp(1.75rem, 5vw, 3.5rem);
        border-radius: 1.5rem;
        background: #24232c;
        color: #fff;
        box-shadow: 0 18px 45px rgba(32, 33, 43, 0.14);
    }

    .page-hero::after {
        position: absolute;
        right: 14%;
        bottom: -115px;
        width: 280px;
        height: 280px;
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 50%;
        content: '';
        pointer-events: none;
    }

    .hero-copy {
        position: relative;
        z-index: 1;
        max-width: 590px;
    }

    .eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1rem;
        color: #ffc0ae;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.14em;
        text-transform: uppercase;
    }

    .eyebrow::before {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: var(--cinema-accent);
        content: '';
    }

    .page-title {
        margin-bottom: 0.8rem;
        color: #fff;
        font-size: clamp(2rem, 5vw, 3.25rem);
        font-weight: 750;
        letter-spacing: -0.055em;
        line-height: 1.08;
    }

    .page-subtitle {
        max-width: 480px;
        margin-bottom: 0;
        color: #c7c5ce;
        font-size: 1rem;
        line-height: 1.7;
    }

    .hero-ticket {
        position: relative;
        z-index: 1;
        display: grid;
        width: 132px;
        height: 150px;
        flex: 0 0 132px;
        align-content: center;
        justify-items: center;
        gap: 0.35rem;
        border: 1px dashed rgba(255, 255, 255, 0.42);
        border-radius: 1rem;
        background: rgba(255, 255, 255, 0.06);
        color: #ffc0ae;
        transform: rotate(7deg);
    }

    .hero-ticket span {
        font-size: 0.65rem;
        font-weight: 700;
        letter-spacing: 0.17em;
    }

    .hero-ticket strong {
        color: #fff;
        font-size: 2rem;
        letter-spacing: -0.08em;
    }

    .form-card,
    .results-card {
        overflow: hidden;
        border: 1px solid var(--cinema-border);
        border-radius: 1.35rem;
        background: #fff;
        box-shadow: 0 12px 36px rgba(32, 33, 43, 0.06);
    }

    .form-card {
        padding: clamp(1.35rem, 4vw, 2.75rem);
    }

    .form-section {
        min-width: 0;
        margin: 0;
        padding: 0;
        border: 0;
    }

    .form-section + .form-section {
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid var(--cinema-border);
    }

    .section-heading {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        margin-bottom: 0.35rem;
        font-size: 1.15rem;
        font-weight: 700;
        letter-spacing: -0.025em;
    }

    .section-number {
        display: inline-grid;
        width: 32px;
        height: 32px;
        flex: 0 0 32px;
        place-items: center;
        border-radius: 50%;
        background: #fff0eb;
        color: #c84936;
        font-size: 0.8rem;
        font-weight: 750;
    }

    .section-hint {
        margin: 0 0 1.25rem 2.8rem;
        color: var(--cinema-muted);
        font-size: 0.9rem;
    }

    .field-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 1.15rem;
    }

    .field {
        min-width: 0;
    }

    .form-label {
        margin-bottom: 0.5rem;
        color: #393945;
        font-size: 0.9rem;
        font-weight: 650;
    }

    .form-control {
        min-height: 50px;
        border: 1px solid #dedde2;
        border-radius: 0.75rem;
        background: #fbfaf8;
        color: var(--cinema-ink);
    }

    .form-control:hover {
        border-color: #c9c6ca;
    }

    .form-control:focus {
        border-color: var(--cinema-accent);
        background: #fff;
        box-shadow: 0 0 0 0.22rem rgba(239, 98, 75, 0.16);
    }

    .genre-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 0.7rem;
    }

    .choice-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 0.65rem;
    }

    .choice-tile {
        display: flex;
        min-height: 48px;
        align-items: center;
        gap: 0.65rem;
        margin: 0;
        padding: 0.7rem 0.85rem;
        border: 1px solid var(--cinema-border);
        border-radius: 0.75rem;
        background: #fbfaf8;
        color: #4b4a54;
        cursor: pointer;
        transition: border-color 160ms ease, background-color 160ms ease, color 160ms ease;
    }

    .choice-tile:hover {
        border-color: #e8b0a5;
        background: #fff8f5;
    }

    .choice-tile:has(input:checked) {
        border-color: #ef9a89;
        background: #fff3ef;
        color: #8e382d;
    }

    .choice-tile .form-check-input {
        float: none;
        flex: 0 0 auto;
        margin: 0;
        accent-color: var(--cinema-accent);
    }

    .choice-tile .form-check-input:focus {
        box-shadow: 0 0 0 0.2rem rgba(239, 98, 75, 0.18);
    }

    .submit-button {
        min-height: 54px;
        border: 0;
        border-radius: 0.8rem;
        background: var(--cinema-accent);
        color: #fff;
        font-weight: 700;
        box-shadow: 0 8px 18px rgba(239, 98, 75, 0.2);
        transition: background-color 160ms ease, box-shadow 160ms ease, transform 160ms ease;
    }

    .submit-button:hover {
        background: #d9513c;
        color: #fff;
        box-shadow: 0 11px 22px rgba(239, 98, 75, 0.27);
        transform: translateY(-1px);
    }

    .results-card {
        margin-top: 1.5rem;
    }

    .results-card .card-header {
        padding: 1rem 1.35rem;
        border: 0;
        background: #24232c;
        color: #fff;
    }

    .results-card .card-header h2 {
        margin: 0;
        font-size: 1rem;
        font-weight: 700;
    }

    .results-card .card-body {
        color: #595863;
        line-height: 1.7;
    }

    .results-card .card-body p:last-child {
        margin-bottom: 0;
    }

    .results-card .card-body strong {
        color: var(--cinema-ink);
    }

    @media (max-width: 575.98px) {
        .page-hero {
            min-height: 0;
            gap: 1rem;
            border-radius: 1.1rem;
        }

        .hero-ticket {
            width: 74px;
            height: 88px;
            flex-basis: 74px;
            border-radius: 0.75rem;
        }

        .hero-ticket strong {
            font-size: 1.35rem;
        }

        .hero-ticket span {
            font-size: 0.5rem;
        }

        .field-grid,
        .genre-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 380px) {
        .page-hero {
            align-items: flex-start;
            flex-direction: column;
        }

        .hero-ticket {
            display: none;
        }

        .field-grid,
        .genre-grid,
        .choice-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        *,
        *::before,
        *::after {
            scroll-behavior: auto !important;
            transition-duration: 0.01ms !important;
        }
    }
</style>
@stop

@section('content')
<main class="container page-wrap">
    <header class="page-hero">
        <div class="hero-copy">
            <span class="eyebrow">Tu experiencia de cine</span>
            <h1 class="page-title">Cuéntanos qué te gusta.</h1>
            <p class="page-subtitle">
                Empezamos por tus películas favoritas y luego conocemos un poco más de ti.
            </p>
        </div>
        <div class="hero-ticket" aria-hidden="true">
            <span>ENTRADA</span>
            <strong>CINE</strong>
            <span>UNA HISTORIA</span>
        </div>
    </header>

    <form id="formularioBootstrap" class="form-card">
        <fieldset class="form-section">
            <legend class="section-heading">
                <span class="section-number">01</span>
                Tus gustos primero
            </legend>
            <p class="section-hint">¿Qué géneros eliges cuando empieza la función?</p>
            <div class="genre-grid">
                <label class="choice-tile" for="accion">
                    <input class="form-check-input" type="checkbox" name="generos" value="Acción" id="accion">
                    Acción
                </label>
                <label class="choice-tile" for="comedia">
                    <input class="form-check-input" type="checkbox" name="generos" value="Comedia" id="comedia">
                    Comedia
                </label>
                <label class="choice-tile" for="drama">
                    <input class="form-check-input" type="checkbox" name="generos" value="Drama" id="drama">
                    Drama
                </label>
                <label class="choice-tile" for="terror">
                    <input class="form-check-input" type="checkbox" name="generos" value="Terror" id="terror">
                    Terror
                </label>
                <label class="choice-tile" for="scifi">
                    <input class="form-check-input" type="checkbox" name="generos" value="Ciencia Ficción" id="scifi">
                    Ciencia ficción
                </label>
                <label class="choice-tile" for="romance">
                    <input class="form-check-input" type="checkbox" name="generos" value="Romance" id="romance">
                    Romance
                </label>
            </div>
        </fieldset>

        <fieldset class="form-section">
            <legend class="section-heading">
                <span class="section-number">02</span>
                Tus datos
            </legend>
            <p class="section-hint">Así podemos conocerte por tu nombre.</p>
            <div class="field-grid">
                <div class="field">
                    <label for="nombres" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" autocomplete="given-name" required>
                </div>
                <div class="field">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" autocomplete="family-name" required>
                </div>
                <div class="field">
                    <label for="fechaNacimiento" class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
                </div>
            </div>
        </fieldset>

        <fieldset class="form-section">
            <legend class="section-heading">
                <span class="section-number">03</span>
                Un poco más de ti
            </legend>
            <p class="section-hint">Cuéntanos sobre tus estudios y tu familia.</p>
            <div class="field-grid">
                <div class="field">
                    <span class="form-label d-block">¿Estás realizando un técnico o tecnólogo?</span>
                    <div class="choice-grid">
                        <label class="choice-tile" for="estudioSi">
                            <input class="form-check-input" type="radio" name="estudio" id="estudioSi" value="Sí">
                            Sí
                        </label>
                        <label class="choice-tile" for="estudioNo">
                            <input class="form-check-input" type="radio" name="estudio" id="estudioNo" value="No" checked>
                            No
                        </label>
                    </div>
                </div>
                <div class="field">
                    <span class="form-label d-block">¿Eres madre cabeza de familia?</span>
                    <div class="choice-grid">
                        <label class="choice-tile" for="madreSi">
                            <input class="form-check-input" type="radio" name="madreCabeza" id="madreSi" value="Sí">
                            Sí
                        </label>
                        <label class="choice-tile" for="madreNo">
                            <input class="form-check-input" type="radio" name="madreCabeza" id="madreNo" value="No" checked>
                            No
                        </label>
                    </div>
                </div>
                <div class="field">
                    <label for="ninos" class="form-label">Cantidad de niños a cargo</label>
                    <input type="number" class="form-control" id="ninos" name="ninos" min="0" value="0" required>
                </div>
            </div>
        </fieldset>

        <div class="d-grid mt-4">
            <button type="submit" class="btn submit-button">
                Enviar y mostrar respuestas
            </button>
        </div>
    </form>

    <section id="resultados" class="results-card" style="display: none;" aria-live="polite">
        <div class="card-header">
            <h2>Respuestas seleccionadas</h2>
        </div>
        <div class="card-body" id="contenidoResultados"></div>
    </section>
</main>
@stop

@section('js')
<script>
    document.getElementById('formularioBootstrap').addEventListener('submit', function (e) {
        e.preventDefault();

        const nombres = document.getElementById('nombres').value;
        const apellidos = document.getElementById('apellidos').value;
        const fecha = document.getElementById('fechaNacimiento').value;
        const ninos = document.getElementById('ninos').value;
        const madre = document.querySelector('input[name="madreCabeza"]:checked').value;
        const estudio = document.querySelector('input[name="estudio"]:checked').value;

        const generosSeleccionados = [];
        document.querySelectorAll('input[name="generos"]:checked').forEach(cb => {
            generosSeleccionados.push(cb.value);
        });

        const generosTexto = generosSeleccionados.length > 0
            ? generosSeleccionados.join(', ')
            : 'Ninguno seleccionado';

        fetch("{{ route('registro.store') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                nombres,
                apellidos,
                fecha_nacimiento: fecha,
                ninos,
                madre_cabeza: madre,
                estudia: estudio,
                generos: generosSeleccionados
            })
        })
            .then(r => r.json())
            .catch(error => console.error('Error al guardar el registro:', error));

        const respuestas = [
            ['Nombres', nombres],
            ['Apellidos', apellidos],
            ['Fecha de nacimiento', fecha],
            ['Cantidad de niños a cargo', ninos],
            ['Madre cabeza de familia', madre],
            ['Está realizando técnico/tecnólogo', estudio],
            ['Géneros de cine preferidos', generosTexto]
        ];

        const contenidoResultados = document.getElementById('contenidoResultados');
        contenidoResultados.replaceChildren(...respuestas.map(([etiqueta, valor]) => {
            const parrafo = document.createElement('p');
            const titulo = document.createElement('strong');
            titulo.textContent = `${etiqueta}:`;
            parrafo.append(titulo, ` ${valor}`);
            return parrafo;
        }));

        const resultados = document.getElementById('resultados');
        resultados.style.display = 'block';
        resultados.scrollIntoView({ behavior: 'smooth' });
    });
</script>
@stop
