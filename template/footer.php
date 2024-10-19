
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Sistem Informasi Penfaftaran Kepemilikan Tanah Sistematis Terpadu Desa Tumbang Jalemu - 2024</span>
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin logout ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Anda akan keluar dari Aplikasi.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="<?= $base_url ?>/logout_control.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/js/sb-admin-2.min.js"></script>

  <!-- js datepicker -->
  <script src="../assets/vendor/datepicker/js/bootstrap-datepicker.min.js"></script>

  <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function (){
        $(".datepicker").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true,
        });

        $('#data-tabel').DataTable();

        $('#data-tabel_filter input').change(() => {
          let keyword = $('#data-tabel_filter input').val();
          if(keyword != ''){
            $('#cetak_pendaftar').attr("href", '<?= $base_url ?>' + '/cetak/data_pendaftar.php?filter=' + keyword);

            $('#export_pendaftar').attr("href", '<?= $base_url ?>' + '/cetak/data_excel.php?filter=' + keyword);
          }else{
            $('#cetak_pendaftar').attr("href", '<?= $base_url ?>' + '/cetak/data_pendaftar.php');
            
            $('#export_pendaftar').attr("href", '<?= $base_url ?>' + '/cetak/data_excel.php');
          }
        });
    });
  </script>

</body>

</html>