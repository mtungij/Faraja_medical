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
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#263238" fill-opacity=".5" d="M15.9 14.3H15l-.3-.3c1-1.1 1.6-2.7 1.6-4.3 0-3.7-3-6.7-6.7-6.7S3 6 3 9.7s3 6.7 6.7 6.7c1.6 0 3.2-.6 4.3-1.6l.3.3v.8l5.1 5.1 1.5-1.5-5-5.2zm-6.2 0c-2.6 0-4.6-2.1-4.6-4.6s2.1-4.6 4.6-4.6 4.6 2.1 4.6 4.6-2 4.6-4.6 4.6z"></path></svg>
                                </div>
                                <div class="ml-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#263238" fill-opacity=".5" d="M1.816 15.556v.002c0 1.502.584 2.912 1.646 3.972s2.472 1.647 3.974 1.647a5.58 5.58 0 0 0 3.972-1.645l9.547-9.548c.769-.768 1.147-1.767 1.058-2.817-.079-.968-.548-1.927-1.319-2.698-1.594-1.592-4.068-1.711-5.517-.262l-7.916 7.915c-.881.881-.792 2.25.214 3.261.959.958 2.423 1.053 3.263.215l5.511-5.512c.28-.28.267-.722.053-.936l-.244-.244c-.191-.191-.567-.349-.957.04l-5.506 5.506c-.18.18-.635.127-.976-.214-.098-.097-.576-.613-.213-.973l7.915-7.917c.818-.817 2.267-.699 3.23.262.5.501.802 1.1.849 1.685.051.573-.156 1.111-.589 1.543l-9.547 9.549a3.97 3.97 0 0 1-2.829 1.171 3.975 3.975 0 0 1-2.83-1.173 3.973 3.973 0 0 1-1.172-2.828c0-1.071.415-2.076 1.172-2.83l7.209-7.211c.157-.157.264-.579.028-.814L11.5 4.36a.572.572 0 0 0-.834.018l-7.205 7.207a5.577 5.577 0 0 0-1.645 3.971z"></path></svg>
                                </div>
                                <div class="ml-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#263238" fill-opacity=".6" d="M12 7a2 2 0 1 0-.001-4.001A2 2 0 0 0 12 7zm0 2a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 9zm0 6a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 15z"></path></svg>
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




<?= $this->endSection() ;?>