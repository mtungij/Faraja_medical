<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/styles.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap');

        body {
            font-family: 'Inter', sans-serif !important;
        }
    </style>
    <title>Hekima Medical </title>
</head>
<body>
    
    
    
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
     
     <?= $this->include('partials/navbar') ;?>

     <?= $this->include('partials/sidebar') ;?>

    <main class="p-4 md:ml-64 h-auto pt-20">
        <?= $this->renderSection('content') ;?>
    </main>
  </div>

  <script src="js/flowbite.js"></script>
  </body>
</html>