<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Tipos de Servicio</h2>
    <a href="<?= site_url('tipos_servicios/crear') ?>" class="btn btn-primary">
        Nuevo tipo de servicio
    </a>
</div>

<table class="table table-striped align-middle">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Volumen incluido (litros)</th>
            <th>¿Es servicio?</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($tipos)): ?>
            <tr>
                <td colspan="5" class="text-center text-muted">Todavía no hay tipos de servicio registrados.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($tipos as $tipo): ?>
                <tr>
                    <td><?= html_escape($tipo->codigo) ?></td>
                    <td><?= html_escape($tipo->nombre) ?></td>
                    <td><?= $tipo->volumen_incluido_litros !== NULL ? number_format($tipo->volumen_incluido_litros) : '—' ?></td>
                    <td>
                        <?php if ($tipo->es_servicio): ?>
                            <span class="badge bg-primary">Servicio</span>
                        <?php else: ?>
                            <span class="badge bg-secondary">Exceso</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end">
                        <a href="<?= site_url('tipos_servicios/eliminar/' . $tipo->id) ?>"
                           class="btn btn-sm btn-outline-danger"
                           onclick="return confirm('¿Eliminar este tipo de servicio?');">
                            Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
