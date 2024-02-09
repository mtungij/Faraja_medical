<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>
<div class="grid grid-cols-3 gap-4">
<?php foreach ($user as $item) : ?>

   
    
<!-- https://gist.github.com/goodreds/5b8a4a2bf11ff67557d38c5e727ea86c -->

<div class="max-w-2xl mx-4 sm:max-w-sm md:max-w-sm lg:max-w-sm xl:max-w-sm sm:mx-auto md:mx-auto lg:mx-auto xl:mx-auto  bg-white shadow-xl rounded-lg text-gray-900">
    <div class="rounded-t-lg h-25 overflow-hidden">
        <img class="object-cover object-top w-full" src='/img/medical.jpg' alt='Mountain'>
    </div>
    <div class="mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
        <img class="object-cover object-center h-32" src='/img/user.png' alt='Woman looking front'>
    </div>
    <div class="text-center mt-2">
        <h2 class="font-semibold uppercase"><?= $item->name ;?></h2>
        <h2 class="text-sky-500 font-semibold"><?= strtoupper($item->department) ;?></h2>
    </div>
    <ul class=" text-gray-700  items-center justify-around">
        
        <li class="flex  items-center ">
          
            <button class="w-1/2 block mx-auto rounded-full  hover:shadow-lg  bg-green-500 font-semibold text-white px-6 py-2"><?= $item->status ;?></button>
        </li>
    </ul>
    <div class="p-4 border-t items-center mx-14 ">
    <a href="<?= site_url("updateUser/$item->id") ?>" 
                class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 -ml-1" viewBox="0 0 20 20" fill="currentColor"
               aria-hidden="true">
            <path
              d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"/>
          </svg>
          Update Staff
</a>
    </div>
</div>
<?php endforeach ?>
</div>
<?= $this->endSection() ;?>
