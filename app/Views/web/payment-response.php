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

  <script>
    window.onload = function() {
      // This will try to open the app using the deep link
      window.location.href = "luckyadda://payment-callback";

      // Optionally, fallback to app store if not installed (with timeout)
      // setTimeout(() => {
      //   window.location.href = "https://yourdomain.com/app-download";
      // }, 3000);
    };
  </script>

</body>

</html>