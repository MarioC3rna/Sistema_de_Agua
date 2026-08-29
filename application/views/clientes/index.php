<div class="card shadow-4-strong">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Gestión de Clientes</h5>
    <div>
        <a href="<?= base_url() ?>" class="btn btn-light btn-sm me-2">Regresar al Menú</a>
        <a href="<?= site_url('clientes/crear') ?>" class="btn btn-primary btn-sm">Nuevo Cliente</a>
    </div>
</div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($clientes)): ?>
                    <?php foreach($clientes as $cli): ?>
                    <tr>
                        <td class="fw-bold"><?= $cli->nombre ?></td>
                        <td><?= $cli->telefono ?></td>
                        <td><?= $cli->direccion_principal ?></td>
                        <td>
                            <a href="<?= site_url('clientes/editar/'.$cli->id) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4" class="text-center py-4">No hay clientes registrados.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>