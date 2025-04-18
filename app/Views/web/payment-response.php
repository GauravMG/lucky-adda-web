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
        window.open('', '_self')?.close(); // Tries to close the current tab
      }, 1500);
    });
  </script>

</body>

</html>