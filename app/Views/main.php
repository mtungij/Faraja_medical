<?php
use App\Models\SettingModel;

$setting = model(SettingModel::class)->first();

;?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url('css/styles.css') ?>" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="<?php echo base_url('js/jquery.js')?>"></script>

    <script>
      console.log(document.getElementById('departmentunique'))
    </script>
</head>
<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap');

        body {
            font-family: 'Inter', sans-serif !important;
            
        }

    </style>
    <title><?= $setting->center_name ;?> </title>
</head>

<body>
    
    
    <div class="antialiased bg-white dark:bg-gray-900">
     
     <?= $this->include('partials/navbar') ;?>

     <?= $this->include('partials/sidebar') ;?>
     
    <main class="p-4 md:ml-64 h-auto pt-20">


    <?php if(session()->has('errors')): ?>
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
     <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
     </svg>
    <span class="sr-only">Info</span>
     <div>
     <p> <?= session()->getFlashdata('errors') ?></p> 
     </div>
</div>
        <?php endif ?>

        <div class="sm:px-6 py-8 flex flex-col rounded-xl bg-white dark:bg-gray-900">
          <?php if(session()->getFlashdata('success')): ?>
             <div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
       <span class="sr-only">Info</span>
        <div>
  <p> <?= session()->getFlashdata('success') ?></p> 
  </div>
</div>
            </div>
      <?php endif?>

   <?= $this->renderSection('content') ;?>
    </main>
  </div>
  <script src="<?php echo base_url('js/flowbite.js') ?>"></script>
  <script src="<?php echo base_url('js/tw-elements.umd.min.js') ?>"></script>
  <script src="<?php echo base_url('js/quill.js') ?>"></script>

  <script type="module">
    import { Select, initTE } from "tw-elements";
initTE({ Select });
  </script>

<script>
  var quill = new Quill('#editor', {
    theme: 'snow'
  });
</script>
  </body>

</html>







