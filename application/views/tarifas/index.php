<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Tarifas</h2>
    <a href="<?= site_url('tarifas/crear') ?>" class="btn btn-primary">
        Nueva tarifa
    </a>
</div>

<table class="table table-striped align-middle">
    <thead>
        <tr>
            <th>Tipo de servicio</th>
            <th>Precio</th>
            <th>Vigente desde</th>
            <th>Vigente hasta</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($tarifas)): ?>
            <tr>
                <td colspan="6" class="text-center text-muted">Todavía no hay tarifas registradas.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($tarifas as $tarifa): ?>
                <tr>
                    <td><?= html_escape($tarifa->tipo_nombre) ?> <span class="text-muted">(<?= html_escape($tarifa->tipo_codigo) ?>)</span></td>
                    <td>Q<?= number_format($tarifa->precio, 2) ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($tarifa->vigente_desde)) ?></td>
                    <td><?= $tarifa->vigente_hasta ? date('d/m/Y H:i', strtotime($tarifa->vigente_hasta)) : '—' ?></td>
                    <td>
                        <?php if ($tarifa->vigente_hasta === NULL): ?>
                            <span class="badge bg-success">Vigente</span>
                        <?php else: ?>
                            <span class="badge bg-secondary">Vencida</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end">
                        <a href="<?= site_url('tarifas/eliminar/' . $tarifa->id) ?>"
                           class="btn btn-sm btn-outline-danger"
                           onclick="return confirm('¿Eliminar esta tarifa?');">
                            Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
