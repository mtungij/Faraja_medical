<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>


<section class="bg-white dark:bg-gray-900">

<div class="py-8 px-4 pb-14 w-l ">
      <h2 class="mb-4 text-xl  font-bold text-gray-900 dark:text-white">PAYMENT SETTINGS</h2>
      <form action="create_payment" method="post">
       
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              <div class="w-full">
                  <label for="customer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Account Number</label>
                  <input type="number" name="number"  id="customer"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-primary-500 focus:border-primary-500"  value="<?= old('center_name') ?>" placeholder="example 0629364847" required="">
              </div>
                
        <div class="w-full">        
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
            <select id="countries" data-te-select-init data-te-select-filter="true" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-sky-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-sky-400">
                    <option selected>Choose a Method</option>
                    <option value="M-PES">M-PESA</option>
                    <option value="LIPA-MPESA">LIPA-MPESA</option>
                    <option value="TIGO-PESA">TIGO-PESA</option>
                    <option value="AIRTEL-MONEY">AIRTEL-MONEY</option>
                    <option value="BANK">BANK</option>
            </select>

        </div>
        
          </div>
          <div class="flex justify-center">
    <button type="submit" class="px-5 py-2.5 mt-4 sm:mt-6 text-sm rounded-sm  font-medium text-center text-white bg-sky-400 ">
       Save
    </button>
</div>  
      </form>
  </div>

  
</section>


<div>
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs  uppercase bg-sky-500 dark:bg-gray-700 text-white">
            <tr>
                <th scope="col" class="px-6 py-3">
                   S/No
                </th>
                <th scope="col" class="px-6 py-3">
                ACCOUNT Number
                </th>
                <th scope="col" class="px-6 py-3">
                    ACCOUNT NAME
                </th>
              
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php  $i=1;   ?>
            <?php foreach ($payment as $item) : ?>
                
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?= $i ++ ?>
                </th>
                <td class="px-6 py-4">
                   <?= $item->number ;?>
                </td>
                <td class="px-6 py-4">
                  <?= $item->name ;?>
               
                <td class="px-6 py-4 text-right">
                    <a href="" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
                    
               
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>



<?= $this->endSection() ;?>




