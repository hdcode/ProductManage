</div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Mon Footer &copy; 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <script src="./css/dataTables.js"></script>
    <script src="./css/dataTables.bootstrap5.js"></script>
    <script src="vendor/sweetalert2/sweetalert2.all.js"></script>
    <script>
        new DataTable('#example');
    </script>
    <script>
        !function ($) {
            "use strict";

            var SweetAlert = function () {
            };

            SweetAlert.prototype.init = function () {
                // Vérifiez si le paramètre de succès est présent dans l'URL
                const urlParams = new URLSearchParams(window.location.search);
                if (urlParams.has('success')) {
                    swal({
                        title: 'Enregistré avec succès!',
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonClass: 'btn btn-success'
                    });
                }
                if (urlParams.has('update_success')) {
                    swal(
                        {
                            title: 'Modifié avec succès!',
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonClass: 'btn btn-success'
                        }
                    );
                }
                if (urlParams.has('delete_success')) {
                    swal({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonClass: 'btn btn-success',
                        cancelButtonClass: 'btn btn-danger',
                        confirmButtonText: 'Yes, delete it!'
                    }).then(function () {
                        swal(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    })

                }

                $(document).ready(function() {  
                    $('.deleteBtn').click(function(event) {  
                        event.preventDefault(); // Empêche l'action par défaut du lien  

                        var categoryId = $(this).data('id'); // Récupère l'ID de la catégorie à partir de l'attribut data-id  

                        swal({  
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, delete it!',
                            cancelButtonText: 'No, cancel!',
                            confirmButtonClass: 'btn btn-success margin-5',
                            cancelButtonClass: 'btn btn-danger margin-5',
                            buttonsStyling: true,
                        }).then((willDelete) => {  
                            if (willDelete) {  
                                // Redirige vers l'URL de suppression
                                window.location.href = '../controllers/categoryController.php?action=delete&id=' + categoryId;  
                                swal(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                            }else{
                                swal(
                                    'Cancelled',
                                    'Your imaginary file is safe :)',
                                    'error'
                                )
                            }
                        }
                        // , function (dismiss) {
                        //     // dismiss can be 'cancel', 'overlay',
                        //     // 'close', and 'timer'
                        //     if (dismiss === 'cancel') {
                        //         swal(
                        //             'Cancelled',
                        //             'Your imaginary file is safe :)',
                        //             'error'
                        //         )
                        //     }
                        // }
                    );  
                    });  
                });

            },
            $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
        }(window.jQuery),

        function ($) {
            "use strict";
            $.SweetAlert.init()
        }(window.jQuery);

        $('#sa-params').click(function () {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success margin-5',
                cancelButtonClass: 'btn btn-danger margin-5',
                buttonsStyling: false
            }).then(function () {
                swal(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }, function (dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                    swal(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })
        });

    </script>

<!-- <script>
    function exportToCSV() {  
        window.location.href = 'export.php?export=true';  
    }
</script>  -->

<script>
    function exportToExcel() {
        // Créer un tableau pour stocker les données
        let table = document.getElementById('example');
        let rows = Array.from(table.rows);
        let csvContent = rows.map(row => Array.from(row.cells).map(cell => cell.innerText).join(",")).join("\n");

        // Créer un lien pour télécharger le fichier
        let blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        let link = document.createElement("a");
        link.href = URL.createObjectURL(blob);
        link.setAttribute('download', 'produits.csv');
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
</script>


</body>

</html>