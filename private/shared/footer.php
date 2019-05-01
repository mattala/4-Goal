  <footer class="page-footer green darken-2">
    <!-- <div class="container">
      <div class="row">
        <div class="col l6 s12"> -->
    <!-- Footer header -->
    <!-- <h5 class="white-text"></h5> -->
    <!-- footer content -->
    <!-- <p class="grey-text text-lighten-4"></p>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Links</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
          </ul>
        </div> -->
    <!-- </div> -->
    <!-- </div> -->
    <div class="footer-copyright">
      <div class="container">
        <!-- Gets current year -->
        &copy; <?php echo Date('Y'); ?> 4&Goal
        <a class="grey-text text-lighten-4 right" href="<?php echo url('index.php') ?>">Back Home >> </a>
      </div>
    </div>
  </footer>
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <!-- General js script -->
  <script src="<?php echo url('assets/js/main.js'); ?>"></script>
  <!-- Vue Specific Scripts -->
  <!-- Axios CDN -->
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <!-- Vue CDN -->
  <script src="https://cdn.jsdelivr.net/npm/vue"></script>
  <!-- Vue Script -->
  <script src="<?php echo url('assets/js/app.js'); ?>"></script>
  </body>

  </html>