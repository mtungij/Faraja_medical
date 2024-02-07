<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>


<section class="bg-white dark:bg-gray-900">

<div class="py-8 px-4 pb-14 w-l ">
      <h2 class="mb-4 text-xl  font-bold text-gray-900 dark:text-white">UPDATE PATIENT REGISTRATION</h2>
      <form action="<?= site_url("update_patient") ;?>" method="post">
       
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
             
              <div class="w-full">
                  <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                  <input type="text" name="first_name" id="phone" value="<?= $patient->first_name ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('first_name') ?>" required="">
              </div>

              <input type="hidden" name="id" id="phone" value="<?= $patient->id ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  required="">

              <div class="w-full">
                  <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle Name</label>
                  <input type="text" name="middle_name" value="<?= $patient->middle_name ?>" id="phone"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('middle_name') ?>" required="">
              </div>
              <div class="w-full">
                  <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                  <input type="text" name="last_name" value="<?= $patient->last_name ?>" id="phone"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('last_name') ?>" required="">
              </div>
              <div class="w-full">
                  <label for="order_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                  <input type="number" name="phone" value="<?= $patient->phone ?>" id="order_type"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('phone') ?>" required="">
              </div>
              <div class="w-full">
                  <label for="order_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Age</label>
                  <input type="number" name="age" id="order_type" value="<?= $patient->age ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('age') ?>" required="">
              </div>

              <div class="w-full">
                  <label for="order_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                  <input type="text" name="address" value="<?= $patient->address ?>" id="order_type"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('address') ?>" required="">
              </div>

              <div class="w-full">
                  <label for="order_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Illiness Status</label>
                  <select id="countries" name="illiness_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-sky-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-sky-400" required>
                    <option <?=  $patient->illiness_status == "normal" ? "selected" : "" ?> value="normal">Normal</option>
                    <option <?=$patient->illiness_status == "emergency" ? "selected" : "" ?> value="emergency">Emergency</option>
            </select>
              </div>

              <div class="w-full">
                  <label for="order_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                  <select id="countries" name="gender" value="<?= $patient->gender ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-sky-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-sky-400" required>
                    <option></option>
                    <option <?= $patient->gender == "female" ? "selected" : "" ?> value="female">female</option>
                    <option <?= $patient->gender == "male" ? "selected" : "" ?> value="male">male</option>
                   
            </select>
              </div> 
              
          </div>
          <div class="flex justify-center">
    <button type="submit" class="px-5 py-2.5 mt-4 sm:mt-6 text-sm rounded-sm  font-medium text-center text-white bg-sky-400 ">
        Update Patient
    </button>
</div>

          
      </form>
  </div>
</section>


<?= $this->endSection() ;?>