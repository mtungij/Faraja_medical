
<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>


<section class="bg-white dark:bg-gray-900">

<div class="py-8 px-4 pb-14 w-l ">
<div class="w-full text-white bg-sky-500">
        <div x-data="{ open: false }"
            class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
            <div class="p-4 flex flex-row items-center justify-between">
                <a href="#"
                    class="text-lg font-semibold tracking-widest uppercase rounded-lg focus:outline-none focus:shadow-outline"><?= $patient->first_name ." ".$patient->middle_name ." ".$patient->last_name ;?></a>
            </div>

           <div class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
                <div>
                <a href="<?= site_url("patient") ?>" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900  bg-white rounded-full border border-gray-200  hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                  Go Back
                </a>
                    
                </div>
            </div>
        </div>
    </div>
    
    
      <form action="<?php echo base_url("store_diagnosis") ?>" method="post">
     
          <div class=" ">
             
              <input type="hidden" name="user_id" id="phone" value="<?= session("user_id") ?>"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('username') ?>" required="">
              <input type="hidden" name="patient_id" id="phone" value="<?=$patient->id?>"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('username') ?>" required="">
             <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">History Presenting Illiness</label>
             <textarea id="message" name="desc" rows="4" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..." required></textarea>
              </div>
          </div>
          <div class="flex justify-center">
    <button type="submit" class="px-5 py-2.5 mt-4 sm:mt-6 text-sm rounded-sm  font-medium text-center text-white bg-sky-400 ">
        Submit
    </button>
</div>

          
      </form>
  </div>
</section>


<?= $this->endSection() ;?>

