<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>

 
<ol class="mx-4 relative border-s border-gray-300 dark:border-gray-700"> 
            <?php foreach ($investigations as $investigation):?>  
                <li class="mb-4 ms-4">
                    <div class="absolute w-3 h-3 bg-gray-300 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                    <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">
                        <?= date('d M Y H:i', strtotime($investigation->created_at))  ;?>
                    </time>
                    <h3 class="font-medium text-sky-950 mb-3">Investigation by <?= $investigation->user->name ?></h3>
                    <div class="border border-gray-300 rounded-md my-3 p-3">
                        <h3 class="font-medium text-sky-950 mb-3">Investigations</h3>
                        <ul role="list" class="marker:text-sky-400 list-disc pl-5 space-y-3 text-sky-950/60">
                            <?php foreach($investigation->items as $item): ?>
                               <li><?= $item->name ?></li>
                            <?php endforeach ;?>
                        </ul>
                    </div>

                    <?php if(session('department')): ?>
                        <div class="border border-sky-300 rounded-md my-3 p-3 ml-10">
                            <h3 class="font-medium text-sky-950 mb-3">
                                <span>Result </span>
                                <?php if($investigation->result): ;?>
                                    <span class="text-sky-500">by <?= $investigation->result->user->name ?></span>
                                <?php endif ;?>
                            </h3>
                            <div class="text-sky-950/60"><?= $investigation->result?->desc ?? "No results yet." ?></div>
                        </div>
                    <?php endif ;?>
                    
                    <!-- write result(text area) -->
                    <?php if(session('department') == 'lab' && !$investigation->result): ?>
                        <form action="<?= base_url('investigation/result') ?>" method="post" class="mt-3 grid">
                            <input type="hidden" name="user_id" value="<?= session('user_id') ?>">
                            <input type="hidden" name="investigation_id" value="<?= $investigation->id ?>">
                            <textarea name="desc" class="w-full border border-gray-300 rounded-md p-3 justify-end" placeholder="Write result here"></textarea>
                            <button type="submit" class="bg-sky-500 w-fit text-white px-4 py-2 rounded-md mt-3">Submit</button>
                        </form>
                    <?php endif ;?>
                </li>
                <?php endforeach ;?>
            </ol>
        </div>

        

        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="<?php echo base_url('js/jquery.min.js') ?>"></script>
    <style>
        .form-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }
    </style>
    <script>
        $(document).ready(function(){
            function addRow() {
                var newRow = '<div class="form-container">' +
                    '<div class="px-6 py-4 text-sm">' +
                    '<label for="medicine_name">Medicine Name:</label>' +
                    '<select name="medicine_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">' +
                    '<option selected>select medicine</option>' +
                    '<?php foreach ($drugs as $drug) : ?>' +
                    '<option value="<?= $drug->name . " " . $drug->quantity ?>"><?= $drug->name . " " . $drug->quantity ?></option>' +
                    '<?php endforeach ?>' +
                    '</select>' +
                    '</div>' +
                    '<div class="px-6 py-4 text-sm">' +
                    '<label for="quantity">Quantity:</label>' +
                    '<input type="number" name="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Quantity" required />' +
                    '</div>' +
                    '<div class="px-6 py-4 text-sm">' +
                    '<label for="route">Route:</label>' +
                    '<select name="route" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">' +
                    '<option value="inj">inj</option>' +
                    '<option value="Po">Po</option>' +
                    '<option value="Pv">Pv</option>' +
                    '<option value="Tropical">Tropical</option>' +
                    '<option value="Pr">Pr</option>' +
                    '</select>' +
                    '</div>' +
                    '<div class="px-6 py-4 text-sm">' +
                    '<label for="frequency">Frequency:</label>' +
                    '<select name="frequency" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">' +
                    '<option value="1">1</option>' +
                    '<option value="2">2</option>' +
                    '<option value="3">3</option>' +
                    '<option value="4">4</option>' +
                    '<option value="5">5</option>' +
                    '<option value="6">6</option>' +
                    '</select>' +
                    '</div>' +
                    '<div class="px-6 py-4 text-sm">' +
                    '<label for="duration">Duration:</label>' +
                    '<select name="duration" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">' +
                    '<?php for ($i = 1; $i <= 100; $i++) : ?>' +
                    '<option value="<?= $i ?>"><?= $i ?></option>' +
                    '<?php endfor ?>' +
                    '</select>' +
                    '</div>' +
                    '<div class="px-6 py-4">' +
                    '<button type="button" class="delete-row">-</button>' +
                    '</div>' +
                    '</div>';
                
                $("#dynamicadd").append(newRow);
            }

            $("button.add-row").click(function(){
                addRow();
            });

            $("div#dynamicadd").on("click", "button.delete-row", function(){
                $(this).closest(".form-container").remove();
            });
        });
    </script>
</head>
<body>
    <div class="overflow-x-auto">
        <form method="post" action="<?= base_url('medicine/add') ?>" >
            <div id="dynamicadd">
                <div class="form-container">
                    <div class="px-6 py-4 text-sm">
                        <label for="medicine_name">Medicine Name:</label>
                        <select id="countries" name="medicine_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>select medicine</option>
                            <?php foreach ($drugs as $drug) : ?>
                                <option value="<?= $drug->name . " " . $drug->quantity ?>"><?= $drug->name . " " . $drug->quantity ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="px-6 py-4 text-sm">
                        <label for="quantity">Quantity:</label>
                        <input type="number" name="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Quantity" required />
                    </div>
                    <div class="px-6 py-4 text-sm">
                        <label for="route">Route:</label>
                        <select id="countries" name="route" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="inj">inj</option>
                            <option value="Po">Po</option>
                            <option value="Pv">Pv</option>
                            <option value="Tropical">Tropical</option>
                            <option value="Pr">Pr</option>
                        </select>
                    </div>
                    <div class="px-6 py-4 text-sm">
                        <label for="frequency">Frequency:</label>
                        <select id="countries" name="frequency" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <?php for ($i = 1; $i <= 6; $i++) : ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor ?>
                        </select>
                    </div>
                    <div class="px-6 py-4 text-sm">
                        <label for="duration">Duration:</label>
                        <select id="countries" name="duration" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <?php for ($i = 1; $i <= 100; $i++) : ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor ?>
                        </select>
                    </div>
                  




                    <input type="hidden" name="patient_id" value="<?= $patient->id ?>">
                     <input type="hidden" name="user_id" value="<?= session()->get('user_id') ?>">
                    <div class="px-6 py-4">
                    <button type="button" class="delete-row text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Delete Form</button>
                    </div>
                </div>
            </div>
            <button type="button" class="add-row text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Form</button>
        <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 mt-3 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Submit</button>
        </form>
    </div>
</body>
</html>


<?= $this->endSection() ;?>