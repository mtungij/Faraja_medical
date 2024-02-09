<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>

<div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
  <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
  </svg>
  <span class="sr-only">Danger</span>
  <div>
    <span class="font-medium">Hii fomu ni kwa ajili ya mgonjwa anayefika kwa mara ya kwanza tuu</span>
      <ul class="mt-1.5 list-disc list-inside">
        <li>field zote zenye rangi nyekundu ni za lazima kujazwa</li>
        <li>Namba ya simu na Address sio lazima zijazwe</li>
        <li>hakikisha anayesajiliwa hapa ni mgonjwa alikuja kwa mara ya kwanza</li>
    </ul>
  </div>
</div>



<section class="bg-white dark:bg-gray-900">

<div class="py-8 px-4 pb-14 w-l ">
      <h2 class="mb-4 text-xl  font-bold text-gray-900 dark:text-white">NEW PATIENT REGISTRATION</h2>
      <form action="<?= site_url("store_patient") ?>" method="post">
       
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
             
              <div class="w-full">
                  <label for="phone" class="block mb-2 text-sm font-medium text-red-700 dark:text-white">First Name</label>
                  <input type="text" name="first_name" id="phone"  class="bg-gray-50 border border-red-700 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('first_name') ?>" required="">
              </div>
              <div class="w-full">
                  <label for="phone" class="block mb-2 text-sm font-medium text-red-700 dark:text-white">Middle Name</label>
                  <input type="text" name="middle_name" id="phone"  class="bg-gray-50 border border-red-700 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('middle_name') ?>" required="">
              </div>
              <div class="w-full">
                  <label for="phone" class="block mb-2 text-sm font-medium text-red-700 dark:text-white">Last Name</label>
                  <input type="text" name="last_name" id="phone"  class="bg-gray-50 border border-red-700 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('last_name') ?>" required="">
              </div>
              <div class="w-full">
                  <label for="order_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                  <input type="number" name="phone" id="order_type"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('phone') ?>">
              </div>
              <div class="w-full">
                  <label for="order_type" class="block mb-2 text-sm font-medium text-red-700 dark:text-white">Age</label>
                  <input type="number" name="age" id="order_type"  class="bg-gray-50 border border-red-700 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('age') ?>" required="">
              </div>

              <div class="w-full">
                  <label for="order_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                  <input type="text" name="address" id="order_type"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('address') ?>" >
              </div>

              <div class="w-full">
                  <label for="order_type" class="block mb-2 text-sm font-medium text-red-700 dark:text-white">Visit Type</label>
                  <select id="countries"   name="illiness_status" class="bg-gray-50 border border-red-700 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-sky-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-sky-400" value="<?= old('illiness_status') ?>" required>
                  <option value="">select visit</option>
                    <option value="Normal">Normal</option>
                    <option value="Emergency">Emergency</option>
            </select>
              </div>
              <div class="w-full">
                  <label for="order_type" class="block mb-2 text-sm font-medium text-red-700 dark:text-white">Illiness Status</label>
                  <select id="countries"   name="gender" class="bg-gray-50 border border-red-700 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-sky-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-sky-400" value="<?= old('illiness_status') ?>" required>
                  <option value="">select gender</option>
                    <option value="female">female</option>
                    <option value="male">male</option>
            </select>
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