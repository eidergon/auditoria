<?php
session_start();
$nombre = $_SESSION["nombre"];
?>

<div class="rr">
    <form class="form" id="enviar" enctype="multipart/form-data">
        <h1>Auditoria</h1>
        <input type="hidden" name="responsable" value="<?= $nombre ?>">

        <div class="input-container">
            <label>
                Fecha Llamada&nbsp;&nbsp;&nbsp;
                <input type="date" name="fecha_llamada" class="input" required>
            </label>
        </div>

        <div class="input-container">
            <label>
                Tipo Auditoria&nbsp;&nbsp;&nbsp;
                <select class="input" name="tipo_auditoria" required>
                    <option value=""></option>
                    <option value="Venta">Venta</option>
                    <option value="No_Venta">No Venta</option>
                    <option value="Val_ID">Val ID</option>
                </select>
            </label>
        </div>

        <div class="input-container">
            <label>
                Min Auditar&nbsp;&nbsp;&nbsp;
                <input type="number" name="min_auditar" class="input" autocomplete="off" required>
            </label>
        </div>

        <div class="input-container">
            <label>
                Documento Asesor&nbsp;&nbsp;&nbsp;
                <input type="number" name="documento" id="documento" class="input" autocomplete="off" required>
            </label>
        </div>

        <div class="input-container">
            <label>
                Nombre Asesor&nbsp;&nbsp;&nbsp;
                <input type="text" id="nombre" name="nombre" class="input" readonly>
            </label>
        </div>

        <div class="input-container">
            <label>
                Supervisor&nbsp;&nbsp;&nbsp;
                <input type="text" id="supervisor" name="supervisor" class="input" readonly>
            </label>
        </div>

        <div class="input-container">
            <label>
                Sede&nbsp;&nbsp;&nbsp;
                <input type="text" id="sede" name="sede" class="input" readonly>
            </label>
        </div>

        <div class="input-container">
            <label>
                Campaña&nbsp;&nbsp;&nbsp;
                <input type="text" id="campaña" name="campaña" class="input" readonly>
            </label>
        </div>

        <div class="input-container">
            <label>
                Cumple Habeas Data&nbsp;&nbsp;&nbsp;
                <select class="input" name="hebeas_data" required>
                    <option value="">Seleccionar</option>
                    <option value="Cumple">Cumple</option>
                    <option value="No Cumple">No cumple</option>
                    <option value="No Aplica">No Aplica</option>
                </select>
            </label>
        </div>

        <div class="input-container">
            <label>
                Cumple Ley 2300&nbsp;&nbsp;&nbsp;
                <select class="input" name="ley2300" required>
                    <option value="">Seleccionar</option>
                    <option value="Cumple">Cumple</option>
                    <option value="No Cumple">No cumple</option>
                    <option value="No Aplica">No Aplica</option>
                </select>
            </label>
        </div>

        <div class="input-container">
            <label>
                Cumple Malas Practicas&nbsp;&nbsp;&nbsp;
                <select class="input" id="malas_preacticas" name="malas_preacticas" required>
                    <option value="">Seleccionar</option>
                    <option value="Cumple">Cumple</option>
                    <option value="No Cumple">No cumple</option>
                    <option value="No Aplica">No Aplica</option>
                </select>
            </label>
        </div>

        <div class="input-container" id="motivo_mala_prectica">
            <label>
                Motivo Mala Practica&nbsp;&nbsp;&nbsp;
                <select class="input" name="motivo_mala_prectica">
                    <option value="">Motivo</option>
                    <option value="Suplantacion">Suplantacion</option>
                    <option value="Oferta Errada">Oferta Errada</option>
                    <option value="Datos Errados">Datos Errados</option>
                    <option value="Lenguaje inapropiado">Lenguaje Inapropiado</option>
                    <option value="Incumplimiento Ley 2300">Incumplimiento Ley 2300</option>
                    <option value="Publicidad engañosa">Publicidad Engañosa</option>
                    <option value="Omisión proceso legal en venta">Omisión Proceso Legal En Venta</option>
                    <option value="Novedad correo electronido venta digital">Novedad Correo Electronido Venta Digital</option>
                    <option value="Lenguaje inapropiado gestion comercial">Lenguaje Inapropiado Gestion Comercial</option>
                    <option value="Cuelga Llamada">Cuelga Llamada</option>
                    <option value="Mala tipificación">Mala Tipificación</option>
                    <option value="Llamada muda y no la devuelve">Llamada Muda Y No La Devuelve</option>
                </select>
            </label>
        </div>

        <div class="input-container">
            <label>
                Cumple Validacion ID&nbsp;&nbsp;&nbsp;
                <select class="input" id="validacion_id" name="validacion_id" required>
                    <option value="">Seleccionar</option>
                    <option value="Cumple">Cumple</option>
                    <option value="No Cumple">No cumple</option>
                    <option value="No Aplica">No Aplica</option>
                </select>
            </label>
        </div>

        <div class="input-container" id="motivo_validacion_id">
            <label>
                Motivo Validacion ID&nbsp;&nbsp;&nbsp;
                <select class="input" name="motivo_validacion_id">
                    <option value="">Motivo</option>
                    <option value="Sin soporte de segunda validacion ID">Sin soporte de segunda validacion ID</option>
                    <option value="Cliente no pasa filtros de seguridad P.F">Cliente no pasa filtros de seguridad P.F</option>
                    <option value="Cuenta hogar con antigüedad -40 dias">Cuenta hogar con antigüedad -40 dias</option>
                    <option value="Cuenta movil envio de otp cuenta con modificaciones -40 días">Cuenta movil envio de otp cuenta con modificaciones -40 días</option>
                    <option value="Sin Validacion De Identidad">Sin Validacion De Identidad</option>
                    <option value="Cliente con mas de 2 reservas al mes">Cliente con mas de 2 reservas al mes</option>
                    <option value="Cliente Fallecido">Cliente Fallecido</option>
                    <option value="Validación de id modificada">Validación de id modificada</option>
                </select>
            </label>
        </div>

        <div class="input-container">
            <label>
                Gestion Comercial&nbsp;&nbsp;&nbsp;
                <select class="input" name="gestion_comercial" required>
                    <option value="">Seleccionar</option>
                    <option value="Asesor distraido">Asesor Distraido</option>
                    <option value="Falta de información">Falta De Información</option>
                    <option value="No desvia objeciones">No Desvia Objeciones</option>
                    <option value="Fecha de facturación">Fechas De Facturación </option>
                    <option value="Sin gestión comercial">Sin Gestión Comercial</option>
                    <option value="Falsas espectativas">Falsas Espectativas</option>
                    <option value="Incitación a cancelación">Incitación A Cancelación</option>
                    <option value="Modificacion de tarifa">Modificación De Tarifa</option>
                    <option value="Tono de voz">Tono De Voz</option>
                </select>
            </label>
        </div>

        <div class="input-container">
            <label>
                Audio&nbsp;&nbsp;&nbsp;
                <input type="file" name="archivos" id="audio" accept="audio/*" class="input">
            </label>
        </div>

        <div class="container-btns">
            <button class="boton">Enviar</button>
            <button type="button" id="limpiar" class="boton">Limpiar</button>
            <button type="button" id="buscar" class="Btn"><ion-icon name="search-outline"></ion-icon></button>
        </div>
    </form>
</div>