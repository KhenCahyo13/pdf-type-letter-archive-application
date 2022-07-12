window.addEventListener('DOMContentLoaded', event => {
    const dataTable = new simpleDatatables.DataTable("#myTable", {
        searchable: false,
        fixedHeight: true,
        perPageSelect: false,
    });
});
