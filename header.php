<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        font-weight: bold;
    }

    header {
        width: 100%;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1000;
        padding: 20px 0;
    }

    .contenedor {
        text-align: center;
        padding: 20px;
    }

    h1 {
        margin-bottom: 20px;
        color: #333;
    }

    .botones {
        display: flex;
        justify-content: center;
        gap: 20px;
    }

    .botones button {
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 20px;
        width: 100px;
        text-align: center;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.2s;
        position: relative;
    }

    .botones button:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .botones img {
        width: 100%;
        height: auto;
        border-radius: 10px;
        margin-top: 10px;
    }

    .botones .hover-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
        font-size: 18px;
        font-weight: bold;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        opacity: 0;
        transition: opacity 0.2s;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 10px;
        border-radius: 5px;
    }

    .botones button:hover .hover-text {
        opacity: 1;
    }

    /* Agregar margen superior al contenido principal para compensar la altura del encabezado */
    .main-content {
        margin-top: 120px; /* Ajusta este valor según la altura de tu encabezado */
    }
</style>

<header>
    <div class="contenedor">
        <h1>Bienvenido a la Parroquia</h1>
        <nav class="botones">
            <button onclick="window.location.href='../bautismo/bautismo.php'">
                <span class="hover-text">Bautismo</span>
                Bautismo
                <img src="./img/bautismo.jpg" alt="Bautismo">
            </button>
            <button onclick="window.location.href='confirmacion/confirmacion.html'">
                <span class="hover-text">Confirmación</span>
                Confirmación
                <img src="./img/confirmación.jpg" alt="Confirmación">
            </button>
            <button onclick="window.location.href='matrimonio/matrimonio.php'">
                <span class="hover-text">Matrimonio</span>
                Matrimonio
                <img src="./img/matrimonio.jpg" alt="Matrimonio">
            </button>
        </nav>
    </div>
</header>

<!-- Agregar una clase al contenido principal -->
<div class="main-content">
    <!-- Aquí va el contenido principal de la página -->
</div>
