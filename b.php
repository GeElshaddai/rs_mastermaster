<?php require 'connection.php'; ?>

</main>
<footer class="py-4 bg-light mt-auto">
  <div class="container-fluid px-4">
    <div class="d-flex align-items-center justify-content-between small">
      <div class="text-muted">Copyright &copy; ATMA Hospital 2024</div>
      <div>
        <a href="#">Privacy Policy</a>
        &middot;
        <a href="#">Terms &amp; Conditions</a>
      </div>
    </div>
  </div>
</footer>
</div>
</div>
<script src="<?=$theHOME;?>/library/js/bootstrap.bundle.min.js"></script>
<script src="<?=$theHOME;?>/library/js/scripts.js"></script>
<script src="<?=$theHOME;?>/library/js/Chart.min.js"></script>
<script src="<?=$theHOME;?>/library/assets/demo/chart-area-demo.js"></script>
<script src="<?=$theHOME;?>/library/assets/demo/chart-bar-demo.js"></script>
<script src="<?=$theHOME;?>/library/js/simple-datatables.min.js"></script>
<script src="<?=$theHOME;?>/library/js/datatables-simple-demo.js"></script>
<script type="text/javascript">
// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>
</body>
</html>
