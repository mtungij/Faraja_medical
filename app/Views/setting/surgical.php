<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>


<section class="bg-white dark:bg-gray-900">

<div class="py-8 px-4 pb-14 w-l ">
      <h2 class="mb-4 text-xl  font-bold text-gray-900 dark:text-white">SURGICAL SETUP</h2>
      <form action="surgical/create" method="post">
       
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              <div class="w-full">
                  <label for="customer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Surgical Name</label>
                  <input type="text" name="name"  id="customer"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-primary-500 focus:border-primary-500"  value="<?= old('name') ?>" placeholder="example Mrdt" >
              </div>
                
        <div class="w-full">        
        <label for="customer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Surgical Price</label>
        <input x-data  x-mask:dynamic="$money($input)" name="price"  id="customer"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-primary-500 focus:border-primary-500"  value="<?= old('price') ?>" >
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
                Surgical Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Surgical Price
                </th>
              
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php  $i=1;   ?>
            <?php foreach ($test as $tests) : ?>
                
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?= $i ++ ?>
                </th>
                <td class="px-6 py-4">
                   <?= $tests->name ?>
                </td>
                <td class="px-6 py-4">
                  <?= number_format($tests->price) ;?>
               
                <td class="px-6 py-4 text-right">
                   
                <a  href="<?= site_url("update_category/$tests->id") ?>">
                            <button class="flex space-x-2 items-center px-3 py-2 bg-sky-500 rounded-md drop-shadow-md">
                           
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
                              <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/>
                              <path d="m15 5 4 4"/>
                            </svg>
                          </button>
                        </a>
                </td>
                    
               
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>



<?= $this->endSection() ;?>




