<div class="card shadow-4-strong">
    <div class="card-header bg-white"><h5 class="text-warning mb-0">Editar Cliente</h5></div>
    <div class="card-body">
        <form action="<?= site_url('clientes/actualizar/'.$cliente->id) ?>" method="POST">
            <div class="form-outline mb-4">
                <input type="text" name="nombre" id="nombre2" class="form-control" value="<?= $cliente->nombre ?>" required />
                <label class="form-label" for="nombre2">Nombre Completo</label>
            </div>
            <div class="form-outline mb-4">
                <input type="text" name="telefono" id="telefono2" class="form-control" value="<?= $cliente->telefono ?>" required />
                <label class="form-label" for="telefono2">Teléfono</label>
            </div>
            <div class="form-outline mb-4">
                <textarea name="direccion_principal" id="direccion2" class="form-control" rows="3" required><?= $cliente->direccion_principal ?></textarea>
                <label class="form-label" for="direccion2">Dirección Principal</label>
            </div>
            <button type="submit" class="btn btn-warning">Actualizar</button>
            <a href="<?= site_url('clientes') ?>" class="btn btn-light">Cancelar</a>
        </form>
    </div>
</div>