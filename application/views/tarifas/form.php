<h2>Nueva Tarifa</h2>

<?= validation_errors('<div class="alert alert-danger">', '</div>') ?>

<div class="alert alert-info">
    Si el tipo de servicio que elijas ya tiene una tarifa vigente, esta se cerrará
    automáticamente (queda como histórica) al guardar la nueva.
</div>

<?= form_open('tarifas/crear') ?>

    <div class="mb-3">
        <label for="tipo_servicio_id" class="form-label">Tipo de servicio</label>
        <select class="form-select" id="tipo_servicio_id" name="tipo_servicio_id" required>
            <option value="">Selecciona un tipo de servicio</option>
            <?php foreach ($tipos as $tipo): ?>
                <option value="<?= $tipo->id ?>" <?= set_select('tipo_servicio_id', $tipo->id) ?>>
                    <?= html_escape($tipo->nombre) ?> (<?= html_escape($tipo->codigo) ?>)
                </option>
            <?php endforeach; ?>
        </select>
        <?php if (empty($tipos)): ?>
            <div class="form-text text-danger">
                No hay tipos de servicio registrados todavía. Crea uno primero en
                <a href="<?= site_url('tipos_servicios/crear') ?>">Tipos de Servicio</a>.
            </div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="precio" class="form-label">Precio (Q)</label>
        <input type="number" step="0.01" min="0.01" class="form-control" id="precio" name="precio"
               value="<?= set_value('precio') ?>" placeholder="Ej. 45.00" required>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="<?= site_url('tarifas') ?>" class="btn btn-outline-secondary">Cancelar</a>

<?= form_close() ?>
