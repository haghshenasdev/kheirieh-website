<!-- pwa -->
<link rel="manifest" href="<?= base_url("manifest.json") ?>" />
  <meta name="theme-color" content="#1d3557">
  <link rel="apple-touch-icon" href="/500-500-logo.png">
  <link rel="shortcut icon" href="/500-500-logo.png" type="image/png">

  <script>
    if ("serviceWorker" in navigator) {
      navigator.serviceWorker
        .register("<?= base_url("serviceWorker.js") ?>")
        .then(reg => {
          console.log("Service worker registred successfully", reg);
        })
        .catch(err => {
          console.log("service worker not registred !!", err);
        });
    }
  </script>
  <!-- end pwa -->