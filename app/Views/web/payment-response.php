<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Lucky Adda' ?></title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
  <p>Payment successful! Tap below to return to the app.</p>
  <button id="openAppBtn" style="display: none;">Open App</button>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#openAppBtn').on('click', function() {
        window.location.href = "luckyadda://payment-callback";
      });

      // Try closing after a delay (for WebView/popup/tab)
      setTimeout(function() {
        // alert(`Taking you back to app...`)
        // window.close();
        // window.open('', '_self')?.close();
        document.body.innerHTML = `
          <p>If you are not redirected automatically,</p>
          <a href="luckyadda://payment-callback">Tap here to open the app</a>
          <p>You can now close this tab manually.</p>
        `;
      }, 1000);
    });
  </script>

</body>

</html>