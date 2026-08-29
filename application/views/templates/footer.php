</div>
    <script src="<?= base_url('js/mdb.umd.min.js') ?>"></script>
    <script src="<?= base_url('js/admin.js') ?>"></script>
    <script>
        document.querySelectorAll('.form-outline').forEach((formOutline) => {
            new mdb.Input(formOutline).init();
        });
    </script>
</body>
</html>