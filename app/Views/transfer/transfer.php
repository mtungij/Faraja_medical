<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>

<section mb-0>
 <div class=" bg-white">
  <article class="overflow-hidden">
   <div class="bg-[white] rounded-b-md">
    <div class="">
    </div>
    <div class="">
     <div class="flex w-full">
      <div class="grid grid-cols-4 gap-12">
       <div class="text-sm font-light text-slate-500">
        <p class="text-sm font-normal text-slate-700">
         Invoice Detail:
        </p>
        <p>Unwrapped</p>
        <p>Fake Street 123</p>
        <p>San Javier</p>
        <p>CA 1234</p>
       </div>
       <div class="text-sm font-light text-slate-500">
        <p class="text-sm font-normal text-slate-700">Billed To</p>
        <p>The Boring Company</p>
        <p>Tesla Street 007</p>
        <p>Frisco</p>
        <p>CA 0000</p>
       </div>
       <div class="text-sm font-light text-slate-500">
        <p class="text-sm font-normal text-slate-700">Invoice Number</p>
        <p>000000</p>

        <p class="mt-2 text-sm font-normal text-slate-700">
         Date of Issue
        </p>
        <p>00.00.00</p>
       </div>
       <div class="text-sm font-light text-slate-500">
        <p class="text-sm font-normal text-slate-700">Terms</p>
        <p>0 Days</p>

        <p class="mt-2 text-sm font-normal text-slate-700">Due</p>
        <p>00.00.00</p>
       </div>
      </div>
     </div>
    </div>

    <div class="p-9">
     <div class="flex flex-col mx-0 mt-8">
      

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <h2>Vital Sign</h2>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Color
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Apple MacBook Pro 17"
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Microsoft Surface Pro
                </th>
                <td class="px-6 py-4">
                    White
                </td>
                <td class="px-6 py-4">
                    Laptop PC
                </td>
                <td class="px-6 py-4">
                    $1999
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Magic Mouse 2
                </th>
                <td class="px-6 py-4">
                    Black
                </td>
                <td class="px-6 py-4">
                    Accessories
                </td>
                <td class="px-6 py-4">
                    $99
                </td>
            </tr>
        </tbody>
    </table>
</div>

     </div>
    </div>

   </div>
  </article>
 </div>
</section>



<?= $this->endSection() ;?>




