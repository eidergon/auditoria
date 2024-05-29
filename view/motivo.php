<div class="rr">
    <form class="form" id="nuevo_motivo">
        <h1>Nuevo Motivo</h1>

        <div class="input-container">
            <label>
                ¿Que Motivo Es?&nbsp;&nbsp;&nbsp;
                <select class="input" name="tipo_motivo" required>
                    <option value=""></option>
                    <option value="motivos_mala_practica">Malas Prácticas</option>
                    <option value="motivos_validacion_id">Valicación ID</option>
                </select>
            </label>
        </div>

        <div class="input-container">
            <textarea placeholder="Escribe el nuevo motivo" name="motivo" required></textarea>
        </div>
        <button class="boton">Guardar</button>
    </form>
</div>