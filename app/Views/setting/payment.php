<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>

<section class="bg-white dark:bg-gray-900">


<div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
  <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
  </svg>
  <span class="sr-only">Danger</span>
  <div>
    <span class="font-medium">Angalizo kabla hujabonyeza button ya kudelete :</span>
      <ul class="mt-1.5 list-disc list-inside">
      <li>kwa usalama wa taarifa za nyuma za wateja </li>
        <li>button ya kudelete itumike muda mchache baada ya kugundulika malipo yaliyoingizwa muda huo huo kimakosa </li>
        <li>kabla ya watumiaji wa mfumo kutumia malipo(payment settings) uliyoyasajili</li>
    </ul>
  </div>
  </div>

<div class="py-8 px-4 pb-14 w-l ">
      <h2 class="mb-4 text-xl  font-bold text-gray-900 dark:text-white">PAYMENT SETTINGS</h2>
      <form action="create_payment" method="post">
       
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              <div class="w-full">
                  <label for="customer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Account Number</label>
                  <input type="number" name="number"  id="customer"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-primary-500 focus:border-primary-500"  value="<?= old('center_name') ?>" placeholder="example 0629364847" >
              </div>
                
        <div class="w-full">        
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
            <select id="countries" data-te-select-init data-te-select-filter="true" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-sky-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-sky-400" required>
                    <option selected>Choose a Method</option>
                    <option value="CASH">CASH</option>
                    <option value="M-PESA">M-PESA</option>
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


<div class="w-full">
    <table id="myTable"   class="display">
    <thead>
            <tr>
                <th >
                   S/No
                </th>
                <th >
                ACCOUNT Number
                </th>
                <th >
                    ACCOUNT NAME
                </th>
              
                <th >
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php  $i=1;   ?>
            <?php foreach ($payment as $item) : ?>
                
                <tr>
                <th>
                <?= $i ++ ?>
                </th>
                <td>
                   <?= $item->number ;?>
                </td>
              
               <td>
               <?= $item->name ;?>
               </td>
                
                   
                


                        <td class="px-6 py-4 text-sm text-[#333]">
          <a href="<?= site_url("update_payment/$item->id") ?>" class="text-blue-500 hover:text-blue-700 mr-4">Edit</a>
          <a href="<?= site_url("delete_payment/$item->id")?>" class="text-red-500 hover:text-red-700">Delete</a>
        </td>
                
                    
               
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>



<?= $this->endSection() ;?>




