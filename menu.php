<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Menu</title>
</head>
<body>
<!-- navigasi bar -->
<nav class="navbar navbar-default">
  <div class="container">
    <a href="index.php">
    <img width="150" height="80" alt="" class="header-image" src="foto/siren.png" align="left">
    </a>
    <div class="row">
      <div class="col-md-12o">
    <ul class="nav navbar-nav">
      <li><a href="produk.php">Tour</a></li>
      <li><a href="news.php">News</a></li>
      <li><a href="keranjang.php">Cart</a></li>
      <!-- jika sudah login -->
      <?php if (isset($_SESSION["pelanggan"])): ?>
        <li><a href="riwayat.php">Purchasing Data</a></li>
        <li><a href="logout.php">Logout</a></li>
      <!-- jika belum login -->
      <?php else: ?>
        <li><a href="login.php">Login</a></li>
        <li><a href="daftar.php">Register</a></li>
    </form>
      <?php endif ?>
      <li><a href="checkout.php">Checkout</a></li>
    </ul>
    </div>
    </div>
  </div>
</nav>
</body>
</html>