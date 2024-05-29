<div class="container-table">
    <div class="container-filtro">
        <label>
            ¿Que Tabla Desea Ver?&nbsp;&nbsp;&nbsp;
            <select class="input" name="tipo_motivo" id="tipo_motivo" required>
                <option value=""></option>
                <option value="motivos_mala_practica">Malas Prácticas</option>
                <option value="motivos_validacion_id">Valicación ID</option>
            </select>
        </label>
        <button id="filtro_tabla" class="Btn"><ion-icon name="search-outline"></ion-icon></button>
    </div>

    <table class="table" id="table">
        <thead>
            <tr>
                <th>Motivo</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <tr scope='row'>
                <td colspan='2' class='no-data'>Filtre una tabla</td>
            </tr>
        </tbody>
    </table>
</div>