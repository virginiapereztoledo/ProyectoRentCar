document.addEventListener('DOMContentLoaded', function () {
    // Confirmación para "Eliminar todos"
    const deleteAllBtn = document.getElementById('delete-all');
    if (deleteAllBtn) {
        deleteAllBtn.addEventListener('click', function (e) {
            if (!confirm('¿Estás seguro de que deseas eliminar a todos los clientes?')) {
                e.preventDefault();
            } else {
                const form = this.closest('form');
                form.submit();
            }
        });
    }


    document.querySelectorAll('.form-eliminar').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            if (!confirm('¿Estás seguro de que deseas eliminar ? Esta acción no se puede deshacer.')) {
                e.preventDefault();
            }
        });
    });
    document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.form-eliminar').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            const btn = form.querySelector('.client-to-delete');
            const username = btn?.dataset?.username || 'el cliente';

            if (!confirm(`¿Estás seguro de que deseas eliminar a ${username}? Esta acción no se puede deshacer.`)) {
                e.preventDefault();
            }
        });
    });
});

});
