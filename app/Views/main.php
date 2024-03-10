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
    <script src="<?php echo base_url('js/sweetalert2.min.js') ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/sweetalert2.min.css') ?>">
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


        .swal2-popup {
  font-size: 1rem !important;
  font-family:  mainda;
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
    
      <script>
$(function(){
    <?php if(session()->has("errors")) { ?>
      Swal.fire({
  icon: "warning",
  title: "<?= session()->getFlashdata('errors') ?>",
  showConfirmButton: true,
  
});
    <?php } ?>
});
</script>

        <?php endif ?>

        <div class="font-[sans-serif] space-y-6">
        <?php if(session()->getFlashdata('success')): ?>
     
          <script>
$(function(){
    <?php if(session()->has("success")) { ?>
      Swal.fire({
  icon: "success",
  title: "<?= session()->getFlashdata('success') ?>",
  showConfirmButton: false,
  timer: 1500
});
    <?php } ?>
});
</script>
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







