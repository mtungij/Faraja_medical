
<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>

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
    
      <h2 class="mb-4 text-xl  font-bold text-gray-900 dark:text-white">VITAL SIGN</h2>
      <form action="<?php echo base_url("store_signs") ?>" method="post">
     
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
             
              <div class="w-full">
                  <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blood Pressure</label>
                  <input type="text" name="blood_pressure" id="phone"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('name') ?>" required="">
              </div>

              <input type="hidden" name="user_id" id="phone" value="<?= session("user_id") ?>"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('username') ?>" required="">
              <input type="hidden" name="patient_id" id="phone" value="<?=$patient->id?>"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('username') ?>" required="">
              

              <div class="w-full">
                  <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Respiration Rate</label>
                  <input type="text" name="resp_rate" id="phone"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('username') ?>" required="">
              </div>

              <div class="w-full">
                  <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pulse Rate</label>
                  <input type="text" name="pulse_rate" id="phone"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('username') ?>" required="">
              </div>

              <div class="w-full">
                  <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Oxygen Saturation</label>
                  <input type="text" name="oxygen_saturation" id="phone"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('phone') ?>" required="">
              </div>

              <div class="w-full">
                  <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Weight</label>
                  <input type="text" name="weight" id="phone"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('phone') ?>" required="">
              </div>

              <div class="w-full">
                  <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Height</label>
                  <input type="text" name="height" id="phone"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('phone') ?>" required="">
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




<?= $this->endSection() ;?>