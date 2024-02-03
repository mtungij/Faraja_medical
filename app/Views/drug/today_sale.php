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

     
        <p class="text-2xl pb-4 font-semibold text-gray-100"><?php echo $total_product_sold ?></p>
     
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
    <div class="relative overflow-hidden rounded-lg bg-gray-600 px-4 pb-6 pt-2 mb-4 shadow sm:px-6 sm:pt-6">
      <dt>
        <div class="absolute rounded-md bg-yellow-300 p-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bar-chart-big"><path d="M3 3v18h18"/><rect width="4" height="7" x="7" y="10" rx="1"/><rect width="4" height="12" x="15" y="5" rx="1"/></svg>
        </div>
        <p class="ml-16 truncate text-sm font-medium text-white">TOTAL PROFIT</p>
      </dt>
      <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
        <p class="text-2xl font-semibold text-gray-100"><?= $total_profit ?></p>
        
        <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
          <div class="text-sm">
          
          </div>
        </div>
      </dd>
    </div>
  </dl>

<div class="container justify-center mx-auto flex flex-col">
  <div class="w-full shadow-md sm:rounded-lg">
    <div class="inline-block min-w-full align-middle dark:bg-gray-800">
     

    <section class="bg-gray-50 dark:bg-gray-900 h-screen flex items-center">
  <div class="max-w-screen-xl px-4 mx-auto lg:px-12 w-full">
    <!-- Start coding here -->
    <div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
      <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
        <div class="w-full md:w-1/2">      
<form action="<?= site_url("loaddrug") ?>" class="flex items-center ">   
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        
        <input type="text" name="search" id="btnsearch" id="default-search"   class="block  p-4 ps-10 text-sm text-gray-900 border w-96 border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Patient,medicine,staff..." required>
        <button type="submit" id="btnsearch" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick='document.getElementById("searchForm").submit();'>Search</button>
        
    </div>
</form>
        
        </div>
        <div class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
          <?= $this->include('drug/partials/filter.php') ;?>
          <div class="flex items-center w-full space-x-3 md:w-auto">
           
            <div id="actionsDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
              <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="actionsDropdownButton">
                <li>
                  <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mass Edit</a>
                </li>
              </ul>
              <div class="py-1">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete all</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   
    <div class="overflow-hidden">
        <table class="min-w-full table-fixed dark:divide-gray-700 divide-y divide-green-400 ">
          <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
             
              <th
                scope="col"
                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"
              >
                PATIENT NAME
              </th>
              <th
                scope="col"
                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"
              >
                SELLER NAME
              </th>
              <th
                scope="col"
                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"
              >
                NAME
              </th>
              <th
                scope="col"
                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"
              >
                QUANTITY
              </th>
              <th
                scope="col"
                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"
              >
                UNIT PRICE
              </th>
              <th
                scope="col"
                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"
              >
                TOTAL PRICE
              </th>
              <th
                scope="col"
                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"
              >
                PROFIT
              </th>
             
              
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">

          <?php 
          
          $totalPrice = 0;
          $totalQuantity = 0;
          $sumprice = 0;
          $totalprofit = 0;
          ;?>

          <?php foreach ($todaySales as $value) : ?>
            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
              <td
                
              class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"
              >
                <?= $value->first_name ." ". $value->middle_name ." ". $value->last_name ?>

              </td>
              <td
                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"
              >
                <?= $value->seller ?>
              </td>
              <td
                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"
              
              >
              <?= $value->drugName ?>
              </td>
              <td
                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"
              >
              <?php  $totalQuantity += $value->quantity ?>

               <?= $value->quantity ?>
             
              </td>
              <td
                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"
              >
              <?php  $totalPrice += $value->price ;?>
              <?= number_format($value->price)  ?>
              </td>
              <td
                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"
              >
              <?php  $sumprice += ($value->price * $value->quantity) ;?>
                <?= number_format($value->price * $value->quantity) ?>  
              </td>
              <td
                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"
              >
                <?php $totalprofit += (($value->price  -  $value->buy_price) * $value->quantity)  ;?>

              <?= number_format(($value->price  -  $value->buy_price) * $value->quantity) ;?>
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
               
              </td>
              <td
                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"
              
              >

              TOTAL
             
              </td>
              <td
                class="py-4 px-6 text-sm font-bold text-gray-900 whitespace-nowrap dark:text-white"
              >

              <?=  $totalQuantity ;?>
            
              <td
                class="py-4 px-6 text-sm font-bold text-gray-900 whitespace-nowrap dark:text-white"
              >
                 <?= number_format($totalPrice) ;?>
              </td>
              <td
                class="py-4 px-6 text-sm font-bold text-gray-900 whitespace-nowrap dark:text-white"
              >
              <?=  number_format($sumprice) ;?>
              </td>
              <td
                class="py-4 px-6 text-sm font-bold text-gray-900 whitespace-nowrap dark:text-white"
              >
               <?= number_format($totalprofit) ;?>
                 
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