<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>


<section class="bg-white dark:bg-gray-900">

<div class="py-8 px-4 pb-14 w-l ">
      <h2 class="mb-4 text-xl  font-bold text-gray-900 dark:text-white">General Settings</h2>
      <form action="create_setting" method="post">
       
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              <div class="w-full">
                  <label for="customer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Office Name</label>
                  <input type="text" name="center_name"  id="customer" value="<?=$settings->center_name?>"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  value="<?= old('center_name') ?>" required="">
              </div>
                  <input type="hidden" name="id"  id="customer" value="<?=$settings->id?>"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
             
              <div class="w-full">
                  <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                  <input type="number" name="address" id="phone" value="<?=$settings->address?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('address') ?>" required="">
              </div>
              <div class="w-full">
                  <label for="order_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                  <input type="number" name="phone" id="order_type" value="<?=$settings->phone?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('phone') ?>" required="">
              </div>
                <div class="w-full">
                    <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Office location</label>
                    <input type="text" name="location" id="location" value="<?=$settings->location?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('location') ?>" required="">
                </div>
              <div>
                  <label for="cost" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                  <input type="email" name="email" id="cost" value="<?=$settings->email?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('email') ?>" required="">
              </div> 
              <div>
                  
           <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload Logo</label>
           <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-full cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" value="<?=$settings->logo?>" type="file">

              </div>
              
          </div>
          <div class="flex justify-center">
    <button type="submit" class="px-5 py-2.5 mt-4 sm:mt-6 text-sm rounded-sm  font-medium text-center text-white bg-sky-400 ">
        Update
    </button>
</div>

          
      </form>
  </div>
</section>


<?= $this->endSection() ;?>