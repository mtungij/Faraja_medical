<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>

 
<!-- component -->
<div>
      
        <div class="container w-full">
            <div class=" w-full">
                <div class="flex border border-grey w-full">

                    <div class="w-full border flex flex-col">

                        <!-- Header -->
                        <div class="py-2 px-3 bg-grey-lighter flex flex-row justify-between items-center">
                            <div class="flex items-center">
                                <div>


                                
                          <?php
                                if ($patient->gender == 'female') {
                                    // Display female picture
                                    echo '<img class="w-10 h-10 rounded-full" src="' . base_url("img/female.png") . '" alt="Female Image">';
                                } else {
                                    // Display male picture or a default image for other genders
                                    echo '<img class="w-10 h-10 rounded-full" src="' . base_url("img/male2.png") . '" alt="Male Image">';
                                }
                             ?>

                                    
                                </div>
                                <div class="ml-4">
                                    <p class="text-grey-darkest">
                                         <strong><?= $patient->first_name ." ". $patient->middle_name ." ". $patient->last_name ;?></strong> 
                                    </p>
                                    <!-- <p class="text-grey-darker text-xs mt-1">
                                        Andrés, Tom, Harrison, Arnold, Sylvester
                                    </p> -->
                                </div>
                            </div>

                            <div class="flex">
                                <div>
                                <button type="button" data-modal-target="transfer-model" data-modal-toggle="transfer-model" class="text-white bg-cyan-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                     TRANSFER
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </button>
                                </div>
                               
                                          <!-- Main modal -->
<div id="transfer-model" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Transfer Patient
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="transfer-model">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="<?= site_url('transfer') ?>" method="post">
             <?= csrf_field() ;?>
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <input type="hidden" name="from" value="<?= session("user_id") ?>">
                    <input type="hidden" name="patient_id" value="<?= $patient->id ?>">
                    <div class="col-span-2 sm:col-span-1">
                        <label for="department" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Departiment</label>
                        <select id="department" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected>Select department</option>
                        </select>
                    </div>
                    
                    <div class="col-span-2 sm:col-span-1">
                        <label for="staff" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Staff</label>
                        <select id="staff" name="to" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected>Select staff</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Transfer
                </button>
            </form>
        </div>
    </div>
</div> 




                                <div class="ml-6">
                                <a href="<?= site_url("patients/$patient->id/signs") ?>" type="submit" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">Back to Profile</a>
                                </div>
                            </div>
                        </div>

                        <!-- Messages -->
                        <div class="flex-1 overflow-auto" style="background-color: #DAD3CC">
                            <div class="py-2 px-3">
                            <?php foreach ($investigations as $investigation):?>  
                                <div class="flex justify-center mb-2">
                                    <div class="rounded py-2 px-4" style="background-color: #DDECF2">
                                        <p class="text-sm uppercase">
                                        <?= date('d M Y H:i', strtotime($investigation->created_at))  ;?>
                                        </p>
                                    </div>
                                </div>
                                <?php endforeach ;?>

                                <div class="flex justify-center mb-4">
                                    <div class="rounded py-2 px-4" style="background-color: #FCF4CB">
                                        <p class="text-xs">
                                            Messages to this chat and calls are now secured with end-to-end encryption. Tap for more info.
                                        </p>
                                    </div>
                                </div>

                             

    

                                <div class="w-full p-2">
                                    <div class="rounded py-2 px-3" style="background-color: #E2F7CB">
                                    <?php foreach($investigation->items as $item): ?>
                                        <p class="text-sm mt-1">
                                        <li><?= $item->name ?></li>
                                        </p>
                                        <?php endforeach ;?>
                                        <?php foreach ($investigations as $investigation):?>  
                                        <p class="text-right text-xs text-grey-dark mt-1">
                                        <?= date('d M Y H:i', strtotime($investigation->created_at))  ;?>
                                        </p>
                                        <?php endforeach ;?>
                                    </div>
                                </div>

                             

                                <div class="w-full p-2">
                                    <div class="rounded py-2 px-3" style="background-color: #F2F2F2">
                                    <?php if($investigation->result): ;?>
                                        <p class="text-sm text-purple">
                                        <?= $investigation->result->user->name ?>
                                        </p>
                                       
                                        <p class="text-sm mt-1">
                                        <?= $investigation->result->desc ?? "Nothing replied yet." ?>
                                        </p>
                                        <?php endif ;?>
                                        <!-- <p class="text-right text-xs text-grey-dark mt-1">
                                            12:45 pm
                                        </p> -->
                                    </div>
                                </div>


                                <div class="w-full">
                                    <div class="rounded py-2 px-3" style="background-color: #E2F7CB">
                                    <?php foreach($treatments as $item): ?>
                                        <p class="text-sm mt-1">
                                        <li><?= "<strong>Medicine Name:</strong> " . $item->medicine_name . ", <strong>Quantity:</strong> " . $item->quantity . ", <strong>Frequency:</strong> " . $item->frequency . ", <strong>Route:</strong> " . $item->route . ", <strong>Duration:</strong> " . $item->duration ?></li>
                                        </p>
                                        <p class="text-sm mt-1">
                                        <?= date('d M Y H:i', strtotime($item->created_at))  ;?>
                                        </p>
                                        <?php endforeach ;?>
                                         
                                        <p class="text-right text-xs text-grey-dark mt-1">
                                       
                                        </p>
                                        
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Input -->
                        
                    </div>

                </div>
            </div>
        </div>
    </div>

        
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
                        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                    <div class="px-6 py-4">
                        <button type="button" class="delete-row">-</button>
                    </div>
                </div>
            </div>
            <button type="button" class="add-row text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Form</button>
        <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 mt-3 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Submit</button>
        </form>
    </div>
</body>
</html>


<script>
    $(document).ready(function () {
        // Fetch departments and populate the first select
        $.ajax({
            url: '<?php echo site_url('transfer/departments'); ?>',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $.each(data, function (index, value) {
                    $('#department').append('<option value="' + value.department + '">' + value.department + '</option>');
                });
            }
        });

        // Handle change event on department select
        $('#department').on('change', function () {
            var selectedDepartment = $(this).val();

            // Fetch staff based on the selected department
            $.ajax({
                url: '<?php echo site_url('transfer/staffs'); ?>/' + selectedDepartment,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Clear and populate the staff select
                    $('#staff').empty();
                    $('#staff').append('<option selected>Select staff</option>');
                    $.each(data, function (index, value) {
                        $('#staff').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script>




<?= $this->endSection() ;?>