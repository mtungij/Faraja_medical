<?php
use App\Models\SettingModel;

$setting = model(SettingModel::class)->first();

function format_date($date) {
    return date('d M Y', strtotime($date));
}

function format_datetime($date) {
  return date('d M Y H:i:s', strtotime($date));
}
;?>


<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" href="<?php echo base_url('css/datatable.css') ?>">
    <script  src="<?php echo base_url('js/alpine.js') ?>"></script>
    <script  src="<?php echo base_url('js/main.js') ?>"></script>
    <link href="<?php echo base_url('css/styles.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/quill.css') ?>" rel="stylesheet">
    <script src="<?php echo base_url('js/jquery.js')?>"></script>
    <script src="<?php echo base_url('js/datatable.js')?>"></script>
 

    <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );

    </script>
  
</head>
<body>
    <style>
        @font-face {
          font-family: hekima;
          src: url("<?php echo base_url('css/Inter-Regular.ttf') ?>");
        }

        body {
            font-family: 'hekima', sans-serif !important;
            
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

        <div class="font-[sans-serif] space-y-6">
        <?php if(session()->getFlashdata('success')): ?>
      <div class="bg-green-100 text-green-800 px-4 py-4 rounded" role="alert">
        <strong class="font-bold text-base mr-4">Success!</strong>
        <span class="block text-sm sm:inline max-sm:mt-1"><?= session()->getFlashdata('success') ?></span>
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
  var toolbarOptions = [
  ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
  ['blockquote', 'code-block'],

  [{ 'header': 1 }, { 'header': 2 }],               // custom button values
  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
  [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
  [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
  [{ 'direction': 'rtl' }],                         // text direction

  [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
  [{ 'font': [] }],
  [{ 'align': [] }],

  ['clean']                                         // remove formatting button
];

  var quill = new Quill('#editor', {
    theme: 'snow',
    modules: {
      toolbar: toolbarOptions
    }
  });

  var quill = new Quill('#editor2', {
    theme: 'snow',
    modules: {
      toolbar: toolbarOptions
    }
  });
</script>

<script>
    const myChart = new Chart(ctx, {...});

</script>
  </body>

</html>







