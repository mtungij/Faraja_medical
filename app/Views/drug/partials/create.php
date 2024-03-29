

<!-- Modal toggle -->

<button data-modal-target="vital-sign" data-modal-toggle="vital-sign" type="button" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
<svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
</svg>
Add Medicine
</button>

<!-- Main modal -->
<div id="vital-sign" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <form action="<?= site_url('drugscreate') ?>" method="post" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <?= csrf_field() ?>
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Add New Medicine
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="vital-sign">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 grid grid-cols-1 md:grid-cols-2 items-center gap-4">

            
                <input type="hidden" name="user_id" value="<?= session()->get('user_id') ?>">
                <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
                    <div>
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit</label>
                   <select id="countries" name="unit"  data-te-select-placeholder="select unit"   data-te-select-init data-te-select-filter="true" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="capsule">Capsule (Cap)</option>
                        <option value="syrup">Syrup (Syr)</option>
                        <option value="suspension">Suspension (Susp)</option>
                        <option value="solution">Solution (Sol)</option>
                        <option value="drops">Drops (gtt)</option>
                        <option value="cream">Cream (Cr)</option>
                        <option value="ointment">Ointment (Oint)</option>
                        <option value="gel">Gel (Gel)</option>
                        <option value="patch">Patch (Pch)</option>
                        <option value="inhaler">Inhaler (Inh)</option>
                        <option value="injection">Injection (Inj)</option>
                        <option value="suppository">Suppository (Supp)</option>
                        <option value="lotion">Lotion (Lotion)</option>
                        <option value="powder">Powder (Pdr)</option>
                        <option value="dentalPaste">Dental Paste (Dent)</option>
                        <option value="lozenge">Lozenge (Loz)</option>
                        <option value="nasalSpray">Nasal Spray (Nasal)</option>
                        <option value="eyeDrops">Eye Drops (Eyedrops)</option>
                        <option value="ampoule">Ampoule (Amp)</option>
                        <option value="tabs">Tabs</option>
                        <option value="each">Each</option>
                        <option value="tube">Tube</option>
                        <option value="caps">Caps</option>
                        <option value="pc">Pc</option>
                        <option value="bottle">Bottle</option>
                        <option value="tablet">Tablet (Tab)</option>
                        <option value="milligram">Milligram (mg)</option>
                        <option value="gram">Gram (g)</option>
                        <option value="milliliter">Milliliter (ml)</option>
                        <option value="unit">Unit (U)</option>
                        <option value="milliequivalent">Milliequivalent (mEq)</option>
                        <option value="microgram">Microgram (mcg or µg)</option>
                        <option value="millimeter">Millimeter (mm)</option>
                        <option value="centimeter">Centimeter (cm)</option>
                        <option value="liter">Liter (L)</option>
                        <option value="teaspoon">Teaspoon (tsp)</option>
                        <option value="tablespoon">Tablespoon (tbsp)</option>
                        <option value="ampule">Ampule (Amp)</option>
                        <option value="vial">Vial (Vial)</option>
                        <option value="dropperful">Dropperful (Dropperful)</option>
                        <option value="puff">Puff (for inhalers)</option>
                        <option value="mmHg">Millimeter of Mercury (mmHg)</option>
                    </select>
                    </div>
                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                        <input type="number"  name="quantity" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Buy Price</label>
                        <input  x-data  x-mask:dynamic="$money($input)" name="buy_price" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
                    <div>
                        <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sell Price</label>
                        <input  x-data  x-mask:dynamic="$money($input)" name="sell_price" id="brand"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock Limit</label>
                        <input type="number"  name="stock_limit" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button type="submit" class="text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">Submit</button>
                <button data-modal-hide="vital-sign" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-sky-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
            </div>
       </form>
    </div>
</div>
