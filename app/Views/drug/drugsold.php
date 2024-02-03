<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>


<dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
    <div class="relative overflow-hidden rounded-lg bg-gray-600 px-4 pb-6 pt-2 mb-4 shadow sm:px-6 sm:pt-6">
      <dt>
        <div class="absolute rounded-md bg-yellow-300 p-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bar-chart-3"><path d="M3 3v18h18"/><path d="M18 17V9"/><path d="M13 17V5"/><path d="M8 17v-3"/></svg>
        </div>
        <p class="ml-16 truncate text-sm font-medium text-white">TOTAL PRODUCT SOLD</p>
      </dt>
      <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">

     
        <p class="text-2xl pb-4 font-semibold text-gray-100"><?= $total_product_sold ;?></p>
     
          <span class="sr-only"> Increased by </span>
        </p>
        <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
          <div class="text-sm">
            <a href="<?= site_url("product/sold")?>" class="font-medium text-orange-400 hover:text-red-500">View all<span class="sr-only"> Total Subscribers stats</span></a>
          </div>
        </div>
      </dd>
    </div>
    <div class="relative overflow-hidden rounded-lg bg-gray-600 px-4 pb-6 pt-2 mb-4 shadow sm:px-6 sm:pt-6">
      <dt>
        <div class="absolute rounded-md bg-yellow-300 p-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bar-chart-3"><path d="M3 3v18h18"/><path d="M18 17V9"/><path d="M13 17V5"/><path d="M8 17v-3"/></svg>
        </div>
        <p class="ml-16 truncate text-sm font-medium text-white">TOTAL SALE</p>
      </dt>
      <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
        <p class="text-2xl font-semibold text-gray-100"><?= $total_sales ;?></p>

          <span class="sr-only"> Increased by </span>
        
        </p>
        <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
          <div class="text-sm">
           
          </div>
        </div>
      </dd>
    </div>
    
    
  </dl>


  <section class="bg-gray-50 dark:bg-gray-900 h-screen flex items-center">
  <div class="max-w-screen-xl px-4 mx-auto lg:px-12 w-full">
    <!-- Start coding here -->
    <div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
      <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
        <div class="w-full md:w-1/2">
          <form class="flex items-center">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
              </div>
              <input type="text" id="simple-search" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
            </div>
          </form>
        </div>
        <div class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
         
        <?= $this->include('drug/partials/filter_product') ;?>
        </div>
      </div>
    </div>
    <div class="container justify-center mx-auto flex flex-col">
  <div class="w-full shadow-md sm:rounded-lg">
    <div class="inline-block min-w-full align-middle dark:bg-gray-800">
    <h3 class="text-base font-semibold mt-4 px-5 leading-6 text-gray-900">MEDICINE SOLD</h3>
      <div class="overflow-hidden">
        <table class="min-w-full table-fixed dark:divide-gray-700 divide-y divide-green-400 ">
          <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
              <th
                scope="col"
                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"
              >
                S.No
              </th>
              <th
                scope="col"
                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"
              >
                DRUG NAME
              </th>
              
              <th
                scope="col"
                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"
              >
               DRUG QUANTITY SOLD
              </th>
              
              <th
                scope="col"
                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"
              >
                TOTAL PRICE
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
           <?php
            $i = 1 ;
            $totalPrice = 0;
            $totalQuantity = 0;
            ?>
          <?php foreach ($drug as $value) : ?>
            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
              <td
                
              class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"
              >
                 <?= $i ++ ;?>

              </td>
              <td
                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"
              >
              <?= $value->name ?>
              </td>
              <td
                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"
              >
              <?php $totalQuantity += $value->quantity ?>

              <?= $value->quantity ?>
              </td>
              <td
                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"
              >
                <?php $totalPrice += ($value->price * $value->quantity) ?>
              <?= number_format($value->price * $value->quantity) ?>
              </td>
              
            </tr>
            <?php endforeach ?>


          
            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
              <td
                
              class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"
              >
              

              </td>
              <td
                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"
              >
                TOTAL
              </td>
              <td
                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"
              >
             
             <?=  $totalQuantity ;?>
             
              </td>
              <td
                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"
                >
                <?=  number_format($totalPrice) ;?>
              </td>
              
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
  </div>
</section>





<?= $this->endSection() ;?>