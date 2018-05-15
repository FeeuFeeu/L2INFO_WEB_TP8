<!DOCTYPE html>
<html>
  <!-- TODO: inclure le <head> -->
  <?php include "head.php"; ?>
  <body>
    <!-- TODO: inclure le <nav> -->
    <?php include "nav.php"; ?>
    <div class="container">
      <!-- TODO: inclure la vue (utilisez $data['view'] fourni par le routeur)-->
      <?php include $data['view']; ?>
      <!-- TODO: inclure le <footer> -->
      <?php include "footer.php";?>
    </div>
  </body>
</html>
