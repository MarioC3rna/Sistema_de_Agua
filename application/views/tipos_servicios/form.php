<h2>Nuevo Tipo de Servicio</h2>

<?= validation_errors('<div class="alert alert-danger">', '</div>') ?>

<?= form_open('tipos_servicios/crear') ?>

    <div class="mb-3">
        <label for="codigo" class="form-label">Código</label>
        <input type="text" class="form-control" id="codigo" name="codigo"
               value="<?= set_value('codigo') ?>" placeholder="Ej. 1_4_PAJA" maxlength="20" required>
    </div>

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre"
               value="<?= set_value('nombre') ?>" placeholder="Ej. 1/4 de paja" maxlength="50" required>
    </div>

    <div class="mb-3">
        <label for="volumen_incluido_litros" class="form-label">Volumen incluido (litros)</label>
        <input type="number" class="form-control" id="volumen_incluido_litros" name="volumen_incluido_litros"
               value="<?= set_value('volumen_incluido_litros') ?>" placeholder="Ej. 15000">
        <div class="form-text">Déjalo vacío si este tipo es "exceso" y no aplica volumen incluido.</div>
    </div>

    <div class="mb-3">
        <label class="form-label d-block">¿Es un servicio contratable?</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="es_servicio" id="es_servicio_si" value="1" checked>
            <label class="form-check-label" for="es_servicio_si">Sí (ej. 1/4 de paja, 1/2 paja)</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="es_servicio" id="es_servicio_no" value="0">
            <label class="form-check-label" for="es_servicio_no">No (ej. tipo "exceso")</label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="<?= site_url('tipos_servicios') ?>" class="btn btn-outline-secondary">Cancelar</a>

<?= form_close() ?>
