<div class="card shadow-4-strong">
    <div class="card-header bg-white"><h5 class="text-primary mb-0">Registrar Cliente</h5></div>
    <div class="card-body">
        <form action="<?= site_url('clientes/guardar') ?>" method="POST">
            <div class="form-outline mb-4">
                <input type="text" name="nombre" id="nombre" class="form-control" required />
                <label class="form-label" for="nombre">Nombre Completo</label>
            </div>
            <div class="form-outline mb-4">
                <input type="text" name="telefono" id="telefono" class="form-control" required />
                <label class="form-label" for="telefono">Teléfono</label>
            </div>
            <div class="form-outline mb-4">
                <textarea name="direccion_principal" id="direccion" class="form-control" rows="3" required></textarea>
                <label class="form-label" for="direccion">Dirección Principal</label>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="<?= site_url('clientes') ?>" class="btn btn-light">Cancelar</a>
        </form>
    </div>
</div>